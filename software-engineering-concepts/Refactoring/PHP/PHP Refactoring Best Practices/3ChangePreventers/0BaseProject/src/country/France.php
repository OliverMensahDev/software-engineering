<?php

namespace app\country;

/**
 * Legal age for alcohol is 18
 */
class France extends Country
{

    public function getMinimumLegalDrinkingAge()
    {
        return 18;
    }
}
