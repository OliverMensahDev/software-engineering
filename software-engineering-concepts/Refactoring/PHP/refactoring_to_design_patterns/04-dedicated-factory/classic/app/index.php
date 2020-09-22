<?php

include "./vendor/autoload.php";
use App\Dictionary\Language;
use App\Dictionary\Factories\GeneralDictionaryFactory;

$dictionaryFactory = new GeneralDictionaryFactory();
$definitions = $dictionaryFactory->newDictionary(Language::ENGLISH())->getDefinitions("computer");
print_r($definitions);
