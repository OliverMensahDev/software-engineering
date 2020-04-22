<?php

namespace app\country;

abstract class Country
{

    public abstract function getMinimumLegalDrinkingAge();

    public function toString()
    {
        $class = explode('\\', get_class($this));
        end($class);
        $last = key($class);
        return $class[$last];
    }
}
