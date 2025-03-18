<?php
function isPrime($num) {
    if ($num < 2)
        return false; 
    for ($i = 2; $i <= sqrt($num); $i++)
        if ($num % $i == 0)
            return false; 
    return true; 
}
$numbers = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
foreach ($numbers as $number)
    echo "Число $number " . (isPrime($number) ? "є простим" : "є складеним") . "<br>";
?>