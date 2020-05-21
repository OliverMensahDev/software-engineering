<?php

class WebHttpClient
{
  private $client;

  public function __construct()
  {
    //  $this->client = new self(); 
  }
  public function sendGetRequest(string $s)
  {

    $httpResponse = $this->client->sendHttp($s);
    return $httpResponse;
  }
}
