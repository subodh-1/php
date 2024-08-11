<?php 
//** Persistent interview coding assignment */
/**
 * opening parenthesis should have equal               closing parenthesis.

    For example, the function should return 'true' for exp = [()]{}{[()()]()} and 'false'                     for exp = [(])
*/

function matchig_paranthesis($str){
    $bracket_stack = array();
    //echo (strlen($str));

    for ($i=0; $i<strlen($str);$i++) {
        //echo $str[$i];
        //echo PHP_EOL;
        
        $match = false;
        
        if ($str[$i] == '(') {
            array_push($bracket_stack, '(');
        } else if ($str[$i] == ')') {
            if (empty($bracket_stack) ) {
                return false;
            } else {
                array_pop($bracket_stack);
            }
        }
    }
    return empty($bracket_stack);
}

$test1 = "(a)+(b)=c";
$test2 = "[()]{}{[()()]()}";

if (matchig_paranthesis($test2)) {
    echo "Paranthesis matched";
} else {
    echo "Paranhthesis not matching";
}