<?php

include "./vendor/autoload.php";

$dictionary = \App\Dictionary\SimpleDictionaryFactory::english();
$definitions = $dictionary->getDefinitions("computer");
print_r($definitions);
