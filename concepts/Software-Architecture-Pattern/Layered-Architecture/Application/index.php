<?php 
require_once __DIR__ . '/vendor/autoload.php';


use testapp\views\Template;
use testapp\presentation\UserModel;
use testapp\repositories\PersonRepository;
use testapp\repositories\PersonCSVRepository;
use testapp\repositories\PersonSQLRepository;
use testapp\repositories\CachingRepository;
use testapp\datastores\Database;
use testapp\sharedObjects\Person;



$userModel = new UserModel(new PersonRepository);
$userModel = new UserModel(new PersonCSVRepository("./dataPHP.csv"));
$database =  new Database();
$userModel = new UserModel(new PersonSQLRepository($database->get()));
//caching
// $cache = new CachingRepository(new PersonRepository);
// $userModel = new UserModel($cache);
// $cache->cachedData();

$indexPage = new Template("./testapp/views/pages/index.php");

// $userModel->addPerson(new Person("Oliver Mensah", "Male", 27));
$indexPage->people = $userModel->getPeople();
//simulateCaching
// flush(); //this sends the output to the client. You may also need ob_flush();
// sleep(10); 
// $cache->invalidateCache();
// $indexPage->people = $userModel->getPeople();


echo $indexPage;