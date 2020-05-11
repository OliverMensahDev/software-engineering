<?php 


public static long nowPlusMonths(int months){
  checkTimeIsValid(months);
  return toEpochMilli(now().plusMonths(months));
}

public static long nowPlusWeeks(int weeks){
  checkTimeIsValid(weeks);
  return toEpochMilli(now().plusWeeks(weeks));
}

public static long nowPlusDays(int days){
  checkTimeIsValid(days);
  return toEpochMilli(now().plusDays(days));
}


private static long toEpochMilli(LocalDateTime time){
  return time.atZone(ZoneId.systemDefault())
          .toInstant()
          .toEpochMilli();
}


private static void checkTimeIsValid(int timeUnit){
  if(timeUnit <= 0){
      throw new IllegalArgumentException("Time Unit can't be <= 0. Value passed in: " + timeUnit);
  }
}