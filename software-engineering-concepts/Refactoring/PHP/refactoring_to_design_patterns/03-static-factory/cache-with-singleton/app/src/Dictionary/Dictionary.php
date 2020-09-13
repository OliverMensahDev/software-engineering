<?php

declare(strict_types=1);

namespace App\Dictionary;

use App\Search\DefinitionSearch;
use App\Search\WebServiceDefinitionSearch;

class Dictionary
{
  private DefinitionSearch $search;

  private static ?Dictionary $instance = null;

  private function __construct(DefinitionSearch $search)
  {
    $this->search = $search;
  }

  public static function english():self
  {
      if (!self::$instance){
          self::$instance = new Dictionary(WebServiceDefinitionSearch::newInstance());
      }
      return self::$instance;
  }

    public static function spanish():self
    {
        return new Dictionary(WebServiceDefinitionSearch::newForeignLanguageInstance(Language::SPANISH()));
    }

  public function getDefinitions(string $word): array
  {
    return $this->search->getDefinition($word);
  }
}
