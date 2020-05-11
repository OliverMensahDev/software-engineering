<?php 
  new IntlGregorianCalendar(new DateTimeZone() {
          function getOffset(int $era, int $year, int $month, int $day, int $dayOfWeek, int $milliseconds) {
              return 0;
          }
          function setRawOffset(int $offsetMillis) {

          }
          function getRawOffset() {
              return 0;
          }

          function useDaylightTime() {
              return false;
          }
          function inDaylightTime(DateTime $date) {
              return false;
          }
      }, new Locale("en", "", ""));



    