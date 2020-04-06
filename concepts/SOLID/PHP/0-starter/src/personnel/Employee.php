<?php

namespace app\personnel;

abstract class Employee
{
    private $firstName;
    private $lastName;
    private $monthlyIncome;
    private $nbHoursPerWeek;

    public function __construct(string $fullName, string $monthlyIncome)
    {
        $this->setMonthlyIncome($monthlyIncome);
        $names = explode(" ", $fullName);
        $this->firstName = $names[0];
        $this->lastName = $names[1];
    }

    public function getEmail(): string
    {
        return $this->firstName . "." . $this->lastName . "@globomanticshr.com";
    }

    public function __toString()
    {
        return $this->firstName . " " . $this->lastName . " - " . $this->monthlyIncome;
    }

    public function getMonthlyIncome(): int
    {
        return $this->monthlyIncome;
    }

    public function setMonthlyIncome(int $monthlyIncome): void
    {
        if ($monthlyIncome < 0) {
            throw new \Exception("Income must be positive");
        }
        $this->monthlyIncome = $monthlyIncome;
    }

    public function getNbHoursPerWeek(): int
    {
        return $this->nbHoursPerWeek;
    }

    public function setNbHoursPerWeek(int $nbHoursPerWeek): void
    {
        if ($nbHoursPerWeek <= 0) {
            throw new \Exception("Income must be positive");
        }
        $this->nbHoursPerWeek = $nbHoursPerWeek;
    }

    public function getFullName(): string
    {
        return $this->firstName . " " . $this->lastName;
    }

    public static function save(Employee   $employee)
    {
        try {
            $sb = "### EMPLOYEE RECORD ####";
            $sb .= PHP_EOL;
            $sb .= "NAME: " . $employee->getFullName();
            $sb .= PHP_EOL;
            $sb .= "POSITION: " .  self::getPosition($employee);
            $sb .= PHP_EOL;
            $sb .= "EMAIL: " .  $employee->getEmail();
            $sb .= PHP_EOL;
            $sb .= "MONTHLY WAGE: ". $employee->getMonthlyIncome();
        
            $logFilePath = "../../logs/" . str_replace(" ", "_", $employee->getFullName()) . ".rec";
            $logFileDirectory = dirname($logFilePath);
            if (!is_dir($logFileDirectory)) {
                mkdir($logFileDirectory, 0777, true);
            }
            touch($logFilePath);
            file_put_contents(
                $logFilePath,
                $sb
            );
            echo "Saved employee  {$employee->getFullName()} \n";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    private static function getPosition($employee)
    {
        $class = explode( '\\', get_class($employee));
        end( $class );
        $last = key( $class );
        $class = $class[ $last ];
        return $class;
    }
}
