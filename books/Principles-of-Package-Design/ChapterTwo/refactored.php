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

class EncoderFactory
{
  public function createForFormat(string $format): EncoderInterface
  {
    if ($format === 'json') {
      return new JsonEncoder();
    } elseif ($format === 'xml') {
      return new XmlEncoder();
    }
    throw new InvalidArgumentException('Unknown format');
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
    $encoder = $this->encoderFactory
      ->createForFormat($format);
    $data = $this->prepareData($data, $format);
    return $encoder->encode($data);
  }
}
