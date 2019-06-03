<?php 

// not good . No work in the constructor. Just assign properties
final class FileLogger{
    private  $logFilePath;

    public function __construct(string $logFilePath){
        $logFileDirectory = dirname($logFilePath);
        if (!is_dir($logFileDirectory)) {
            // create the directory if it doesn't exist yet
            mkdir($logFileDirectory, 0777, true);
        }
        touch($logFilePath);
        $this->logFilePath = $logFilePath;
    }
}

$logger = new FileLogger("/home/olivermensah/Desktop/oliver/d.txt");