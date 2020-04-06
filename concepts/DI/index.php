<?php

use container\Container;
use container\SessionStorage;
use container\User;

require("container.php");
require("user.php");
require("session.php");


$container = new Container();

$container->set(User::class, function(Container $c){
 return new User($c->get(SessionStorage::class));
});


$container->set(SessionStorage::class, function(Container $c){
  return new SessionStorage();
});

$user = $container->get(User::class);
$user->setLanguage("aaa");
echo $user->getLanguage();