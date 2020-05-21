<?php

class SessionStorage
{
  private $data;
  public function __construct()
  {
    $this->data = [];
  }

  public function set($key, $value)
  {
    $this->data[$key] = $value;
  }

  public function get($key)
  {
    return $this->data[$key];
  }
}

class User
{
  protected $storage;

  public function __construct(SessionStorage $storage)
  {
    $this->storage = $storage;
  }

  function setLanguage($language)
  {
    $this->storage->set('language', $language);
  }

  function getLanguage()
  {
    return $this->storage->get('language');
  }
}


interface ServiceContainerInterface
{
  public function set(string $name, callable $factory);
}

interface ServiceLocatorInterface
{
  public function get(string $name);
}

class ServiceContainer implements ServiceContainerInterface, ServiceLocatorInterface
{
  private $bindings = [];

  public function set(string $name, callable $factory)
  {
    $this->bindings[$name] = $factory;
  }

  public function get(string $name)
  {
    return $this->bindings[$name]($this);
  }
}


$container = new ServiceContainer();

$container->set("user", function(ServiceContainer $c){
 return new User($c->get("session"));
});


$container->set("session", function(ServiceContainer $c){
  return new SessionStorage();
});

$user = $container->get("user");
$user->setLanguage("aaa");
echo $user->getLanguage();


