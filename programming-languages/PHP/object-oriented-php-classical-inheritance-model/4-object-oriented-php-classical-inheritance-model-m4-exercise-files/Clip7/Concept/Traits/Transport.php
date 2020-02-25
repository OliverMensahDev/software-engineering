<?php
/**
 * Transport Trait
 */
trait Transport
{
    protected $operator;
    protected $country;

    /**
     * @param mixed $operator
     * @return object|void
     */
    public function setOperator(string $operator): TransportInterface
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return $this|object
     */
    public function setCountry(string $country): TransportInterface
    {
        $this->country = $country;
        return $this;
    }
}