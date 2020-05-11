<?php

use App\Services\CSVRepository;
use App\Services\Database;
use App\Services\DatabaseRepository;
use App\Services\InternalDataRepository;

require_once "../vendor/autoload.php";

//CVS
echo "CSV data \n";
$csv = new CSVRepository();
$people = $csv->getPersons();
foreach($people as $person){
  echo "{$person->name} {$person->gender} {$person->age} \n";
}

echo "\n";
echo "SQL data \n";
$db = new Database();
$sql = new DatabaseRepository($db->get());
$people = $sql->getPersons();
foreach($people as $person){
  echo "{$person->name} {$person->gender} {$person->age} \n";
}
$db->close();

echo "\n";
echo "Internal data \n";
$internalData = new InternalDataRepository();
$people = $internalData->getPersons();
foreach($people as $person){
  echo "{$person->name} {$person->gender} {$person->age} \n";
}
$db->close();

