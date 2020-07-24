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
  function encode($data): string
  {
    return $data . ".json";
  }
}

class XmlEncoder implements EncoderInterface
{
  function encode($data): string
  {
    return $data . ".xml";
  }
}
class YamlEncoder implements EncoderInterface
{
  function encode($data): string
  {
    return $data . ".yaml";
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
    $data = $this->prepareData($data, $format);
    return $encoder->encode($data);
  }

  private function prepareData($data, string $format)
  {
    switch ($format) {
      case 'json':
        // $data = $this->forceArray($data);
        // $data = $this->fixKeys($data);
      case 'xml':
        // $data = $this->fixAttributes($data);
        break;
      default:
        throw new InvalidArgumentException(
          'Format not supported'
        );
    }
    return $data;
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
  echo $genericEncoder->encodeToFormat($data, 'ppp');
} catch (\Throwable $th) {
  echo $th->getMessage();
}

