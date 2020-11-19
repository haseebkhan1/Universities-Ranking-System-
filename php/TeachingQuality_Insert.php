<?php
function Tconn()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected";
	echo "<br>";
	
	
	$id=$_SESSION['id'];

	$T1=$_SESSION['T1'];
	$T2=$_SESSION['T2'];
	$T3=$_SESSION['T3'];
	$T4=$_SESSION['T4'];
	$T5=$_SESSION['T5'];
	
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
	
	mySQL_Query("INSERT INTO teaching (Uni_id, UniversityName, T1, T2, T3, T4, T5, score)
	VALUES ('$id', '$uni', '$T1', '$T2', '$T3', '$T4', '$T5','')") or die (mySQL_error());
	echo "Row Inserted in Teaching Quality";
}

Tconn();
include('Social_Insert.php');
?>