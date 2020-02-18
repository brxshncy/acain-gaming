<?php

	$last_payment = date("Y",strtotime("2001-09-01"));

	$present_year = date("Y");

	$no_pay = $present_year - $last_payment;

	$property_value = 1000000;


	$tax_percentage = 0.02375;

	$tax_value = $property_value * $tax_percentage;

	$penalty_value = .02;

	$penalty = $property_value * $penalty_value;

	$total_penalty = $no_pay * $penalty * 12;

	echo "Last payment: ".$last_payment."<br>";
	echo "Year today:: ".$present_year."<br>";
	echo "Current Property Value: ".$property_value."<br>";
	echo "Tax Percentage: ".$tax_percentage."<br>";
	echo "Tax Value: ".$tax_value."<br>";
	echo "Penalty Value: ".$penalty_value."<br>";
	echo "Penalty per month: ".$penalty."<br>";
	echo "Total Penalty: ".$total_penalty."<br>";

?>