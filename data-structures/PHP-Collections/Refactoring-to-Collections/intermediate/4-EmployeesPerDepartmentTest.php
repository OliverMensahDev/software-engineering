<?php

class EmployeesPerDepartmentTest
{
    private function groupBy($items)
    {   
        $data = [];
        foreach($items as $item) {
            if(isset($data[$item['department']])) {
                $data[$item['department']]++;
            } else {
                $data[$item['department']] = 1;
            }
        }
        return $data;
    }

    public function test()
    {
        $employees = [
            ['name' => 'John',  'department' => 'Sales',        'email' => 'john3@example.com'],
            ['name' => 'Jane',  'department' => 'Marketing',    'email' => 'jane8@example.com'],
            ['name' => 'Dave',  'department' => 'Marketing',    'email' => 'dave1@example.com'],
            ['name' => 'Dana',  'department' => 'Engineering',  'email' => 'dana8@example.com'],
            ['name' => 'Beth',  'department' => 'Marketing',    'email' => 'beth4@example.com'],
            ['name' => 'Kyle',  'department' => 'Engineering',  'email' => 'kyle8@example.com'],
            ['name' => 'Steve', 'department' => 'Sales',        'email' => 'steve7@example.com'],
            ['name' => 'Liz',   'department' => 'Engineering',  'email' => 'liz6@example.com'],
            ['name' => 'Joe',   'department' => 'Marketing',    'email' => 'joe5@example.com'],
        ];

        $groupedDepartment = $this->groupBy($employees);
        
        return $groupedDepartment;
        
    }
}


$employees = new EmployeesPerDepartmentTest();
print_r($employees->test());
