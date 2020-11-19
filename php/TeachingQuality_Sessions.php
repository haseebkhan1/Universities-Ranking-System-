<?php
function myFunction()
{


	$T1 = $_POST["T1"];
	$T2 = $_POST["T2"];
	$T3 = $_POST["T3"];
	$T4 = $_POST["T4"];
	$T5 = $_POST["T5"];
	
	


	session_start();
	$_SESSION['T1']=$T1;
	$_SESSION['T2']=$T2;
	$_SESSION['T3']=$T3;
	$_SESSION['T4']=$T4;
	$_SESSION['T5']=$T5;
	
	
}

myFunction();
include('newsocial.html');
?>