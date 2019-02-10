<?php 
final class FileLogger {

    public function __construct(string $logFilePath){

        $this->logFilePath = $logFilePath;
    }

    public function log(string $message): void {
        file_put_contents(
            $this->logFilePath,
            $message,
            FILE_APPEND
        );
    }

}

$logger = new FileLogger("/home/olivermensah/Desktop/practices/OD/logs.txt");
$logger->log('A message');