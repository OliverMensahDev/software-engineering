<?php

namespace app\entities;

use app\country\Country;

class Address
{

    private $country;
    private $province;
    private $street;

    public function __construct() {
        // allocate your stuff
    }
    /**
     * Static constructor / factory
     */
    public static function create() {
        $instance = new self();
        return $instance;
    }

    public function setCountry(Country $country)
    {
        $this->country = $country;
        return  $this;
    }
    public function setProvince(string $province)
    {
        $this->province = $province;
        return $this;
    }

    public function setStreet(string $street)
    {
        $this->street = $street;
        return $this;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getProvince()
    {
        return $this->province;
    }
}
