<?php
$timezone = new DateTimeZone('America/New_York');
$datetime = new \DateTime('2014-08-20', $timezone);
$datetime->setTimezone(new DateTimeZone('Asia/Hong_Kong'));

print_r($datetime);