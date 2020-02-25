<?php
/**
 * Jets Trait
 */
trait Jets{
    use Airliner, BusinessJet {
        BusinessJet::setOperator insteadof Airliner;
        Airliner::setOperator as setOp;
    }
    public static $oPStatus = 'In service';
    public $operationsBase;

    /**
     * @param string $oPStatus
     */
    public static function setOPStatus($oPStatus)
    {
        self::$oPStatus = $oPStatus;
    }

    /**
     * @return string
     */
    public static function getOPStatus()
    {
        return self::$oPStatus;
    }

    /**
     * @param mixed $operationsBase
     * @return Jets
     */
    public function setOperationsBase($operationsBase)
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