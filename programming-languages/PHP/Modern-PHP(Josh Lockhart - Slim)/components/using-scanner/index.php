<?php
require 'vendor/autoload.php';
$urls = [
  'http://www.apple.com',
  'http://php.net',
  'http://sdfssdwerw.org'
];
$scanner = new \OliverMensahDev\Scanner($urls);
print_r($scanner->getInvalidUrls());
