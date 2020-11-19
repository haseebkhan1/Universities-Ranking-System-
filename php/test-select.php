<?php

function conn()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected";
	
	
	
	//$sql = "SELECT * FROM research";
	$result = mySQL_Query("SELECT * FROM research") or die(mySQL_error());
	$Rrow = array();
	echo "<br>"."Research Data";
	while($Rrow = mySQL_fetch_array($result))
	{
		echo "<br>".$Rrow[0]."<br>".$Rrow[1]."<br>".$Rrow[2]."<br>".$Rrow[3]."<br>".$Rrow[4]."<br>".$Rrow[5]."<br>".$Rrow[6]."<br>".$Rrow[7]."<br>".$Rrow[8]."<br>".$Rrow[9]."<br>".$Rrow[10]."<br>".$Rrow[11]."<br>".$Rrow[12]."<br>".$Rrow[13]."<br>".$Rrow[14];
		echo "<br>";
		
	}
	
	
	$i=0;
	$Iresult = mySQL_Query("SELECT * FROM internationalization") or die(mySQL_error());
	$Irow = array();
	echo "<br>"."Internationalization Data";
	while($Irow = mySQL_fetch_array($Iresult))
	{
		echo "<br>".$Irow[0]."<br>".$Irow[1]."<br>".$Irow[2]."<br>".$Irow[3]."<br>".$Irow[4]."<br>".$Irow[5];
		echo "<br>";
		$i++;
	}
	
	if($i==0)
		echo "No Result";
	
	$Tresult = mySQL_Query("SELECT * FROM teaching") or die(mySQL_error());
	$Trow = array();
	echo "<br>"."Teaching Data";
	while($Trow = mySQL_fetch_array($Tresult))
	{
		echo "<br>".$Trow[0]."<br>".$Trow[1]."<br>".$Trow[2]."<br>".$Trow[3]."<br>".$Trow[4]."<br>".$Trow[5];
		echo "<br>";
		
	}
	
	
	$Sresult = mySQL_Query("SELECT * FROM social_integration") or die(mySQL_error());
	$Srow = array();
	echo "<br>"."Social Integration Data";
	while($Srow = mySQL_fetch_array($Sresult))
	{
		echo "<br>".$Srow[0]."<br>".$Srow[1]."<br>".$Srow[2]."<br>".$Srow[3]."<br>".$Srow[4]."<br>".$Srow[5];
		echo "<br>";
		
	}
	
	
	$Fresult = mySQL_Query("SELECT * FROM finance") or die(mySQL_error());
	$Frow = array();
	echo "<br>"."Finance and Facilities Data";
	while($Frow = mySQL_fetch_array($Fresult))
	{
		echo "<br>".$Frow[0]."<br>".$Frow[1]."<br>".$Frow[2]."<br>".$Frow[3]."<br>".$Frow[4]."<br>".$Frow[5]."<br>".$Frow[6];
		echo "<br>";
		
	}
	
	
	
	
	/*if ($result->num_rows > 0) 
	{
    	// output data of each row
    	while($Rrow = $result->fetch_assoc()) 
		{
    		echo $Rrow;
    	}
	} 
	else 
	{
    echo "0 results";
	}
	
	$con->close();
	*/
}
conn();


?>