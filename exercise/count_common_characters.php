<?php 
/**
 * This progrm finds the count of common characters
 * each common character is counted once only if repeated existence found
*/

$s1 = 'kjkkaaaaayiuyiuyi';
$s2 = 'chmrunmayeesu';

echo count_common_characters($s1, $s2);

function count_common_characters($str1, $str2) {
    $count = 0;
    $counted = array();

    for($i=0; $i < strlen($str1); $i++) {
        
        if (strchr($str2, $str1[$i]) !==FALSE && !in_array($str1[$i], $counted)) {
            $count++;
            array_push($counted, $str1[$i]);
        }
    }

    return $count;
}