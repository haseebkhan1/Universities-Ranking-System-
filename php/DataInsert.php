<?php
function dataconn()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected";
	echo "<br>";
	
	session_start();
	
	$id=$_SESSION['id'];
	
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
	
	$I1=$_SESSION['I1'];
	$I2=$_SESSION['I2'];
	$I3=$_SESSION['I3'];
	$I4=$_SESSION['I4'];
	$I5=$_SESSION['I5'];
	
	$T1=$_SESSION['T1'];
	$T2=$_SESSION['T2'];
	$T3=$_SESSION['T3'];
	$T4=$_SESSION['T4'];
	$T5=$_SESSION['T5'];
	
	$S1=$_SESSION['S1'];
	$S2=$_SESSION['S2'];
	$S3=$_SESSION['S3'];
	$S4=$_SESSION['S4'];
	$S5=$_SESSION['S5'];
	
	$F1=$_SESSION['F1'];
	$F2=$_SESSION['F2'];
	$F3=$_SESSION['F3'];
	$F4=$_SESSION['F4'];
	$F5=$_SESSION['F5'];
	$F6=$_SESSION['F6'];
	
	$totalScore = $_SESSION['TotalScore'];
	
	if($R1 <= 0.25)
		$R1 = "Satisfactory";
	if($R1 > 0.25 && $R1 < 0.75)
		$R1 = "Good";
	if($R1 >= 0.75)
		$R1 = "Excellent";
	
	if($R2 < 2)
		$R2 = "Satisfactory";
	if($R2 > 2 && $R2 < 5)
		$R2 = "Good";
	if($R2 >= 5)
		$R2 = "Excellent";
	
	if($R3 < 3)
		$R3 = "Satisfactory";
	if($R3 > 3 && $R3 < 8)
		$R3 = "Good";
	if($R3 >= 8)
		$R3 = "Excellent";
	
	if($R4 < 5)
		$R4 = "Satisfactory";
	if($R4 > 5 && $R4 < 10)
		$R4 = "Good";
	if($R4 >= 10)
		$R4 = "Excellent";
	
	if($R5 < 100000)
		$R5 = "Satisfactory";
	if($R5 > 100000 && $R5 < 500000)
		$R5 = "Good";
	if($R5 >= 500000)
		$R5 = "Excellent";
	
	if($R6 < 600000)
		$R6 = "Satisfactory";
	if($R6 > 600000 && $R6 < 800000)
		$R6 = "Good";
	if($R6 >= 800000)
		$R6 = "Excellent";
	
	if($R7 < 0.25)
		$R7 = "Satisfactory";
	if($R7 > 0.25 && $R7 < 0.75)
		$R7 = "Good";
	if($R7 >= 0.75)
		$R7 = "Excellent";
	
	if($R8 < 4)
		$R8 = "Satisfactory";
	if($R8 >= 4 && $R8 < 10)
		$R8 = "Good";
	if($R8 >= 10)
		$R8 = "Excellent";
	
	if($R9 < 0.25)
		$R9 = "Satisfactory";
	if($R9 > 0.25 && $R9 < 0.75)
		$R9 = "Good";
	if($R9 >= 0.75)
		$R9 = "Excellent";
	
	if($R10 < 3)
		$R10 = "Satisfactory";
	if($R10 > 3 && $R10 < 6)
		$R10 = "Good";
	if($R10 >= 6)
		$R10 = "Excellent";
	
	if($R11 < 30)
		$R11 = "Satisfactory";
	if($R11 > 30 && $R11 < 50)
		$R11 = "Good";
	if($R11 >= 50)
		$R11 = "Excellent";
	
	if($R12 < 10)
		$R12 = "Satisfactory";
	if($R12 > 10 && $R12 < 20)
		$R12 = "Good";
	if($R12 >= 20)
		$R12 = "Excellent";
	
	if($R13 < 100000)
		$R13 = "Satisfactory";
	if($R13 > 100000 && $R13 < 300000)
		$R13 = "Good";
	if($R13 >= 300000)
		$R13 = "Excellent";
	
	if($R14 < 0.75)
		$R14 = "Satisfactory";
	if($R14 > 0.75 && $R14 < 1.5)
		$R14 = "Good";
	if($R14 >= 1.5)
		$R14 = "Excellent";
	
	if($I1 <= 3)
		$I1 = "Satisfactory";
	if($I1 > 3 && $I1 < 8)
		$I1 = "Good";
	if($I1 >= 8)
		$I1 = "Excellent";
	
	if($I2 < 30)
		$I2 = "Satisfactory";
	if($I2 > 30 && $I2 < 100)
		$I2 = "Good";
	if($I2 >= 100)
		$I2 = "Excellent";
	
	if($I3 < 4)
		$I3 = "Satisfactory";
	if($I3 > 4 && $I3 < 10)
		$I3 = "Good";
	if($I3 >= 10)
		$I3 = "Excellent";
	
	if($I4 < 100)
		$I4 = "Satisfactory";
	if($I4 > 100 && $I4 < 200)
		$I4 = "Good";
	if($I4 >= 200)
		$I4 = "Excellent";
	
	if($I5 < 10)
		$I5 = "Satisfactory";
	if($I5 > 10 && $I5 < 70)
		$I5 = "Good";
	if($I5 >= 70)
		$I5 = "Excellent";
	
	if($T1 <= 80)
		$T1 = "Satisfactory";
	if($T1 > 80 && $T1 < 200)
		$T1 = "Good";
	if($T1 >= 200)
		$T1 = "Excellent";
	
	if($T2 < 20)
		$T2 = "Satisfactory";
	if($T2 > 20 && $T2 < 45)
		$T2 = "Good";
	if($T2 >= 45)
		$T2 = "Excellent";
	
	if($T3 < 3)
		$T3 = "Satisfactory";
	if($T3 > 3 && $T3 < 10)
		$T3 = "Good";
	if($T3 >= 10)
		$T3 = "Excellent";
	
	if($T4 < 10)
		$T4 = "Satisfactory";
	if($T4 > 10 && $T4 < 25)
		$T4 = "Good";
	if($T4 >= 25)
		$T4 = "Excellent";
	
	if($T5 < 6)
		$T5 = "Satisfactory";
	if($T5 > 6 && $T5 < 10)
		$T5 = "Good";
	if($T5 >= 10)
		$T5 = "Excellent";
	
	if($S1 <= 5)
		$S1 = "Satisfactory";
	if($S1 > 5 && $S1 < 10)
		$S1 = "Good";
	if($S1 >= 10)
		$S1 = "Excellent";
	
	if($S2 < 10)
		$S2 = "Satisfactory";
	if($S2 > 10 && $S2 < 20)
		$S2 = "Good";
	if($S2 >= 20)
		$S2 = "Excellent";
	
	if($S3 < 6)
		$S3 = "Satisfactory";
	if($S3 > 6 && $S3 < 12)
		$S3 = "Good";
	if($S3 >= 12)
		$S3 = "Excellent";
	
	if($S4 < 200)
		$S4 = "Satisfactory";
	if($S4 > 200 && $S4 < 350)
		$S4 = "Good";
	if($S4 >= 350)
		$S4 = "Excellent";
	
	if($S5 < 50)
		$S5 = "Satisfactory";
	if($S5 > 50 && $S5 < 100)
		$S5 = "Good";
	if($S5 >= 100)
		$S5 = "Excellent";
	
	if($F1 <= 150000)
		$F1 = "Satisfactory";
	if($F1 > 150000 && $F1 < 500000)
		$F1 = "Good";
	if($F1 >= 500000)
		$F1 = "Excellent";
	
	if($F2 < 0.25)
		$F2 = "Satisfactory";
	if($F2 > 0.25 && $F2 < 0.75)
		$F2 = "Good";
	if($F2 >= 0.75)
		$F2 = "Excellent";
	
	if($F3 < 0.8)
		$F3 = "Satisfactory";
	if($F3 > 0.8 && $F3 < 1)
		$F3 = "Good";
	if($F3 >= 1)
		$F3 = "Excellent";
	
	if($F4 < 0.5)
		$F4 = "Satisfactory";
	if($F4 > 0.5 && $F4 < 0.8)
		$F4 = "Good";
	if($F4 >= 0.8)
		$F4 = "Excellent";
	
	if($F5 < 20)
		$F5 = "Satisfactory";
	if($F5 > 20 && $F5 < 60)
		$F5 = "Good";
	if($F5 >= 60)
		$F5 = "Excellent";
	
	if($F6 < 150000)
		$F6 = "Satisfactory";
	if($F6 > 150000 && $F6 < 400000)
		$F6 = "Good";
	if($F6 >= 400000)
		$F6 = "Excellent";
	if($totalScore >80)
		$cl = "Excellent";
	if($totalScore < 80 && $totalScore > 60)
		$cl = "Good";
	if($totalScore < 60)
		$cl = "Satisfactory";
	
	
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
	
	
	
	mySQL_Query("INSERT INTO ranking (Uni_id, UniversityName, R1, R2, R3, R4, R5, R6, R7, R8, R9, R10, R11, R12, R13, R14, I1, I2, I3, I4, I5, T1, T2, T3, T4, T5, S1, S2, S3, S4, S5, F1, F2, F3, F4, F5, F6, CL)
	VALUES ('$id', '$uni', '$R1', '$R2', '$R3', '$R4', '$R5', '$R6', '$R7', '$R8', '$R9', '$R10', '$R11', '$R12', '$R13', '$R14', '$I1', '$I2', '$I3', '$I4', '$I5','$T1', '$T2', '$T3', '$T4', '$T5', '$S1', '$S2', '$S3', '$S4', '$S5', '$F1', '$F2', '$F3', '$F4', '$F5', '$F6', '$cl')") or die (mySQL_error());
	echo "Row Inserted";
	
	
}
dataconn();
header("location: http://localhost/FYP/fyp-1/datashow.php");
?>