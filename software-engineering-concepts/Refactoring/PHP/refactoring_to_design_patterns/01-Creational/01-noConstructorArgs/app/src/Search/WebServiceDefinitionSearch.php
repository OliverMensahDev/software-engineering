<?php

declare(strict_types=1);

namespace App\Search;

use App\Helpers\DictionaryJSONResponseHelper;
use App\Helpers\HelperUtils;

class WebServiceDefinitionSearch implements DefinitionSearch
{
  private const  URL = "https://api.dictionaryapi.dev/api/v2/entries/en/";
  private HelperUtils $httpHelper;

  public function __construct()
  {
    $this->httpHelper = new HelperUtils();
  }

  public function getDefinition(string $word): array
  {
    $response = $this->httpHelper->sendGet(self::URL . $word);
    return DictionaryJSONResponseHelper::extractMeaning($response);
  }
}
