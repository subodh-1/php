<?php 
//** This program was given by the Persistent interviewer */
/**
 * The interview was not sure about the result, he told me following out needed
 * 1. Only 2nd argument should be sorted, 1st argument should retain its order
 * 2. In the output, matching characters from the first string should be omitted
 * 3. 1st argument's matching characters should be appended at the beginning of the output
 * 4. Non matching characters from the first argument should be appended :: Thsi is very funny requirement, not possible with the 3rd condition mentioned above
 *   
 */
/**
 * The function is given two strings $a - template, $b - to be sorted. Sort the character in $b such that if the character is present in $a then it is sorted according to the order in $a and other characters are sorted alphabetically after the once found in $a.
 
Examples:
custom_sort("edc", "abcdefzyx") //output = "edcabfxyz"
custom_sort("hfi", "abcdefzyx") //output = "fabcdexyz"

custom_sort("fby", "abcdefzyx") //output = "fbyacdexz"
custom_sort("", "abcdefzyx")    //output =  "abcdefxyz"
 * 
*/

function custom_sort($str1, $str2) {
    $output = "";
    $str1_split = str_split($str1);
    $str2_split = str_split($str2);
    $matched = array();
    $not_matched = array();
    $matched_original = array();
    foreach ($str2_split as $key => $val) {
        if (in_array($val, $str1_split)) {
            array_push($matched, $val);
        } else {
            array_push($not_matched, $val);
        }
    }
    //print_r($matched); // SUBODH:: Test the output
    //print_r($not_matched); // SUBODH :: Test the output
    if (!empty($matched)) {
        foreach ($str1_split as $k => $v) {
            if (in_array($v, $matched)) {
                array_push($matched_original, $v);
            }
        }
    }
    else {
        $matched_original =  $str1_split;
    }
    $sorted_str1 = implode('',$matched_original);
    if (!empty($not_matched)){
        sort($not_matched);
    }
    $sorted_str2 = implode('',$not_matched);
    $output = $sorted_str1.$sorted_str2;
    return $output;
}

//First test
$result = custom_sort("edc", "abcdefzyx");
echo $result;
echo PHP_EOL;

//Second test
$result = custom_sort("hfi", "abcdefzyx");
echo $result;
echo PHP_EOL;

//Third test
$result = custom_sort("fby", "abcdefzyx");
echo $result;
echo PHP_EOL;

//Fourth test
$result = custom_sort("", "abcdefzyx");
echo $result;
echo PHP_EOL;


//Firt test from my side, all characters from the 1st parameters mathing hence no sorting of 2nd params will be done
$result = custom_sort("abcdefzyx", "zyxabcdef");
echo $result;
echo PHP_EOL;

?>