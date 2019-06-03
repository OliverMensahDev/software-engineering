<?php 
require_once __DIR__ . '/vendor/autoload.php';


use testapp\views\Template;
use testapp\presentation\UserModel;
use testapp\repositories\PersonRepository;
use testapp\repositories\PersonCSVRepository;
use testapp\repositories\PersonSQLRepository;
use testapp\datastores\Database;
use testapp\sharedObjects\Person;



$userModel = new UserModel(new PersonRepository);
$userModel = new UserModel(new PersonCSVRepository("./dataPHP.csv"));
$database =  new Database();
$userModel = new UserModel(new PersonSQLRepository($database->get()));
$indexPage = new Template("./testapp/views/pages/index.php");
// $userModel->addPerson(new Person("Oliver Mensah", "Male", 27));
$indexPage->people = $userModel->getPeople();
echo $indexPage;