<?php 
namespace app\entities;

class Voucher
{
    public $code;
    private $startDate;
    private $expiryDate;

    public function getCode()
    {
        return $this->code;
    }

    
    public function setCode($code)
    {
        $this->code = $code;
    }
       
}
