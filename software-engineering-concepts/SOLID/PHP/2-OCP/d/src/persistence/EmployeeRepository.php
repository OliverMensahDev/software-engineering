<?php 
namespace app\persistence;

use app\personnel\FullTimeEmployee;
use app\personnel\PartTimeEmployee;
use app\personnel\Intern;
use app\personnel\Employee;


class EmployeeRepository
{
  private $serializer;

    public function __construct(EmployeeFileSerializer $serializer, FileStore $fileLocator){
        $this->serializer = $serializer;
        $this->fileLocator = $fileLocator;
    }

    public function findAll(): array{

        // Employees are kept in memory for simplicity
        $anna = new FullTimeEmployee("Anna Smith", 2000);
        $billy = new FullTimeEmployee("Billy Leech", 920);

        $steve = new PartTimeEmployee("Steve Jones", 800);
        $magda = new PartTimeEmployee("Magda Iovan", 920);

        $oliver = new Intern("Oliver Mensah", 200, 20);

        return array($anna, $billy, $steve, $magda, $oliver);
    }

    public function save(Employee $employee){
        $serializedString = $this->serializer->serialize($employee);
        $this->fileLocator->putContent($serializedString, "../logs/". str_replace(" ","_", $employee->getFullName()).".rec");
    }
}