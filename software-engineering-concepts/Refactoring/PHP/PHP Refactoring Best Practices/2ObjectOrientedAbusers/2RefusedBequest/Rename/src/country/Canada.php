<?php

namespace app\country;

class Canada extends Country
{
    public function getMinimumLegalDrinkingAge()
    {
        return 18;
    }

    public function getLegalDrinkingAge(string $province)
    {
        if ($this->liberalProvince($province)) return $this->getMinimumLegalDrinkingAge();
        return 19;
    }

    private static function liberalProvince(string $province)
    {
        return "Quebec" === $province ||
            "Alberta" === $province;
    }
}
