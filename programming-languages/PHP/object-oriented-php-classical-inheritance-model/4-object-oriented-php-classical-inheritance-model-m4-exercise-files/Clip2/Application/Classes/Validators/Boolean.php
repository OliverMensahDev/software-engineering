<?php
/**
 * Boolean Validator
 */
class Boolean {

    public function validate($value = null){
        if($value == 0 || $value == 1) {
            return true;
        }
        return false;
    }
}