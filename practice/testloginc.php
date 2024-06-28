<?php 

$rows = 8;

for($i=1; $i<=$rows;$i++) {
	// print spaces equal to rows starting from 
	for($j=$rows-$i; $j>=1; $j--) {
		echo " ";
	}
	
	// print asterisk increasing by 2
	for($k=1;$k <= 2 * $i-1; $k++) {
		echo "*";
	}
	
	echo PHP_EOL;
}

