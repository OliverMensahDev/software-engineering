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
  public function createForFormat(string $format): EncoderInterface;
}

class EncoderFactory implements EncoderFactoryInterface
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


class MyCustomEncoderFactory implements EncoderFactoryInterface
{
  private $fallbackFactory;
  private $serviceLocator;
  public function __construct(ServiceLocatorInterface $serviceLocator, EncoderFactoryInterface $fallbackFactory) 
  {
    $this->serviceLocator = $serviceLocator;
    $this->fallbackFactory = $fallbackFactory;
  }
  public function createForFormat($format): EncoderInterface
  {
    if ($this->serviceLocator->has($format . '.encoder')) {
      return $this->serviceLocator->get($format . '.encoder');
    }
    return $this->fallbackFactory->createForFormat($format);
  }
}



class GenericEncoder
{
  private $encoderFactory;
  public function __construct( EncoderFactoryInterface $encoderFactory) {
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


$encoder = new GenericEncoder(new MyCustomEncoderFactory(,new EncoderFactory()));
