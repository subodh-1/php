<?php 
//** This program was given by the Persistent interviewer */
/** 
 * Program to print the following pattern
 * * 
 *  * 
 *  *  * 
 *  *  *  * 
 *  *  *  *  * 
 *  *  *  *  *  * 
 *  *  *  *  *  *  * 
 *  *  *  *  *  * 
 *  *  *  *  * 
 *  *  *  * 
 *  *  * 
 *  * 
 * 
 * 
*/

echo "Please enter height of the triangle: ";
$height = trim(fgets(STDIN));
for ($i=0;$i<=$height;$i++){
    echo PHP_EOL;
    for ($j=0;$j<=$i;$j++) {
        echo " * ";
    }    
    
}
for ($l=0;$l<=$height;$l++){
    echo PHP_EOL;   
    for ($k=$height;$k>$l;$k--) {
        echo " * ";
    }
    
}
?>