<?php

function myFunction()
{

	$S1 = $_POST["S1"];
	$S2 = $_POST["S2"];
	$S3 = $_POST["S3"];
	$S4 = $_POST["S4"];
	$S5 = $_POST["S5"];
	
	

	session_start();
	$_SESSION['S1']=$S1;
	$_SESSION['S2']=$S2;
	$_SESSION['S3']=$S3;
	$_SESSION['S4']=$S4;
	$_SESSION['S5']=$S5;
	
	
}

myFunction();
include('newfinence.html');

?>