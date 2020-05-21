<?php

class EmployeeWithMostValuableSaleTest
{   
    
    private function map($items, $callback)
    {
        $result = [];
        foreach($items as $item){
            $result[] = $callback($item);
        }
        return $result;
    }

    private function filter($items, $callback)
    {
        $result = [];
        foreach($items as $item){
            if($callback($item)){
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

    
    public function test()
    {
        $employees = [
            [
                'name' => 'John',
                'email' => 'john3@example.com',
                'sales' => [
                    ['customer' => 'The Blue Rabbit Company', 'order_total' => 7444],
                    ['customer' => 'Black Melon', 'order_total' => 1445],
                    ['customer' => 'Foggy Toaster', 'order_total' => 700],
                ],
            ],
            [
                'name' => 'Jane',
                'email' => 'jane8@example.com',
                'sales' => [
                    ['customer' => 'The Grey Apple Company', 'order_total' => 203],
                    ['customer' => 'Yellow Cake', 'order_total' => 8730],
                    ['customer' => 'The Piping Bull Company', 'order_total' => 3337],
                    ['customer' => 'The Cloudy Dog Company', 'order_total' => 5310],
                ],
            ],
            [
                'name' => 'Dave',
                'email' => 'dave1@example.com',
                'sales' => [
                    ['customer' => 'The Acute Toaster Company', 'order_total' => 1091],
                    ['customer' => 'Green Mobile', 'order_total' => 2370],
                ],
            ],
        ];

        $employeeSales = $this->reduce($employees, function($acc, $cur){
            $acc[$cur['name']] =  $this->reduce($cur['sales'], function($salesAcc, $saleCur){
                return $salesAcc + $saleCur['order_total'];
            }, 0);
            return $acc;
        }, []);
        return array_keys($employeeSales,max($employeeSales))[0];
    }
}

$employeeSales = new EmployeeWithMostValuableSaleTest();
var_dump($employeeSales->test());



