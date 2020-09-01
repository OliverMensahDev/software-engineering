<?php

declare(strict_types=1);

namespace App\Search;

use App\Helpers\DictionaryJSONResponseHelper;
use App\Helpers\HttpHelper;

class WebServiceDefinitionSearch implements DefinitionSearch
{
  private const  URL = "https://api.dictionaryapi.dev/api/v2/entries/en/";
  private HttpHelper $httpHelper;

  public function __construct()
  {
    $this->httpHelper = new HttpHelper();
  }

  public function getDefinition(string $word): array
  {
    $response = $this->httpHelper->sendGet(self::URL . $word);
    return DictionaryJSONResponseHelper::extractMeaning($response);
  }
}
