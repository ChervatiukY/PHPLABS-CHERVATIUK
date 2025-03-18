<?php 
$input = "Привіт, давай знайомитись. Як тебе звати?";
$vowels = ['а', 'е', 'и', 'і','о', 'у'];
$chars = mb_str_split(mb_strtolower($input)); 
$count = 0;
foreach ($chars as $char)
    if (in_array($char, $vowels, true))
        $count++;
echo "Кількість голосних у рядку: $count";
?>

