<?php 
    echo "Enter height of the pyramid: ";
    $height = trim(fgets(STDIN));
    for ($i=0;$i<=$height;$i++) {
        echo PHP_EOL;
        for ($k=0;$k<=$i;$k++){
            echo " ";
        }
        for ($j=$height;$j>=$i;$j--) {
            echo " *";
        }
    }
?>