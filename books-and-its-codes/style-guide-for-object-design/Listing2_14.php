<?php
final class Configuration
{
  private  $value;
  public function __construct($value)
  {
    $this->value = $value;
  }
  static public function  createDefault(): Configuration
  {
    return new Configuration("default");
  }

  function getValue()
  {
    return $this->value;
  }
}
final class MetadataFactory
{
  private $configuration;
  public function __construct(Configuration $configuration)
  {
    $this->configuration = $configuration;
  }

  public function getData()
  {
    return $this->configuration->getValue();
  }
}
/*
* Instead of making `MetadataFactory`'s `$configuration` argument
* optional, provide a `Configuration` class with a sensible default
Creating services 17
* state:
*/
$metadataFactory = new MetadataFactory(
  Configuration::createDefault()
);
echo $metadataFactory->getData();
