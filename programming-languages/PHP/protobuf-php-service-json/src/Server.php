<?php

declare(strict_types=1);

namespace DevLess\Math;

class Server
{
	public function run(): void
	{
		$method = ltrim(rawurldecode($_SERVER['REQUEST_URI']), '/');

		switch ($method) {
			case 'add':
				$request = new AddRequest();
				$request->mergeFromJsonString(file_get_contents('php://input'));
				$reply = (new Calculator())->add($request);
				echo $reply->serializeToJsonString();
				break;
			case 'subtract':
				$request = new SubtractRequest();
				$request->mergeFromJsonString(file_get_contents('php://input'));
				$reply = (new Calculator())->subtract($request);
				echo $reply->serializeToJsonString();
				break;
			default:
				http_response_code(404);
		}
	}
}