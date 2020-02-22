<?php

/**
 * Interface for format-specific encoders
 */
interface EncoderInterface
{
  public function encode($data): string;
}
class JsonEncoder implements EncoderInterface
{
  // ...
}

class XmlEncoder implements EncoderInterface
{
  // ...
}
class YamlEncoder implements EncoderInterface
{
  // ...
}

interface EncoderFactoryInterface
{
  public function createForFormat(
    string $format
  ): EncoderInterface;
}

class EncoderFactory implements EncoderFactoryInterface
{
  private $factories = [];
  /**
   * Register a callable that returns an instance of
   * EncoderInterface for the given format.
   *
   * @param string $format
   * @param callable $factory
   */
  public function addEncoderFactory(string $format, callable $factory): void
  {
    $this->factories[$format] = $factory;
  }
  public function createForFormat(string $format): EncoderInterface
  {
    $factory = $this->factories[$format];
    // the factory is a callable
    $encoder = $factory();
    return $encoder;
  }
}

class GenericEncoder
{
  private $encoderFactory;
  public function __construct(EncoderFactoryInterface $encoderFactory)
  {
    $this->encoderFactory = $encoderFactory;
  }
  public function encodeToFormat($data, string $format): string
  {
    $encoder = $this->encoderFactory
      ->createForFormat($format);
    $data = $this->prepareData($data, $format);
    return $encoder->encode($data);
  }
}

$encoderFactory = new EncoderFactory();
$encoderFactory->addEncoderFactory(
  'xml',
  function () {
    return new XmlEncoder();
  }
);
$encoderFactory->addEncoderFactory(
  'json',
  function () {
    return new JsonEncoder();
  }
);
$genericEncoder = new GenericEncoder($encoderFactory);
$data;
$jsonEncodedData = $genericEncoder->encodeToFormat($data, 'json');
