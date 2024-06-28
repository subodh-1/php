<?php
$rows = 4;

for ($i = 1; $i <= $rows; $i++) {
    // Print leading spaces
    for ($j = $rows - $i; $j >= 1; $j--) {
        echo " ";
    }

    // Print asterisks
    for ($k = 1; $k <= 2 * $i - 1; $k++) {
        echo "*";
    }

    echo PHP_EOL;
}
?>
