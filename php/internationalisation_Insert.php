<?php
function Iconn()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected";
	echo "<br>";
	
	
	$id=$_SESSION['id'];	
	
	$I1=$_SESSION['I1'];
	$I2=$_SESSION['I2'];
	$I3=$_SESSION['I3'];
	$I4=$_SESSION['I4'];
	$I5=$_SESSION['I5'];
	
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
	
	mySQL_Query("INSERT INTO internationalization (Uni_id, UniversityName, I1, I2, I3, I4, I5, score)
	VALUES ('$id', '$uni', '$I1', '$I2', '$I3', '$I4', '$I5','')") or die (mySQL_error());
	echo "Row Inserted in Internationalization";
}

Iconn();
include('TeachingQuality_Insert.php');

?>