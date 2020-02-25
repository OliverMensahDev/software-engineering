<?php
/**
 * Airliner Trait
 */
trait Airliner{
    public $hasFirstClass = false;
    public $hasBusinessClass = false;

    /**
     * @param boolean $hasFirstClass
     * @return Airliner
     */
    public function setHasFirstClass($hasFirstClass)
    {
        $this->hasFirstClass = $hasFirstClass;
        return $this;
    }

    /**
     * @param boolean $hasBusinessClass
     * @return Airliner
     */
    public function setHasBusinessClass($hasBusinessClass)
    {
        $this->hasBusinessClass = $hasBusinessClass;
        return $this;
    }
}