<?php 

namespace app\entities;

class Customer 
{

    private $membership;
    private $address;
    private $age;
    private $phone;

    public function __construct(){}

    public static function create()
    {
        $instance = new self();
        return $instance;
    }
    
    public function setAddress(Address $address)
    {
        $this->address = $address;
        return $this;
    }

    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }


    public function setMembership(Membership $membership)
    {
        $this->membership = $membership;
        return $this;
    }    

    public function getMembership(): Membership
    {
        return $this->membership;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getInternationalPhoneNumber()
    {
        $this->phone = new Phone("0544892841");
        return $this->phone->getInternationalPrefix() . $this->phone->getPrefix() . $this->phone->getNumber();
    }


    public function getSimplePhoneNumber()
    {
        $this->phone = new Phone("0544892841");
        return $this->phone->getAreaCode() . $this->phone->getNumber();
    }
}
