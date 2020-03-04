<?php

$currDate = date("Y");
$penalty = 5;
$last_tax = "2011-03-04";
/*echo date("Y")." ".date("Y",strtotime($last_tax))."<br";*/

if(date("Y") == date("Y",strtotime($last_tax))){
	$current_gap =  date("m",strtotime($last_tax)) - date("m") ;
	echo $current_gap;
}
else{
	$year_gap = $currDate - date("Y",strtotime($last_tax));
	$month_gap = $year_gap * 12 ;
	$invoice_gap  = $month_gap - date("m",strtotime($last_tax));
	$total_penalty = $invoice_gap ;
	echo $total_penalty * $penalty;
}


?>




