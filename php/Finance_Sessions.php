<?php
function myFunction()
{
	$F1 = $_POST["F1"];
	$F2 = $_POST["F2"];
	$F3 = $_POST["F3"];
	$F4 = $_POST["F4"];
	$F5 = $_POST["F5"];
	$F6 = $_POST["F6"];
	
	session_start();
	$_SESSION['F1']=$F1;
	$_SESSION['F2']=$F2;
	$_SESSION['F3']=$F3;
	$_SESSION['F4']=$F4;
	$_SESSION['F5']=$F5;
	$_SESSION['F6']=$F6;	
}

/*
function conn()
{
	mySQL_connect("localhost","root","") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected";
	echo "<br>";
	
	
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


	//$sql = "INSERT INTO research (Uni_id, R1, R2, R3, R4, R5, R6, R7, R8, R9. R10, R11, R12, R13, R14)
	//VALUES ('123', '$R1', '$R2', '$R3', '$R4', '$R5', '$R6', '$R7', '$R8', '$R9', '$R10', '$R11', '$R12', '$R13', '$R14')";
	
	mySQL_Query("INSERT INTO research (Uni_id, R1, R2, R3, R4, R5, R6, R7, R8, R9, R10, R11, R12, R13, R14)
	VALUES ('', '$R1', '$R2', '$R3', '$R4', '$R5', '$R6', '$R7', '$R8', '$R9', '$R10', '$R11', '$R12', '$R13', '$R14')") or die (mySQL_error());
	echo "Row Inserted";
	
	
	if ($conn->query($sql) === TRUE) 
	{
    echo "New record created successfully";
	}
	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	

}

*/
myFunction();
include('Research_Insert.php');
//include('C:\xampp\htdocs\FYP\fyp-1\DataInsert.php');
//conn();

?>