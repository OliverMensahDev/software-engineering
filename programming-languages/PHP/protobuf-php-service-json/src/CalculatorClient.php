<?php

declare(strict_types=1);

namespace DevLess\Math;

use Google\Protobuf\Internal\Message;

class CalculatorClient implements CalculatorInterface
{
    public function add(AddRequest $request): AddReply
    {
    	$reply = new AddReply();
    	$reply->mergeFromJsonString($this->makeRequest($request, 'add'));

    	return $reply;
    }


    public function subtract(SubtractRequest $request): SubtractReply
    {
    	$reply = new SubtractReply();
    	$reply->mergeFromJsonString($this->makeRequest($request, 'subtract'));

    	return $reply;
    }

    private function makeRequest(Message $message, string $method): string
    {
			$body = $message->serializeToJsonString();
			var_dump($body);
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