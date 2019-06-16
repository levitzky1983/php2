<?php
spl_autoload_register(function ($className) {
    include "classes/$className.php";
});
$p1 = new DigitalProduct('Цифровой товар',3);
echo "Товар ".$p1->getTitle()." продан в количестве ".$p1->getCount()." шт. Доход составил ".$p1->showIncome()."<br>";

$p2 = new PiecePhysicalProduct('Штучный товар',5);
echo "Товар ".$p2->getTitle()." продан в количестве ".$p2->getCount()." шт. Доход составил ".$p2->showIncome()."<br>";

$p3 = new WeightProduct('Весовой товар',2,3,100);
echo "Товар ".$p3->getTitle()." продан в количестве ".$p3->getCount()." шт. по ".$p3->getNumberOfKg()." кг в каждой. Доход составил ".$p3->showIncome()."<br>";



