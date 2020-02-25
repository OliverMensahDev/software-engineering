<?php
/**
 * Required Validator
 */
class Required {

    public function validate($value = null){
        if(!empty($value))return true;
        return false;
    }
}