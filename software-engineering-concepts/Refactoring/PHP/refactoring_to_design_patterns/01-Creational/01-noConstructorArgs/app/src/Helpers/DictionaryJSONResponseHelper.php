<?php

declare(strict_types=1);

namespace App\Helpers;

use GuzzleHttp\Psr7\Response;

class DictionaryJSONResponseHelper
{
  public static function extractMeaning(Response $response): array
  {
    $definitions = [];
    $data = json_decode($response->getBody()->__toString());
    foreach ($data[0]->meanings as $meaning) {
      $definitions[] = $meaning->definitions[0]->definition;
    }
    return $definitions;
  }
}
