<?php
/**
 * Alnum Validator
 */
class Alnum {

    /**
     * @param null $value
     * @return bool
     */
    public static function validate($value = null){
        if(empty($value))return false;

        if(ctype_alnum($value)){
            return true;
        }
        return false;
    }
}