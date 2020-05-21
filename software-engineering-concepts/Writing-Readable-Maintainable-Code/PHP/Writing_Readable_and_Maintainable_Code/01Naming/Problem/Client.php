<?php 

class Client
{
  private $client;

  public function __construct()
  {
  //  $this->client = new self(); 
  }
  public function send(string $s)
  {
    $data = $this->client->sendHttp($s);
    return $data;
  }
}