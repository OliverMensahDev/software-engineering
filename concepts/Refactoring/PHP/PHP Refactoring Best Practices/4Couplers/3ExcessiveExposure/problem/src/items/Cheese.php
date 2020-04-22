<?php

namespace app\items;

use app\entities\Item;

class Cheese extends Item 
{
    
    public function price() 
    {
        return 2.5;
    }

    public function isAgeRestrictedItem() 
    {
        return false;
    }
}
