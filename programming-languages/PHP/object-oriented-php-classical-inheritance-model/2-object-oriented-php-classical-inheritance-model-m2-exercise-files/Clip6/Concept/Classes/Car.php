<?php
/**
 * Car Class
 */
class Car extends VehicleBase
{
    protected $hasTrunk;
    protected $owner;
    protected $colorHex;
    protected $model = 'Blaze';

    /**
     * @param $color
     * @param $type
     * @param null $hasTrunk
     */
    public function __construct($type, $hasTrunk = null){
        parent::__construct($type);
        if($hasTrunk) $this->hasTrunk = $hasTrunk;
    }

    /**
     * @return bool|string
     */
    public function getColorInfo(){
        $info = parent::getColorInfo();
        if($this->colorHex){
            $data['General'] = parent::getColorInfo();
            $data['Hex Value'] = $this->colorHex;
            return $data;
        }
        return $info;
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

    /**
     * @param mixed $colorHex
     * @return $this
     */
    public function setColorHex($colorHex)
    {
        $this->colorHex = $colorHex;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorHex()
    {
        return $this->colorHex;
    }
}