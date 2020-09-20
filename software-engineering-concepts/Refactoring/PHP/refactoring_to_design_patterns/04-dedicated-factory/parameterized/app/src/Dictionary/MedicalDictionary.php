<?php

declare(strict_types=1);

namespace App\Dictionary;


final class MedicalDictionary implements Dictionary
{
    private Language $language;

    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    public function getDefinitions(string $word): array
    {
        // TODO: Implement getDefinitions() method.
    }
}
