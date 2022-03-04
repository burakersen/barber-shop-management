<?php

/*function money_f($val){
	if(strpos($val, '.')) return $val . ' TL';
	return $val.'.00 TL';
}*/

function money_f($val){
	return number_format($val, "2", ",", ".") . " TL";
}

function isActive($val){
	if($val==1) return "Yes";
	else return "No";
}