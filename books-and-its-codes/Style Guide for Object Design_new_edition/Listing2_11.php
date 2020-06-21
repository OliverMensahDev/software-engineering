<?php

interface Logger
{
  public function log(string $message): void;
}

interface Formatter
{
  public function format(string $message): string;
}

final class DefaultFormatter implements Formatter
{
  public function format(string $message): string
  {
    return $message;
  }
}

final class ModifierFormatter implements Formatter
{
  public function format(string $message): string
  {
    return $message . " is modified";
  }
}



final class FileLogger implements Logger
{

  // private Formatter $formatter;
  // private string $logFilePath;

  public function __construct(Formatter $formatter, string $logFilePath = null)
  {
    $this->formatter = $formatter;
    $this->logFilePath = $logFilePath;
  }

  public function log(string $message): void
  {
    $formattedMessage = $this->formatter->format($message);
    echo $formattedMessage;
    file_put_contents(
      $this->logFilePath != null ? $this->logFilePath :  "./log/app.log",
      $formattedMessage,
      FILE_APPEND
    );
  }
}

$logger = new FileLogger(new ModifierFormatter());
$logger->log('A message');


final class BankStatementImporter
{
  // private ?Logger $logger;

  public function __construct(Logger $logger = null)
  {
    // logger can be null or instance of Logger
    $this->logger = $logger;
  }

  public function import(string $bankStatementFilePath): void
  {
    // import file
    if ($this->logger instanceof Logger) {
      $this->logger->log('A Message');
    }
  }
}
$importer = new BankStatementImporter();
$importer->import("");
