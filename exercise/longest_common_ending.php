<?php 
/**
 * program to find out the longes common ending
 * eg. jumping and ping should return ping as longest tcomon ending string
 */
function longest_common_ending($str1, $str2) {
    $common_str = "";
    $revstr1 = strrev($str1); 
    $revstr2 = strrev($str2);

    $minlength = min(strlen($str1), strlen($str2));
    for($i=0;$i<$minlength;$i++) {
        if ($revstr1[$i]===$revstr2[$i]) {
            $common_str = $revstr1[$i].$common_str;
            $revstr1[$i].PHP_EOL;
        } else {
            break;
        }
    }
    return $common_str;
}
$str1 = 'jumping';
$str2 = 'rping';
echo $common = longest_common_ending($str1, $str2);