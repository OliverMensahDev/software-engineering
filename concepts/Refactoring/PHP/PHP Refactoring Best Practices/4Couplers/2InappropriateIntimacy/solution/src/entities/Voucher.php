<?php 
namespace app\entities;

use function PHPUnit\Framework\assertTrue;

class Voucher
{
    private $code;
    private $startDate;
    private $expiryDate;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        assertTrue(preg_match("/^[a-zA-Z0-9]$/", $code), "Error");
        $this->code = $code;
    }
       
}
