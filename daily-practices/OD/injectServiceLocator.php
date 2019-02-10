<?php 

interface Logger{
    public function log(string $message): string;
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

    public function log(string $message): string {
        $formattedMessage = $this->formatter->format($message);
       return $formattedMessage;
    }

}


final class ServiceLocator {

    public function __construct(){
        $this->services = [
            'FileLogger' => new FileLogger(new DefaultFormatter())
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

// // injecting the service
// final class HomepageController {

//     public function __construct(ServiceLocator $locator){
//         /*
//         * Instead of injecting the dependencies we need, we just
//         * inject the whole `ServiceLocator`, from which we can
//         * later retrieve any specific dependency, the moment we
//         * need it.
//         */
//         $this->locator = $locator;
//     }
//     public function __invoke(Request $request): Response {
//         $user = $this->locator->get(EntityManager::class)
//             ->getRepository(User::class)
//             ->findOneBy($request->get('userId'));

//         return $this->locator->get(ResponseFactory::class)
//             ->create()
//             ->withContent($this->locator->get(TemplateRenderer::class)
//             ->render('homepage.html.twig', [
//                 'user' => $user
//                 ]
//             ),
//             'text/html'
//         );
//     }

//     public function sendData(): string{
//         return $this->locator->get(FileLogger::class)->log("Oliver");
//     }
// }

// $data = new HomepageController(new ServiceLocator());
// echo $data->sendData();



//Injecting what you need to get them from service. 
final class FileController {

    public function __construct(FileLogger $fileLogger){
        $this->fileLogger = $fileLogger;
    }

    public function sendData(): string{
        return $this->fileLogger->log("Oliver");
    }
}
$locator = new ServiceLocator();
$data = new FileController($locator->get(FileLogger::class));
echo $data->sendData();
