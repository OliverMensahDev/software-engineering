<?php

namespace app\country;

/**
 * Legal age for alcohol is 21
 */
class US extends Country
{

    public function getMinimumLegalDrinkingAge()
    {
        return 21;
    }
}
