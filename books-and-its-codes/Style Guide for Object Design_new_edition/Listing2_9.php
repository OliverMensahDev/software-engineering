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
        // processing
        return $message;
    }
}

//1,  Can be issue if using the optional dependency

final class FileLogger implements Logger
{

    // private Formatter $formatter;
    // private string $logFilePath;

    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function log(string $message): void
    {
        $formattedMessage = $this->formatter->format($message);
        echo $formattedMessage;
    }
}

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
$importer = new BankStatementImporter(new FileLogger(new DefaultFormatter));
$importer->import("");
