<?php

/**
 * Interface for format-specific encoders
 */
interface EncoderInterface
{
  public function encode($data): string;

  public function prepareData($data);
}
class JsonEncoder implements EncoderInterface
{
  function encode($data): string
  {
    return $data . ".json";
  }

  public function prepareData($data)
  {
    return $data;
  }
}

class XmlEncoder implements EncoderInterface
{
  function encode($data): string
  {
    return $data . ".xml";
  }

  public function prepareData($data)
  {
    return $data;
  }
}
class YamlEncoder implements EncoderInterface
{
  function encode($data): string
  {
    return $data . ".yaml";
  }

  public function prepareData($data)
  {
    return $data;
  }
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
    if(empty($this->factories[$format])) throw new InvalidArgumentException('Unknown format');
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
    $data = $encoder->prepareData($data);
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

try {
  $genericEncoder = new GenericEncoder($encoderFactory);
  $data ="come";
  echo $genericEncoder->encodeToFormat($data, 'json');
} catch (\Throwable $th) {
  echo $th->getMessage();
}

