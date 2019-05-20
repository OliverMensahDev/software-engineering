<?php 
$gorilla = new \Animals\Gorilla;
$ibis = new \Animals\StrawNeckedIbis;
if ($gorilla->isAwake() === true) {
  do {
    $gorilla->beatChest();
  } while ($ibis->isAsleep() === true);
    $ibis->flyAway();
}