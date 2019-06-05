<?php 
require_once __DIR__ . '/vendor/autoload.php';


use testapp\views\Template;
use testapp\presentation\UserModel;
use testapp\repositories\PersonRepository;
use testapp\services\PersonService;


$userModel = new UserModel(new PersonRepository(new PersonService()));
$indexPage = new Template("./src/views/pages/index.php");
$indexPage->people = $userModel->getPeople();
echo $indexPage;