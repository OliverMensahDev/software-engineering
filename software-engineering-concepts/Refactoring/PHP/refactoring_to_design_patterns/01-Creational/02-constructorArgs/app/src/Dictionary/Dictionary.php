<?php

declare(strict_types=1);

namespace App\Dictionary;

use App\Search\DefinitionSearch;

class Dictionary
{
  private DefinitionSearch $search;

  public function __construct(DefinitionSearch $search)
  {
    $this->search = $search;
  }

  public function getDefinitions(string $word): array
  {
    return $this->search->getDefinition($word);
  }
}
