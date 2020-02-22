<?php

namespace core\helpers;

require_once config('devless')['system_class'];
use App\Helpers\Helper;

class Request
{
    public $requestPayload = [];
    public function __construct($requestArgs)
    {
        $this->set($requestArgs);
        return $this;
    }

    public function set($requestArgs)
    {
        $userPayload = Helper::get_authenticated_user_cred(false);
        if (count($userPayload)) {
            $this->requestPayload['profile'] = (new \devless())->getUserProfile($userPayload['id'], $key = 'id');
        } else {
            $this->requestPayload['profile'] = null;
        }
        $this->requestPayload['args'] = $requestArgs;
    }

    public function get($part = false)
    {
        if ($part) {
            return $this->requestPayload[$part];
        }
        return $this->requestPayload;
    }
}
