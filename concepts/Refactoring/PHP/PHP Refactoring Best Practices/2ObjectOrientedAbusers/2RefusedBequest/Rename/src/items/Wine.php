<?php 

namespace app\items;

use app\entities\Item;

class Wine extends Item
{

    public function price() 
    {
        return 3;
    }
    
    public function isAgeRestrictedItem() 
    {
        return true;
    }
}
