<?php

function myFunction()
{


	$R1 = $_POST["R1"];
	$R2 = $_POST["R2"];
	$R3 = $_POST["R3"];
	$R4 = $_POST["R4"];
	$R5 = $_POST["R5"];
	$R6 = $_POST["R6"];
	$R7 = $_POST["R7"];
	$R8 = $_POST["R8"];
	$R9 = $_POST["R9"];
	$R10 = $_POST["R10"];
	$R11 = $_POST["R11"];
	$R12 = $_POST["R12"];
	$R13 = $_POST["R13"];
	$R14 = $_POST["R14"];

	session_start();

	$_SESSION['R1']=$R1;
	$_SESSION['R2']=$R2;
	$_SESSION['R3']=$R3;
	$_SESSION['R4']=$R4;
	$_SESSION['R5']=$R5;
	$_SESSION['R6']=$R6;
	$_SESSION['R7']=$R7;
	$_SESSION['R8']=$R8;
	$_SESSION['R9']=$R9;
	$_SESSION['R10']=$R10;
	$_SESSION['R11']=$R11;
	$_SESSION['R12']=$R12;
	$_SESSION['R13']=$R13;
	$_SESSION['R14']=$R14;
	
	
	
	
}

function conn()
{
	mySQL_connect("localhost","root","") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected";
}



myFunction();
include('internationalisation.HTML');
//conn();
?>


