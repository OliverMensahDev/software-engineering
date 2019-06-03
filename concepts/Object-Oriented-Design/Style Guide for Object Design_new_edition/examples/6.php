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

class Router
{
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function route($route): string
    {
        if (array_key_exists($route, $this->routes))
        {
            return $this->routes[$route];
        }
        
    }
}


final class ServiceLocator {

    public function __construct(){
        $this->services = [
            'FileLogger' => new  FileLogger("/home/olivermensah/Desktop/daily-practices/OD/log.txt"),
            "Router" => new Router(
                array(
                    "/" => "https://omensah.github.io",
                    "/resume" => "https://omensah.github.io/resume", 
                    "/contact" => "https://omensah.github.io/contact"
                )
            )
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

//Injecting what you need to get them from service. 
final class FileLoggerController {

    public function __construct(FileLogger $fileLogger){
        $this->fileLogger = $fileLogger;
    }

    public function saveLog(){
        return $this->fileLogger->log("Oliver");
    }
}

$locator = new ServiceLocator();
$logger = new FileLoggerController($locator->get(FileLogger::class));
echo $logger->saveLog();

