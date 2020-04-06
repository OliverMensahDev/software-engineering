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

class EncoderFactory
{
  public function createForFormat(string $format): EncoderInterface
  {
    $class = ucfirst(strtolower($format)) . 'Encoder';
    if (!class_exists($class)) {
      throw new InvalidArgumentException('Unknown format');
    }
    return new $class();
  }
}

class GenericEncoder
{
  private $encoderFactory;
  public function __construct(EncoderFactory $encoderFactory)
  {
    $this->encoderFactory = $encoderFactory;
  }
  public function encodeToFormat($data, string $format): string
  {
    try {
      $encoder = $this->encoderFactory
        ->createForFormat($format);
      $data = $this->prepareData($data, $format);
      return $encoder->encode($data);
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
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


$gen  = new GenericEncoder(new EncoderFactory());
echo $gen->encodeToFormat("come", "ppp");

