<?php 
function nowPlusTime(int $months, int $weeks, int $days) {
  return LocalDateTime.now().plusMonths($months)
                .plusWeeks($weeks)
                .plusDays($days)
                .atZone(ZoneId.systemDefault())
                .toInstant()
                .toEpochMilli();

}