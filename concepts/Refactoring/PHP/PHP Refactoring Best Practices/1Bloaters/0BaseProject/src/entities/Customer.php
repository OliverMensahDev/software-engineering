<?php 

namespace app\entities;

class Customer 
{

    private $membership;
    private $address;

    public function __construct(string $membership, string $address)
    {
        $this->membership = $membership;
        $this->address = $address;
    }

    public function getMembership(): string
    {
        return $this->membership;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
