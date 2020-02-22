<?php
namespace core\helpers;

use core\helpers\ArrObject;

class Actions
{
    public static function checkTimeFormat($time)
    {
        $split = explode(':', $time);
        if (!(count($split) == 2)) {
            return false;
        }
        $split = new ArrObject($split);
        $hr = $split->get(0);
        $min = $split->get(1);
        if (!(0 < $hr && $hr <= 24)) {
            return false;
        }
        if (!(00 <= $min && $min <= 59)) {
            return false;
        }

        return true;
    }

    public static function checkDateFormat($date)
    {
        $split = explode('/', $date);

        if (!count($split) == 3) {
            return false;
        }
        $split = new ArrObject($split);
        $day = $split->get(0);
        $month = $split->get(1);
        $year = $split->get(2);
        return checkdate($month, $day, $year);
    }

    public static function checkValidTimeDiff($from, $to)
    {
        $from = (int) str_replace(':', '', $from);
        $to = (int) str_replace(':', '', $to);
        $timeDiff = $to - $from;
        if ($timeDiff < 0) {
            return false;
        }
        return true;
    }

    public static function getDayFromDate($date)
    {
        $date = str_replace('/', '-', $date);
        $timestamp = strtotime($date);
        $day = date('l', $timestamp);
        return $day;
    }

    public static function getSystemDateFormat($date)
    {
        if (!self::checkDateFormat($date)) {
            return false;
        }
        $dateSplit = explode('/', $date);
        return $dateSplit[2] . '-' . $dateSplit[1] . '-' . $dateSplit[0];
    }
}
