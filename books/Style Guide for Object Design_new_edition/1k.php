<?php 
final class ServiceContainer{
  public function homepageController(): HomepageController{
    return new HomepageController(
      $this->userRepository(),
      $this->responseFactory(),
      $this->templateRenderer()
    );
  }

  private function userRepository(): UserRepository{
  }
  private function responseFactory(): ResponseFactory{

  }
  private function templateRenderer(): TemplateRenderer{}
}

/*
* The framework could use a router to find out the right controller
* for the current request. It then fetches the controller from the
* service locator, and lets it handle the request:
*/
if ($uri === '/') {
  $controller = $serviceContainer->homepageController();
  $response = ($controller)($request);
} elseif ($uri === '/') {
}