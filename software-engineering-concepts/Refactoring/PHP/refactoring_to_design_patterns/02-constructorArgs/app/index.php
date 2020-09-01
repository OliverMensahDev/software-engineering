<?php

// declare(strict_types=1);

use App\Dictionary\Dictionary;
use App\Dictionary\Language;
use App\Helpers\HttpHelper;
use App\Search\WebServiceDefinitionSearch;

include "./vendor/autoload.php";

$dictionary = new Dictionary(new WebServiceDefinitionSearch(new HttpHelper, Language::ENGLISH()));
$definitions = $dictionary->getDefinitions("hello");
print_r($definitions);
