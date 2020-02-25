<?php
/**
 * Operator Interface
 */
interface TransportInterface
{
    public function setOperator(string $operator);
    public function getOperator();
    public function setCountry(string $country);
    public function getCountry();
}