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

class FileLoggerFactory{
    public static function makeFileLogger(Formatter $formatter): FileLogger{
        return new FileLogger(new $formatter());
    }
}



final class ServiceLocator {

    public function __construct(){
        $this->services = [
            'logger' => FileLoggerFactory::makeFileLogger(new DefaultFormatter)
            // We can have any mumber of services here...
        ];
    }
    public function get(string $identifier): object{
        if (!isset($this->services[$identifier])) {
            throw new LogicException( 'Unknown service: ' . $identifier);
        }
        return $this->services[$identifier];
    }
}


$logger = new ServiceLocator();
$logger->get("logger")->log("Data");

// what if I want the user to use his/her own formatter. In that case 
// I cannot call DefaultFormatter in the services map. 
// How do I go about this problem. 
// I had been thinking about it but if you can help out that would be nice.