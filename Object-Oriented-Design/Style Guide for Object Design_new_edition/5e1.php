<?php 
/*
* First we introduce an interface for HTTP clients:
*/
interface HttpClient
{
  public function get($url): Response;
}


/*
* We also make sure the existing `CurlHttpClient`implements
* this new `HttpClient` interface:
*/
final class CurlHttpClient implements HttpClient
{
  public function get($url): Response
  {
    $httpClient = new CurlHttpClient();
    $response  = $httpClient->get($url);
  }
}


final class FixerApi
{
  /*
  * Now we inject the interface, not the concrete class:
  */
  public function __construct(HttpClient $httpClient)
  {
    $this->httpClient = $httpClient;
  }
  public function exchangeRateFor(  Currency $from,  Currency $to  ): ExchangeRate
  {
    /*
    * We have to change the code a bit to use the new interface
    * and its `get()` method:
    */
    $response = $this->httpClient->get('http://data.fixer.io/api/latest?access_key=...' .
      '&base=' . $from>asString() .
      '&symbols=' . $to->asString()
    );
    $decoded = json_decode($response->getBody());
    $rate = (float)$decoded->rates->{$to->asString()};
    return ExchangeRate::from($from, $to, $rate);
  }
}