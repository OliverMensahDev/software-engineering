<?php

class EmployeesBornOnSpecificWeekdayTest
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
    


    public function employeesBornOn($day)
    {
        $employees = [
            ['name' => 'John',  'department' => 'Sales',        'date_of_birth' => '1988-07-11'], // Monday
            ['name' => 'Jane',  'department' => 'Marketing',    'date_of_birth' => '1981-09-06'], // Sunday
            ['name' => 'Dave',  'department' => 'Marketing',    'date_of_birth' => '1986-05-08'], // Thursday
            ['name' => 'Dana',  'department' => 'Engineering',  'date_of_birth' => '1976-09-26'], // Sunday
            ['name' => 'Beth',  'department' => 'Marketing',    'date_of_birth' => '1977-03-09'], // Wednesday
            ['name' => 'Kyle',  'department' => 'Engineering',  'date_of_birth' => '1990-02-28'], // Wednesday
            ['name' => 'Steve', 'department' => 'Sales',        'date_of_birth' => '1980-12-01'], // Monday
            ['name' => 'Liz',   'department' => 'Engineering',  'date_of_birth' => '1976-07-06'], // Tuesday
            ['name' => 'Joe',   'department' => 'Marketing',    'date_of_birth' => '1978-06-13'], // Tuesday
        ];

        return $this->filter($employees, function ($employee) use ($day) {
            return (new DateTime($employee['date_of_birth']))->format('l') == $day;
        }); 
    }
}

$day = new EmployeesBornOnSpecificWeekdayTest();
print_r($day->employeesBornOn("Monday"));