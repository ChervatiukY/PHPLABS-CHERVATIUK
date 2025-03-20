<?php
$width = htmlspecialchars($_GET['width']);
$height = htmlspecialchars($_GET['height']);
echo "Площа прямокутника: " . $width * $height;
?>