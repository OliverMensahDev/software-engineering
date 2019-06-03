<?php 
final class Configuration{
  static public function  createDefault(){
    echo "default";
  }
}
final class MetadataFactory{
public function __construct(Configuration $configuration)
{
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