<?php

include "./vendor/autoload.php";

$dictionary = \App\Dictionary\SimpleDictionaryFactory::ofType(\App\Dictionary\DictionaryType::GENERAL());
$definitions = $dictionary->getDefinitions("computer");
print_r($definitions);
