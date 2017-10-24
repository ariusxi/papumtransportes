<?php
	$cr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$max = strlen($cr)-1;
	$gera = null;
	for($i=0; $i < 16; $i++){
		$gera .= $cr{mt_rand(0, $max)};
	}
	$gera = str_split($gera, 4);
	
	echo "$gera[0]-$gera[1]-$gera[2]-$gera[3]";
?>