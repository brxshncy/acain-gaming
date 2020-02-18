<?php

$localhost = 'localhost';
$user = 'root';
$pw = '';
$db = 'assessor_mis';

$conn = mysqli_connect($localhost,$user,$pw,$db);

if($conn){
			
}
else{
	die("Connection failed". mysqli_connect_error());
}