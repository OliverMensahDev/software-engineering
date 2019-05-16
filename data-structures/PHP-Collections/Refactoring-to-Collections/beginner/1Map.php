<?php

class MapClass
{
    private function map($data, $callback)
    {
        $result = [];

        foreach($data as $singleData){
            $result[] = $callback($singleData);
        }
        return $result;
    }

    public function test_double_each_number()
    {
        $doubled = $this->map([1, 2, 3, 4, 5], function ($number) {
            return $number * 2;
        });
        print_r($doubled);
    }

    public function test_get_user_emails()
    {
        $users = [
            ['name' => 'John', 'email' => 'john@example.com'],
            ['name' => 'Jane', 'email' => 'jane@example.com'],
            ['name' => 'Dana', 'email' => 'dana@example.com'],
        ];

        $emails = $this->map($users, function ($user) {
            return $user['email'];
        });
        print_r($emails);
    }

    public function test_convert_dates_to_day_of_week()
    {
        $dates = [
            new DateTime('2015-04-15'),
            new DateTime('2015-07-20'),
            new DateTime('2015-09-05'),
        ];

        $days = $this->map($dates, function ($date) {
            return $date->format('l');
        });
        print_r($days);
    }

    public function test_get_employee_names()
    {
        $employees = [
            ['name' => 'John', 'department' => 'Sales'],
            ['name' => 'Jane', 'department' => 'Marketing'],
            ['name' => 'Dave', 'department' => 'Marketing'],
            ['name' => 'Dana', 'department' => 'Engineering'],
            ['name' => 'Beth', 'department' => 'Marketing'],
            ['name' => 'Kyle', 'department' => 'Engineering'],
        ];
        $employeeNames = $this->map($employees, function ($employee) {
            return $employee['name'];
        });
        print_r($employeeNames);
    }

    public function test_get_the_year_from_each_date()
    {
        $dates = [
            new DateTime('2015-01-05'),
            new DateTime('1967-11-23'),
            new DateTime('1988-10-14'),
            new DateTime('1995-05-04'),
            new DateTime('2007-08-09'),
        ];

        $years = $this->map($dates, function ($date) {
            return $date->format('Y');
        });
        print_r($years);
    }

    public function test_convert_each_price_in_cents_into_a_displayable_format()
    {
        $pricesInCents = [
            79,
            599,
            699,
            289,
            89,
            249,
            785,
        ];

    
        $displayPrices = $this->map($pricesInCents, function ($price) {
            return '$'.number_format($price/100, 2);
        });
        print_r($displayPrices);
    }
}


$map = new Map();
$map->test_double_each_number();
$map->test_get_user_emails();
$map->test_convert_dates_to_day_of_week();
