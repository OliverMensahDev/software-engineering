<?php

declare(strict_types=1);

namespace App\Dictionary;

use App\Search\LocalBackupDefinitionSearch;
use App\Search\WebServiceDefinitionSearch;

final class SimpleDictionaryFactory
{

    public static function newDictionaryWith(Language $language): Dictionary
    {
        return new Dictionary(WebServiceDefinitionSearch::newForeignLanguageInstance($language));
    }

    public static function english(): Dictionary
    {
        return new Dictionary(WebServiceDefinitionSearch::newInstance());
    }

    public static function spanish(): Dictionary
    {
        return new Dictionary(WebServiceDefinitionSearch::newForeignLanguageInstance(Language::SPANISH()));
    }

    public static function fromLocalFile(): Dictionary
    {
        return new Dictionary(LocalBackupDefinitionSearch::newInstance());
    }
}
