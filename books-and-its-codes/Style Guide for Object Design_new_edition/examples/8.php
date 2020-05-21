<?php

// final class FileLogger{
//     private $logFilePath;
//     public function __construct(string $logFilePath){
//         $this->logFilePath = $logFilePath;
//     }
//     public function log(): void{
//         $this->ensureLogFileExists();
//     }
//     private function ensureLogFileExists(): void{
//         if (is_file($this->logFilePath)) {
//             return;
//         }
//         $logFileDirectory = dirname($this->logFilePath);
//         if (!is_dir($logFileDirectory)) {
//             // create the directory if it doesn't exist yet
//             mkdir($logFileDirectory, 0777, true);
//         }
//         touch($this->logFilePath);
//     }
// }

// $logger = new FileLogger("~/Desktop/oliver/a.txt");
// $logger->log();



final class FileLogger{
    public function __construct(string $logFilePath){
        /*
        * We expect that the log file path has already been
        * properly set up for us, so all we do here is a "sanity
        * check":
        */
        if (!is_writable($logFilePath)) {
            throw new InvalidArgumentException(sprintf(
                'Log file path "%s" should be writable',
                $logFilePath
            ));
        }
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
$logFilePath = "/home/olivermensah/Desktop/oliver/ca.txt";

if(!is_file($logFilePath)) {
    $logFileDirectory = dirname($logFilePath);
    if (!is_dir($logFileDirectory)) {
        // create the directory if it doesn't exist yet
        mkdir($logFileDirectory, 0777, true);
    }
    touch($logFilePath);
}
$logger = new FileLogger($logFilePath);
