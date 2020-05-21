<?php 
namespace app\personnel;

use RuntimeException;

class Subcontractor extends Employee 
{  
  public function __construct(string $fullName, string $monthlyIncome)
  {
    parent::__construct($fullName, $monthlyIncome);
  }

  public function requestTimeOff(int $nbDays, Employee $manager)
  {
      throw new RuntimeException("Not Implemented");
  }

  public function approveSLA(ServiceLicenseAgreement $sla)
  {
      $result = false;
      if($sla->getMinUptimePercent() >= 98 && $sla->getProblemResolutionTimeDays() <= 2){
          $result = true;
      }
      echo "SLA approval for {$this->getFullName()}: {$result}";
      return $result;
  }
}
