<?php
/**
 * Business Jet Trait
 */
trait BusinessJet{
    public $seatCapacity;
    public $range;

    /**
     * @param mixed $operator
     * @return BusinessJet
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @param mixed $seatCapacity
     * @return BusinessJet
     */
    public function setSeatCapacity($seatCapacity)
    {
        $this->seatCapacity = $seatCapacity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeatCapacity()
    {
        return $this->seatCapacity;
    }

    /**
     * @param mixed $range
     * @return BusinessJet
     */
    public function setRange($range)
    {
        $this->range = $range;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRange()
    {
        return $this->range;
    }
}