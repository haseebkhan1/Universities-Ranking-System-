<?php
function conn()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected";
	echo "<br>";
	
	$id=$_SESSION["id"];
	
	$R1=$_SESSION['R1'];
	$R2=$_SESSION['R2'];
	$R3=$_SESSION['R3'];
	$R4=$_SESSION['R4'];
	$R5=$_SESSION['R5'];
	$R6=$_SESSION['R6'];
	$R7=$_SESSION['R7'];
	$R8=$_SESSION['R8'];
	$R9=$_SESSION['R9'];
	$R10=$_SESSION['R10'];
	$R11=$_SESSION['R11'];
	$R12=$_SESSION['R12'];
	$R13=$_SESSION['R13'];
	$R14=$_SESSION['R14'];
	
	
	//session_start();
	
	$id = $_SESSION['id'];

	
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	//echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	//echo "DB Connected <br>";
	
	$result = mySQL_Query("SELECT UniversityName FROM admin WHERE Uni_id='$id'") or die(mySQL_error());
	$Rrow = array();
	$newarr = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr[$i] = $Rrow[0];
		
		$i++;
	}
	
	$uni = $newarr[0];
	
	mySQL_Query("INSERT INTO research (Uni_id, UniversityName, R1, R2, R3, R4, R5, R6, R7, R8, R9, R10, R11, R12, R13, R14, score)
	VALUES ('$id', '$uni', '$R1', '$R2', '$R3', '$R4', '$R5', '$R6', '$R7', '$R8', '$R9', '$R10', '$R11', '$R12', '$R13', '$R14','')") or die (mySQL_error());
	echo "Row Inserted";
}

conn();
include('internationalisation_Insert.php');
?>