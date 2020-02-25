<?php
/**
 * Diagnostic Class
 * Part of a diagnostic library of code provided by a plane manufacturer
 */
class PlaneDiagnostic
{
    public function __construct($arg, $args)
    {
        $this->$arg = $arg;
        $this->$args = $args;
    }

    public function runDiagnostic(){
        //Run some diagnostic tests, return true if good.
        return true;
    }
}