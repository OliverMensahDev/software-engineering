<?php

declare(strict_types=1);

namespace App\Dictionary;

use App\Search\DefinitionSearch;
use App\Search\LocalBackupDefinitionSearch;
use App\Search\WebServiceDefinitionSearch;

class Dictionary
{
    private DefinitionSearch $search;

    private function __construct(DefinitionSearch $search)
    {
        $this->search = $search;
    }

    public static function english(): self
    {
        return new Dictionary(WebServiceDefinitionSearch::newInstance());
    }

    public static function spanish(): self
    {
        return new Dictionary(WebServiceDefinitionSearch::newForeignLanguageInstance(Language::SPANISH()));
    }

    public static function fromLocalFile(): self
    {
        return new Dictionary(LocalBackupDefinitionSearch::newInstance());
    }

    public function getDefinitions(string $word): array
    {
        return $this->search->getDefinition($word);
    }
}
