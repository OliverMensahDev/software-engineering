<?php 


public static long nowPlusMonths(int months){
  if(months <= 0){
    throw new IllegalArgumentException("Time Unit can't be <= 0. Value passed in: " + months);
  }
  return LocalDateTime.now().plusMonths(months)
                .atZone(ZoneId.systemDefault())
                .toInstant()
                .toEpochMilli();
}

public static long nowPlusWeeks(int weeks){
  if(weeks <=0 ){
    throw new IllegalArgumentException("Time Unit can't be <= 0. Value passed in: " + weeks);
  }
  return LocalDateTime.now()
  .plusWeeks(weeks)
  .atZone(ZoneId.systemDefault())
  .toInstant()
  .toEpochMilli();}

public static long nowPlusDays(int days){
  if(days <= 0){
    throw new IllegalArgumentException("Time Unit can't be <= 0. Value passed in: " + days);
  }
  return LocalDateTime.now()
                .plusDays(days)
                .atZone(ZoneId.systemDefault())
                .toInstant()
                .toEpochMilli();
}
