<?php

// declare(strict_types=1);

use App\Dictionary\Dictionary;

include "./vendor/autoload.php";

$dictionary = new Dictionary();
$data = $dictionary->getDefinitions("computer");
print_r($data);
