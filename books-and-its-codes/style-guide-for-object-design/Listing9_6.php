<?php
final class XmlFileLoader implements FileLoader
{
  // ...
}

parameterLoader = new ParameterLoader(new XmlFileLoader());
parameterLoader . load(__DIR__ . '/parameters.xml');
