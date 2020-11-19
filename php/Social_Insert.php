<?php
function Sconn()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected";
	echo "<br>";
	
	$id=$_SESSION['id'];	
	
	$S1=$_SESSION['S1'];
	$S2=$_SESSION['S2'];
	$S3=$_SESSION['S3'];
	$S4=$_SESSION['S4'];
	$S5=$_SESSION['S5'];
	
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
	
	mySQL_Query("INSERT INTO social_integration (Uni_id, UniversityName, S1, S2, S3, S4, S5, score)
	VALUES ('$id', '$uni', '$S1', '$S2', '$S3', '$S4', '$S5','')") or die (mySQL_error());
	echo "Row Inserted in Social Integration";
}

Sconn();
include('Finance_Insert.php');
?>