<?php
echo "Enter the number of rows for the pyramid: ";
$rows = trim(fgets(STDIN));

if (!is_numeric($rows) || $rows < 1) {
    die("Invalid input. Please enter a positive numeric value for the number of rows.\n");
}

for ($i = 1; $i <= $rows; $i++) {
    // Print leading spaces
    for ($j = $rows - $i; $j >= 1; $j--) {
        echo " ";
    }

    // Print asterisks
    // This loop increases asterisks by 2 in each row
    for ($k = 1; $k <= 2 * $i - 1; $k++) {
        echo "*";
    }

    echo PHP_EOL;
} // End of outer for loop
?>
