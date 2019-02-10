<?php 

interface Logger{
    public function log(string $message): void;
}

//logger 1
final class NullLogger implements Logger {
    public function log(string $message): void{
        // Do nothing
    }
}


//logger 2 

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

    public function __construct(Formatter $formatter){
        $this->formatter = $formatter;
    }

    public function log(string $message): void {
        $formattedMessage = $this->formatter->format($message);
        echo $formattedMessage;
    }

}




final class BankStatementImporter{
    // private ?Logger $logger;
    
    public function __construct(Logger $logger=null){
        // logger can be null or instance of Logger
        $this->logger = $logger;
    }

    public function import(string $bankStatementFilePath): void{
        // import file
        if($this->logger instanceof Logger){
            $this->logger->log('A Message');
        }
    }
}

$logger = new BankStatementImporter(new NullLogger());
$logger->import('');

