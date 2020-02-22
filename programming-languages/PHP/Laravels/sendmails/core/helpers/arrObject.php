<?php
namespace core\helpers;

class ArrObject
{
    private $object = null;
    public function __construct($object)
    {
        $this->object = (array) $object;
    }
    public function get($key)
    {
        return (isset($this->object[$key]) ? $this->object[$key] : null);
    }
    public function set($key, $value)
    {
        $this->object[$key] = $value;
        return $this->object;
    }

    public function all()
    {
        return $this->object;
    }
}
