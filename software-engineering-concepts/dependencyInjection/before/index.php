<?php 
require_once __DIR__ . '/vendor/autoload.php';


use testapp\views\Template;
use testapp\presentation\UserModel;


$userModel = new UserModel();
$indexPage = new Template("./testapp/views/pages/index.php");
$indexPage->people = $userModel->getPeople();
echo $indexPage;