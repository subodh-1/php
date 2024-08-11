<?php 
/**
 * program to find the longest commong substring
 * eg. 'chmukij', 'chandramukidefq' should return muki
 */

 function longest_common_substring($str1, $str2) {
    $common = '';

    $len1 = strlen($str1);
    $len2 = strlen($str2);
    $maxlength = 0;

    for($i=0; $i < $len1; $i++) {
        for ($j=0; $j < $len2; $j++) {
            $k= 0;
            while(($i+$k) < $len1 && ($j+$k) < $len2) {                
                if ($str1[$i+$k] === $str2[$j+$k]) {
                    $k++;
                    if ($k > $maxlength) {
                        $maxlength = $k;
                        $common = substr($str1, $i, $k);
                    }
                } else break;
            }
        }
    }
    return $common;
 }

 $s1 = 'chmukij';
 $s2 = 'chandramukidefq';
 echo longest_common_substring($s1, $s2);