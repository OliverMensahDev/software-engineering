<?php

// sometimes we need to bootstrap some phases to get the app work. 
// Bootstrapping should be done before the instantiating and pass that to the constructor 



final class FileLogger{
  public function __construct(string $logFilePath){
      /*
      * We expect that the log file path has already been
      * properly set up for us, so all we do here is a "sanity
      * check":
      */
      $this->logFilePath = $logFilePath;
  }   
  public function log(string $message): void{
      // No need for a call to `ensureLogFileExists()` or anything
      // ...
  }
}
/*
* The task of creating the log directory and file should be moved to
* the bootstrap phase of the application itself:
*/

final class LoggerFactory {
  static public function createFileLogger(string $logFilePath): FileLogger{
    if(!is_file($logFilePath)) {
      $logFileDirectory = dirname($logFilePath);
      if (!is_dir($logFileDirectory)) {
          // create the directory if it doesn't exist yet
          mkdir($logFileDirectory, 0777, true);
      }
      touch($logFilePath);
    }
    if (!is_writable($logFilePath)) {
      throw new InvalidArgumentException(sprintf(
      'Log file path "%s" should be writable',
      $logFilePath
      ));
    } 
    return new FileLogger($logFilePath);
  }
}

$logger =  LoggerFactory::createFileLogger("/home/oliver/Desktop/oliver/ca.txt");