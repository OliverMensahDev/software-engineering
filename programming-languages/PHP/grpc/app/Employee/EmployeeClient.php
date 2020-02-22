<?php

declare(strict_types=1);

namespace App\Employee;
use App\GeneratedCode\Employee\EmployeeServiceInterface;
use App\GeneratedCode\Employee\GetByBadgeNumberRequest;
use App\GeneratedCode\Employee\GetAllRequest;
use App\GeneratedCode\Employee\EmployeeRequest;
use App\GeneratedCode\Employee\EmployeeResponse;

use Google\Protobuf\Internal\Message;

class EmployeeClient implements EmployeeServiceInterface
{
  public function getByBadgeNumber(GetByBadgeNumberRequest $request)
  {
    $reply = new EmployeeResponse();
    $reply->mergeFromJsonString($this->makeRequest($request, ''));
    return $reply;
  }

  public function getAll(GetAllRequest $request)
  {
    $reply = new EmployeeResponse();
    $reply->mergeFromJsonString($this->makeRequest($request, ''));
    return $reply;
  }

  public function save(EmployeeRequest $request)
  {
      $reply = new EmployeeResponse();
      $reply->mergeFromJsonString($this->makeRequest($request, 'save'));
    	return $reply;
  }

  public function saveAll(EmployeeRequest $request)
  {
    $reply = new EmployeeResponse();
    	$reply->mergeFromJsonString($this->makeRequest($request, ''));
    	return $reply;
  }

  private function makeRequest(Message $message, string $method): string
  {
    	$body = $message->serializeToJsonString();
    	$ch = curl_init("http://localhost:8000/{$method}");

    	curl_setopt_array($ch, [
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_POST           => true,
    		CURLOPT_POSTFIELDS     => $body,
    	]);
    	$response = curl_exec($ch);

      curl_close($ch);      
    	return $response;
    }
}