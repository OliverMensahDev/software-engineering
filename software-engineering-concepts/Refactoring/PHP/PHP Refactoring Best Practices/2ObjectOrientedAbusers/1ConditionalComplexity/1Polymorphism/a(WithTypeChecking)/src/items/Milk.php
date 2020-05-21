<?php 

namespace app\items;

use app\entities\Item;

class Milk extends Item 
{

    public function price() 
    {
        return 1;
    }
    public function isAgeRestrictedBeverage() 
    {
        return false;
    }
}
