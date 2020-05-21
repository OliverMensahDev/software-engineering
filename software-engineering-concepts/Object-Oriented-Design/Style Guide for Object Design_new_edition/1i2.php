<?php
// not bad as the previous one, 

final class FileLoggerAnother{
    private $logFilePath;
    public function __construct(string $logFilePath){
        // Only copy values into properties
        $this->logFilePath = $logFilePath;
    }
    public function log(): void{
        $this->ensureLogFileExists();
    }
    private function ensureLogFileExists(): void{
        if (is_file($this->logFilePath)) {
            return;
        }
        $logFileDirectory = dirname($this->logFilePath);
        if (!is_dir($logFileDirectory)) {
            // create the directory if it doesn't exist yet
            mkdir($logFileDirectory, 0777, true);
        }
        touch($this->logFilePath);
    }
}

$logger = new FileLoggerAnother("/home/olivermensah/Desktop/oliver/a.txt");
$logger->log();