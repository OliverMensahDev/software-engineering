<?php

declare(strict_types=1);

namespace App\Dictionary\Factories;

use App\Dictionary\Language;
use App\Dictionary\Dictionary;

abstract class DictionaryFactory
{
    public  function newDictionary(Language $language): Dictionary
    {
        return  $this->create($language);
    }

    abstract  function create(Language $language): Dictionary;
}
