<?php
/**
 * Match Validator
 */
class Match {

    /**
     * @param null $value
     * @return bool
     */
    public static function validate($value = null){
        if(empty($value))return false;
        //code this...
        $length = strlen($value);
        if($length <= self::$maximum && $length >= self::$minimum) {
            return true;
        }
        return false;
    }
}