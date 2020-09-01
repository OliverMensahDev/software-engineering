<?php

declare(strict_types=1);

namespace App\Dictionary;

use App\Search\DefinitionSearch;
use App\Search\WebServiceDefinitionSearch;

class Dictionary
{
  private DefinitionSearch $search;

  public function __construct()
  {
    $this->search = new WebServiceDefinitionSearch();
  }

  public function getDefinitions(string $word): array
  {
    return $this->search->getDefinition($word);
  }
}
