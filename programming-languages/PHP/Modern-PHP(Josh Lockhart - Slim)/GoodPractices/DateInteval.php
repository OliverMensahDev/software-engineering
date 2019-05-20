<?php
// Create DateTime instance
$datetime = new DateTime('2014-01-01 14:00:00');
// Create two weeks interval
$interval = new DateInterval('P2W');
// Modify DateTime instance
$datetime->add($interval);
echo $datetime->format('Y-m-d H:i:s') ,PHP_EOL;


// Create DateTime instance
$datetime = new DateTime('14:00');
// Create two weeks interval
$interval = new DateInterval('PT2H');
// Modify DateTime instance
$datetime->add($interval);
echo $datetime->format('H:i'), PHP_EOL;


$dateStart = new \DateTime();
$dateInterval = \DateInterval::createFromDateString('-1 day');
$datePeriod = new \DatePeriod($dateStart, $dateInterval, 3);
foreach ($datePeriod as $date) {
    echo $date->format('Y-m-d'), PHP_EOL;
}