<?php

public static void main(String[] args){

        int hour = getHourOfDay();

        if(isDay(hour)){
            // day time logic

        } else {
            // night time logic
        }
    }

    private static boolean isDay(int hour){
        return hour > 6 && hour < 22;
    }
}
