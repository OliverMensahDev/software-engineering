<?php
/**
 * Jets Trait
 */
trait Jets{
    use Airliner, BusinessJet;
    public static $oPStatus = 'In service';
    public $operationsBase;

    /**
     * @param string $oPStatus
     */
    public static function setOPStatus(string $oPStatus)
    {
        self::$oPStatus = $oPStatus;
    }

    /**
     * @return string
     */
    public static function getOPStatus(): string
    {
        return self::$oPStatus;
    }

    /**
     * @param mixed $operationsBase
     * @return Jets
     */
    public function setOperationsBase(string $operationsBase)
    {
        $this->operationsBase = $operationsBase;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperationsBase()
    {
        return $this->operationsBase;
    }
}