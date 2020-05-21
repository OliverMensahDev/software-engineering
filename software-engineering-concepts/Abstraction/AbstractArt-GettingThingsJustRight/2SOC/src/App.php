<?php


use App\Services\RepositoryFactory;

require_once "../vendor/autoload.php";

function fetchData(string $repositoryType ){
  $repository = RepositoryFactory::create($repositoryType);
  $people = $repository->getPersons();
  foreach($people as $person){
    echo "{$person->name} {$person->gender} {$person->age} \n";
  }
}
//CVS
echo "CSV data \n";
fetchData("CSV");

echo "\n";
echo "SQL data \n";
fetchData("SQL");

echo "\n";
echo "Internal data \n";
fetchData("InternalData");

