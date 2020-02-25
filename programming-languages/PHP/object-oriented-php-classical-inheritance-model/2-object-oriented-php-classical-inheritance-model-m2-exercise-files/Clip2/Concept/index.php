<?php
/**
 * Index File
 */
require 'Classes/VehicleBase.php';
require 'Classes/Car.php';

$car = new Car('sedan', 1);
$car->setColor('Red')
    ->setColorNumber('4524224RD')
    ->setColorHex('#e52b30');
$colorHex = $car->getColorHex();
$data = $car->getColorInfo();
?>
<h1>Color Information</h1>
<div style="background-color:<?php echo $colorHex?>;">
    <div>
        <?php foreach($data as $item):?>
            <div><?php echo $item?></div>
        <?php endforeach ?>
    <div></div>
</div>