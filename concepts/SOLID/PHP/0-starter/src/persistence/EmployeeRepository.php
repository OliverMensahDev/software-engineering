<?php 
namespace app\persistence;

use app\personnel\FullTimeEmployee;
use app\personnel\PartTimeEmployee;
use app\personnel\Intern;


class EmployeeRepository
{
  
    public function findAll(): array{

        // Employees are kept in memory for simplicity
        $anna = new FullTimeEmployee("Anna Smith", 2000);
        $billy = new FullTimeEmployee("Billy Leech", 920);

        $steve = new PartTimeEmployee("Steve Jones", 800);
        $magda = new PartTimeEmployee("Magda Iovan", 920);

        $oliver = new Intern("Oliver Mensah", 400, 20);

        return array($anna, $billy, $steve, $magda, $oliver);
    }
}