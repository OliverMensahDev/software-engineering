<?php

class MarketingEmployeeEmailsTest
{
    private function map($data, $callback)
    {
        $result = [];

        foreach($data as $singleData){
            $result[] = $callback($singleData);
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

    public function emails()
    {
        $employees = [
            ['name' => 'John', 'department' => 'Sales', 'email' => 'john3@example.com'],
            ['name' => 'Jane', 'department' => 'Marketing', 'email' => 'jane8@example.com'],
            ['name' => 'Dave', 'department' => 'Marketing', 'email' => 'dave1@example.com'],
            ['name' => 'Dana', 'department' => 'Engineering', 'email' => 'dana8@example.com'],
            ['name' => 'Beth', 'department' => 'Marketing', 'email' => 'beth4@example.com'],
            ['name' => 'Kyle', 'department' => 'Engineering', 'email' => 'kyle8@example.com'],
        ];

        $marketingDepartment = $this->filter($employees, function ($employee) {
            return $employee['department'] == 'Marketing';
        });

        $emails = $this->map($marketingDepartment, function ($item) {
            return $item['email'];
        });

        return $emails;
    }
}

$marketingDepartment = new MarketingEmployeeEmailsTest();
print_r($marketingDepartment->emails());
