<?php
$start = new DateTime();
$interval = new DateInterval('P2D');
$period = new DatePeriod($start, $interval, 3);
foreach ($period as $nextDateTime) {
echo $nextDateTime->format('Y-m-d H:i:s'), PHP_EOL;
}

$start = new DateTime();
$interval = new DateInterval('P2D');
$period = new DatePeriod(
$start,
$interval,
3,
DatePeriod::EXCLUDE_START_DATE
);
foreach ($period as $nextDateTime) {
echo $nextDateTime->format('Y-m-d H:i:s'), PHP_EOL;
}