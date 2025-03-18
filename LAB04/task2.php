<?php
$stringArray = ["Телефон", "Ручка", "Планшет"];
foreach ($stringArray as $str)
    echo "Довжина рядка '$str': " . mb_strlen($str, 'UTF-8') . "<br>";
?>
