<?php
/**
 * Required Validator
 */
class Required {

    public static function validate($value = null){
        if(!empty($value))return true;
        return false;
    }
}