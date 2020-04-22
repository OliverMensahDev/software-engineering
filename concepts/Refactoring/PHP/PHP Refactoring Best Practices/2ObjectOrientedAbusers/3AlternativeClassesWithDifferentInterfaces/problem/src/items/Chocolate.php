<?php 

namespace app\items;

use app\entities\Item;

class Chocolate extends Item
{
    
    public function price() 
    {
        return 1;
    }

    public function isAgeRestrictedItem()
    {
        return false;
    }
}
