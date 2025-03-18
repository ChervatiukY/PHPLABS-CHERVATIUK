<?php
$integer = 15;
$float = 8.75;
$string = "16";
$bool = true;
$sum = $integer + $float;
$product = $integer * (float)$string;
$sub = $float - $bool;
echo "Сума цілого та дійсного чисел: $sum<br>";
echo "Добуток цілого числа та перетвореного рядкового: $product<br>";
echo "Різниця дійсного числа та булевого значення: $sub<br>";
?>
