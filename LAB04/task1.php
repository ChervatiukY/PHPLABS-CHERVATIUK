<?php
$array1 = [7, 9, 6, 7, 8];
$array2 = [9, 7, 25, 12, 13];
echo "Об'єднаний масив без дублікатів:<br><p>" . implode(", ", array_unique(array_merge($array1, $array2))) . "</p>";
?>