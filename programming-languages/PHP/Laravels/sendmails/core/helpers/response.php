<?php
namespace core\helpers;

class Response
{
    private $status_code = '1000';
    private $message = 'Request Processed';
    private $payload = null;

    public function __construct($status_code, $message, $payload)
    {
        $this->setResponse($status_code, $message, $payload);
        return $this;
    }
    public function io($output)
    {
        $this->status_code = (isset($output['status_code'])) ?
        $output['status_code'] : $this->status_code;

        $this->message = (isset($output['message'])) ?
        $output['message'] : $this->message;

        $this->payload = (isset($output['payload'])) ?
        $output['payload'] : $this->payload;
        $this->payload = (!isset($output['status_code']) && !isset($output['message'])) ? $output : $this->payload;

        return [
            'status_code' => $this->status_code,
            'message' => $this->message,
            'payload' => $this->payload,
        ];
    }

    public function setStatusCode($value)
    {
        $this->status_code = $value;
        return $this;
    }

    public function setMessage($value)
    {
        $this->message = $value;
        return $this;
    }

    public function setPayload($value)
    {
        $this->payload = $value;
        return $this;
    }

    public function setResponse($status_code, $message, $payload)
    {
        $this->setStatusCode($status_code);
        $this->setMessage($message);
        $this->setPayload($payload);
        return $this;
    }

    public function getResponse()
    {
        return ['status_code' => $this->status_code, 'message' => $this->message, 'payload' => $this->payload];
    }

    public function orderResponse($status_code, $message, $payload)
    {
        $this->setResponse($status_code, $message, $payload);
        return $this->getResponse();
    }
}
