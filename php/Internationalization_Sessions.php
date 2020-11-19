<?php
function myFunction()
{
	$I1 = $_POST["I1"];
	$I2 = $_POST["I2"];
	$I3 = $_POST["I3"];
	$I4 = $_POST["I4"];
	$I5 = $_POST["I5"];


	session_start();
	$_SESSION['I1']=$I1;
	$_SESSION['I2']=$I2;
	$_SESSION['I3']=$I3;
	$_SESSION['I4']=$I4;
	$_SESSION['I5']=$I5;
}

myFunction();

include('newteachingqualtiy.html');

?>