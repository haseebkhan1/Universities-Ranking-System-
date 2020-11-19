<?php
function Fconn()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected";
	echo "<br>";
	
	
	$id=$_SESSION["id"];

	$F1=$_SESSION['F1'];
	$F2=$_SESSION['F2'];
	$F3=$_SESSION['F3'];
	$F4=$_SESSION['F4'];
	$F5=$_SESSION['F5'];
	$F6=$_SESSION['F6'];
	
	
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
	
	mySQL_Query("INSERT INTO finance (Uni_id, UniversityName, F1, F2, F3, F4, F5, F6, score)
	VALUES ('$id', '$uni', '$F1', '$F2', '$F3', '$F4', '$F5', '$F6','')") or die (mySQL_error());
	echo "Row Inserted in Finance";
}

Fconn();
include('check.php');
?>