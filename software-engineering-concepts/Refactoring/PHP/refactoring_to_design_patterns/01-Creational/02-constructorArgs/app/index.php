<?php

// declare(strict_types=1);

use App\Dictionary\Dictionary;
use App\Dictionary\Language;
use App\Helpers\HelperUtils;
use App\Search\WebServiceDefinitionSearch;

include "./vendor/autoload.php";

$dictionary = new Dictionary(new WebServiceDefinitionSearch(new HelperUtils, Language::ENGLISH()));
$definitions = $dictionary->getDefinitions("hello");
print_r($definitions);
