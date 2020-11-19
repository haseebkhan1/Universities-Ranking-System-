<?php
function SScore()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected <br>";
	
	$result = mySQL_Query("SELECT S1 FROM social_integration") or die(mySQL_error());
	$Srow = array();
	$Snewarr = array();
	
	$i= 0;
	while($Srow = mySQL_fetch_array($result))
	{
		$Snewarr[$i] = $Srow[0];
		
		$i++;
	}
	$a = sizeof($Snewarr);
	echo "<br>";
	$max = 0;
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Snewarr[$i]))
		{
			if($max < $Snewarr[$i])
			{
				$max = $Snewarr[$i];
			}	
		}	
	}
	
	$Suni1 = array();
	for($i = 0; $i< sizeof($Snewarr); $i++)
	{
		$Suni1[$i] = $Snewarr[$i] / $max *2;
	}
	print_r($Suni1);
	
	
	$result = mySQL_Query("SELECT S2 FROM social_integration") or die(mySQL_error());
	$Srow = array();
	$Snewarr2 = array();
	
	$i= 0;
	while($Srow = mySQL_fetch_array($result))
	{
		$Snewarr2[$i] = $Srow[0];
		$i++;
	}
	$a = sizeof($Snewarr2);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Snewarr2[$i]))
		{
			if($max < $Snewarr2[$i])
			{
				$max = $Snewarr2[$i];
			}
			
		}
		
	}
	$Suni2 = array();
	for($i = 0; $i< sizeof($Snewarr2); $i++)
	{
		$Suni2[$i] = $Snewarr2[$i] / $max *1;
	}
	print_r($Suni2);
	
	
	$result = mySQL_Query("SELECT S3 FROM social_integration") or die(mySQL_error());
	$Srow = array();
	$Snewarr3 = array();
	
	$i= 0;
	while($Srow = mySQL_fetch_array($result))
	{
		$Snewarr3[$i] = $Srow[0];
		$i++;
	}
	$a = sizeof($Snewarr3);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Snewarr3[$i]))
		{
			if($max < $Snewarr3[$i])
			{
				$max = $Snewarr3[$i];
			}
			
		}
		
	}
	$Suni3 = array();
	for($i = 0; $i< sizeof($Snewarr3); $i++)
	{
		$Suni3[$i] = $Snewarr3[$i] / $max *1;
	}
	print_r($Suni3);
	
	
	
	$result = mySQL_Query("SELECT S4 FROM social_integration") or die(mySQL_error());
	$Srow = array();
	$Snewarr4 = array();
	
	$i= 0;
	while($Srow = mySQL_fetch_array($result))
	{
		$Snewarr4[$i] = $Srow[0];
		$i++;
	}
	$a = sizeof($Snewarr4);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Snewarr4[$i]))
		{
			if($max < $Snewarr4[$i])
			{
				$max = $Snewarr4[$i];
			}
			
		}
		
	}
	$Suni4 = array();
	for($i = 0; $i< sizeof($Snewarr4); $i++)
	{
		$Suni4[$i] = $Snewarr4[$i] / $max *2;
	}
	print_r($Suni4);
	
	
	$result = mySQL_Query("SELECT S5 FROM social_integration") or die(mySQL_error());
	$Srow = array();
	$Snewarr5 = array();
	
	$i= 0;
	while($Srow = mySQL_fetch_array($result))
	{
		$Snewarr5[$i] = $Srow[0];
		$i++;
	}
	$a = sizeof($Snewarr5);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Snewarr5[$i]))
		{
			if($max < $Snewarr5[$i])
			{
				$max = $Snewarr5[$i];
			}
			
		}
		
	}
	$Suni5 = array();
	for($i = 0; $i< sizeof($Snewarr5); $i++)
	{
		$Suni5[$i] = $Snewarr5[$i] / $max *2;
	}
	print_r($Suni5);
	
	$Sscore = array();
	for($i = 0 ; $i < $a ; $i++)
	{
		$Sscore[$i] = $Suni1[$i] + $Suni2[$i] + $Suni3[$i] + $Suni4[$i] + $Suni5[$i];
	}
	
	echo "<br>";
	print_r($Sscore);
	
}
?>