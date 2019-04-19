<?php 

interface Logger{
    public function log(string $message): void;
}

interface Formatter{
    public function format(string $message): string;
}

final class DefaultFormatter implements Formatter{
    public function format(string $message): string{
        // processing
        return $message;
    }
}

final class ModifierFormatter implements Formatter{
    public function format(string $message): string{
        // processing
        return $message . " Modified";
    }
}



final class FileLogger implements Logger{

    // private Formatter $formatter;
    // private string $logFilePath;

    public function __construct(Formatter $formatter, string $logFilePath){
        $this->formatter = $formatter;
        
        /*
         * $logFilePath is  a configuraion value which tells 
         * the FileLogger to which file the messages should
         *  be written
         */

        $this->logFilePath = $logFilePath;
    }

    public function log(string $message): void {
        $formattedMessage = $this->formatter->format($message);
        // echo $formattedMessage;
        file_put_contents(
            $this->logFilePath,
            $formattedMessage,
            FILE_APPEND
        );
    }

}

$logger = new FileLogger(new ModifierFormatter(), "/home/olivermensah/Desktop/practices/OD/logs/logs.txt");
$logger->log('A message');

