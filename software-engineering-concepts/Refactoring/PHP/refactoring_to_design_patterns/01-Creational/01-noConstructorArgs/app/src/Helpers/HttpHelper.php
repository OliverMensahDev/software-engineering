<?php

declare(strict_types=1);

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class HttpHelper
{
  public function __construct()
  {
    $this->httpHelper = new Client();
  }

  public function sendGet(string $url): Response
  {

    $client = new Client(['base_uri' => $url]);
    return $client->get("");
  }
}
