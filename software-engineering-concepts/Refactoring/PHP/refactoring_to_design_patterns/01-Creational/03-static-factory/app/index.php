<?php

// declare(strict_types=1);

use App\Dictionary\Dictionary;
use App\Dictionary\Language;
use App\Helpers\HelperUtils;
use App\Search\WebServiceDefinitionSearch;

include "./vendor/autoload.php";

$dictionary = Dictionary::english();

$dictionary = Dictionary::fromLocalFile();
$definitions = $dictionary->getDefinitions("book");
print_r($definitions);
