<?php

declare(strict_types=1);

namespace App\Dictionary\Factories;

use App\Dictionary\Language;
use App\Dictionary\Dictionary;
use App\Dictionary\GeneralDictionary;
use App\Search\WebServiceDefinitionSearch;

final class GeneralDictionaryFactory extends DictionaryFactory
{

    function create(Language $language): Dictionary
    {
        return new GeneralDictionary(WebServiceDefinitionSearch::newForeignLanguageInstance($language));
    }
}
