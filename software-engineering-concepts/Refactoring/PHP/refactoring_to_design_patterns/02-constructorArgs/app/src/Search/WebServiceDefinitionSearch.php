<?php

declare(strict_types=1);

namespace App\Search;

use App\Dictionary\Language;
use App\Helpers\DictionaryJSONResponseHelper;
use App\Helpers\HttpHelper;

class WebServiceDefinitionSearch implements DefinitionSearch
{
  private const  URL = "https://api.dictionaryapi.dev/api/v2/entries/";
  private HttpHelper $httpHelper;
  private Language $language;

  public function __construct(HttpHelper $httpHelper, Language $language)
  {
    $this->httpHelper = $httpHelper;
    $this->language = $language;
  }

  public function getDefinition(string $word): array
  {
    $response = $this->httpHelper->sendGet(self::URL . $this->language->toString() . "/" . $word);
    return DictionaryJSONResponseHelper::extractMeaning($response);
  }
}
