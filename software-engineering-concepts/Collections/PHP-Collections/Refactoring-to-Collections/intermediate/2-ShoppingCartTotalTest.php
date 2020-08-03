<?php

class ShoppingCartTotalTest
{
    private function map($data, $callback)
    {
        $result = [];

        foreach ($data as $singleData) {
            $result[] = $callback($singleData);
        }
        return $result;
    }

    private function filter($items, $callback)
    {
        $result = [];
        foreach ($items as $item) {
            if ($callback($item)) {
                $result[] = $item;
            }
        }
        return $result;
    }

    private function reduce($items, $callback, $initial)
    {
        $accumulator = $initial;
        foreach ($items as $item) {
            $accumulator = $callback($accumulator, $item);
        }
        return $accumulator;
    }

    public function sum()
    {
        $shoppingCart = [
            ['product' => 'Banana',  'unit_price' => 79,   'quantity' => 3],
            ['product' => 'Milk',    'unit_price' => 499,  'quantity' => 1],
            ['product' => 'Cream',   'unit_price' => 599,  'quantity' => 2],
            ['product' => 'Sugar',   'unit_price' => 249,  'quantity' => 1],
            ['product' => 'Apple',   'unit_price' => 76,   'quantity' => 6],
            ['product' => 'Bread',   'unit_price' => 229,  'quantity' => 2],
        ];
        $sum = $this->reduce($shoppingCart, function ($acc, $item) {
            return $acc + ($item['unit_price'] * $item['quantity']);
        }, 0);

        return $sum;
    }
}

$shoppingCart = new ShoppingCartTotalTest();
echo $shoppingCart->sum();
