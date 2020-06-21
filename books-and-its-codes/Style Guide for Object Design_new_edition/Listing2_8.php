<?php

interface Logger
{
  public function log(string $message): string;
}

interface Formatter
{
  public function format(string $message): string;
}

final class DefaultFormatter implements Formatter
{
  public function format(string $message): string
  {
    // processing
    return $message;
  }
}

final class FileLogger implements Logger
{

  // private Formatter $formatter;

  public function __construct(Formatter $formatter)
  {
    $this->formatter = $formatter;
  }

  public function log(string $message): string
  {
    $formattedMessage = $this->formatter->format($message);
    return $formattedMessage;
  }
}


final class ServiceLocator
{

  public function __construct()
  {
    $this->services = [
      'FileLogger' => new FileLogger(new DefaultFormatter())
      // We can have any mumber of services here...
    ];
  }
  public function get(string $identifier): object
  {
    if (!isset($this->services[$identifier])) {
      throw new LogicException('Unknown service: ' . $identifier);
    }
    return $this->services[$identifier];
  }
}

// injecting the service
final class HomepageController
{
  private $userRepository;
  private $responseFactory;
  private $templateRenderer;
  public function __construct($userRepository, $responseFactory, $templateRenderer)
  {
    $this->userRepository = $userRepository;
    $this->templateRenderer = $templateRenderer;
    $this->responseFactory = $responseFactory;
  }
  public function execute(Request $request): Response
  {
    $user = $this->userRepository
      ->findOneBy($request->get('userId'));

    return $this->responseFactory
      ->create()
      ->withContent(
        $this->templateRenderer
          ->render('homepage.html.twig', [
            'user' => $user
          ]),
        'text/html'
      );
  }

  public function sendData(): string
  {
    return $this->locator->get(FileLogger::class)->log("Oliver");
  }
}

$data = new HomepageController(/*Add the three dependencies*/);
echo $data->sendData();
