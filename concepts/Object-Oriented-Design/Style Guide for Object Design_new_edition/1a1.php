<?php 
declare(strict_types = 1);

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

    private  $formatter;

    public function __construct(Formatter $formatter){
        $this->formatter = $formatter;
    }

    public function log(string $message): void {
        $formattedMessage = $this->formatter->format($message);
        echo $formattedMessage;
    }

}

$logger = new FileLogger(new ModifierFormatter());
$logger->log('A message');

