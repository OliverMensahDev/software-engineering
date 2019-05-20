<?php
namespace Psr\Log;

interface LoggerInterface
{
  public function emergency($message, array $context = array());
  public function alert($message, array $context = array());
  public function critical($message, array $context = array());
  public function error($message, array $context = array());
  public function warning($message, array $context = array());
  public function notice($message, array $context = array());
  public function info($message, array $context = array());
  public function debug($message, array $context = array());
  public function log($level, $message, array $context = array());
}

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
// Prepare logger
$log = new Logger('myApp');
$log->pushHandler(new StreamHandler('logs/development.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/production.log', Logger::WARNING));
// Use logger
$log->debug('This is a debug message');
$log->warning('This is a warning message');
