<?php 

namespace app\entities;

abstract class Item 
{
    public abstract function price();

    public abstract function isAgeRestrictedBeverage();
}
