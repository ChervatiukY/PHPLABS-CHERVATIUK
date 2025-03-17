<?php
function isPowerOfTwo($num) {
    return ($num > 0) && (($num & ($num - 1)) === 0);
}
$number = 64;
if (isPowerOfTwo($number)) {
    echo "$number є ступенем двійки.";
} else {
    echo "$number не є ступенем двійки.";
}
?>