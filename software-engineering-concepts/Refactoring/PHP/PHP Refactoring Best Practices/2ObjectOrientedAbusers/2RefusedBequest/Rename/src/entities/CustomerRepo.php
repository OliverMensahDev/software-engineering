<?php 

namespace app\entities;

use app\country\Canada;
use app\country\France;
use app\country\US;

class CustomerRepo 
{

    public static function getUsCustomer()
    {
        return Customer::create()->setAddress(Address::create()->setCountry(new US))->setAge(21);
    }

    public static function getUsUnderAgeCustomer()
    {
        return Customer::create()->setAddress(Address::create()->setCountry(new US))->setAge(17);
    }

    public static function getFrenchCustomer()
    {
        return Customer::create()->setAddress(Address::create()->setCountry(new France))->setAge(18);
    }

    public static function getFrenchUnderageCustomer()
    {
        return Customer::create()->setAddress(Address::create()->setCountry(new France))->setAge(17);
    }

    public static function getCanadianCustomer()
    {
        return Customer::create()->setAddress(Address::create()->setCountry(new Canada)->setProvince("Quebec"))->setAge(18);
    }
}
