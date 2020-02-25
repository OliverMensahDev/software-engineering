<?php
/**
 * Car Class
 */
class Car extends VehicleBase
{
    protected $hasTrunk;
    protected $owner;

    /**
     * @param $color
     * @param $type
     * @param null $hasTrunk
     */
    public function __construct($type, $hasTrunk = null){
        parent::__construct($type);
        $this->hasTrunk = $hasTrunk;
    }

    /**
     * @param $owner
     * @return $this
     */
    public function setOwner($owner){
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwner(){
        return $this->owner;
    }

    /**
     * @return null
     */
    public function getHasTrunk()
    {
        return $this->hasTrunk;
    }

    /**
     * @param null $hasTrunk
     * @return $this
     */
    public function setHasTrunk($hasTrunk)
    {
        $this->hasTrunk = $hasTrunk;
        return $this;
    }
}