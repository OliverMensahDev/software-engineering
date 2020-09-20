<?php

declare(strict_types=1);

namespace App\Dictionary;

use App\Search\LocalBackupDefinitionSearch;
use App\Search\WebServiceDefinitionSearch;
use InvalidArgumentException;


final class SimpleDictionaryFactory
{

    public static function newDictionaryWith(Language $language): GeneralDictionary
    {
        return new GeneralDictionary(WebServiceDefinitionSearch::newForeignLanguageInstance($language));
    }

    public static function english(): GeneralDictionary
    {
        return new GeneralDictionary(WebServiceDefinitionSearch::newInstance());
    }

    public static function spanish(): GeneralDictionary
    {
        return new GeneralDictionary(WebServiceDefinitionSearch::newForeignLanguageInstance(Language::SPANISH()));
    }

    public static function fromLocalFile(): GeneralDictionary
    {
        return new GeneralDictionary(LocalBackupDefinitionSearch::newInstance());
    }

    public static function ofType(DictionaryType $type): Dictionary
    {
        switch ($type){
            case DictionaryType::LEGAL():
                return new LegalDictionary(Language::ENGLISH());
            case DictionaryType::MEDICAL():
                return new MedicalDictionary(Language::ENGLISH());
            case DictionaryType::GENERAL():
                return self::english();
            default:
                throw new InvalidArgumentException(sprintf("We currently don't support dictionaries of type %s", $type->toString()));
        }
    }
}
