<?php

declare(strict_types=1);

namespace App\Employee;
use App\GeneratedCode\Employee\EmployeeRequest;

class Server
{
	public function run()
	{
		$method = ltrim(rawurldecode($_SERVER['REQUEST_URI']), '/');

		switch ($method) {
			case 'save':
				$request = new EmployeeRequest();
				$request->mergeFromJsonString(file_get_contents('php://input'));
				$reply = (new Employee())->save($request);
				echo $reply->serializeToJsonString();
        break;
			default:
				http_response_code(404);
		}
	}
}