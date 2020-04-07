<?php

namespace app\persistence;

use app\personnel\FullTimeEmployee;
use app\personnel\PartTimeEmployee;
use app\personnel\Intern;
use app\personnel\Employee;
use app\personnel\Subcontractor;

/*
Helper method to perform CRUD operations on employees. In a production
application we could use the database for persistence. In this demo,
we are storing employees in the file system.
 */


class EmployeeRepository
{
    private $serializer;

    public function __construct(EmployeeFileSerializer $serializer)
    {
        $this->serializer = $serializer;
    }

    public function findAll(): array
    {

        // Employees are kept in memory for simplicity
        $anna = new FullTimeEmployee("Anna Smith", 2000);
        $billy = new FullTimeEmployee("Billy Leech", 920);

        $steve = new PartTimeEmployee("Steve Jones", 800);
        $magda = new PartTimeEmployee("Magda Iovan", 920);

        $john = new Intern("John Lee", 300, 10);
        $catherine = new Intern("Catherine Allison", 500, 15);


        return array($anna, $billy, $steve, $magda, $john, $catherine);
    }

    public function save(Employee $employee)
    {
        $serializedString = $this->serializer->serialize($employee);
        $logFilePath = "../logs/" . str_replace(" ", "_", $employee->getFullName()) . ".rec";
        $logFileDirectory = dirname($logFilePath);
        if (!is_dir($logFileDirectory)) {
            mkdir($logFileDirectory, 0777, true);
        }
        touch($logFilePath);
        file_put_contents(
            $logFilePath,
            $serializedString
        );
    }
}
