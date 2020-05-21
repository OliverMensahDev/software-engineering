<?php

namespace app\items;

use app\entities\Item;

class Cheese extends Item 
{
    
    public function price() 
    {
        return 2.5;
    }
}
