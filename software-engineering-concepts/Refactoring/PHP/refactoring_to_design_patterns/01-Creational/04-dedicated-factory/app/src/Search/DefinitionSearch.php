<?php

declare(strict_types=1);

namespace App\Search;

interface DefinitionSearch
{
  public function getDefinition(string $word): array;
}
