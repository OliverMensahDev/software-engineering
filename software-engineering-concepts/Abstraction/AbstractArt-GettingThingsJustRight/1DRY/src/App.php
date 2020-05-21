<?php

use App\Services\CSVRepository;
use App\Services\Database;
use App\Services\DatabaseRepository;
use App\Services\InternalDataRepository;
use App\Services\Repository;

require_once "../vendor/autoload.php";

function fetchData(Repository $repository){
  $people = $repository->getPersons();
  foreach($people as $person){
    echo "{$person->name} {$person->gender} {$person->age} \n";
  }
}
//CVS
echo "CSV data \n";
fetchData(new CSVRepository());


echo "\n";
echo "SQL data \n";
$db = new Database();
fetchData(new DatabaseRepository($db->get()));
$db->close();

echo "\n";
echo "Internal data \n";
fetchData(new InternalDataRepository());

