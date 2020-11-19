<?php
function TScore()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected <br>";
	
	$result = mySQL_Query("SELECT T1 FROM teaching") or die(mySQL_error());
	$Trow = array();
	$Tnewarr = array();
	
	$i= 0;
	while($Trow = mySQL_fetch_array($result))
	{
		$Tnewarr[$i] = $Trow[0];
		
		$i++;
	}
	$a = sizeof($Tnewarr);
	echo "<br>";
	$max = 0;
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Tnewarr[$i]))
		{
			if($max < $Tnewarr[$i])
			{
				$max = $Tnewarr[$i];
			}	
		}	
	}
	
	$Tuni1 = array();
	for($i = 0; $i< sizeof($Tnewarr); $i++)
	{
		$Tuni1[$i] = $Tnewarr[$i] / $max *6;
	}
	print_r($Tuni1);
	
	
	$result = mySQL_Query("SELECT T2 FROM teaching") or die(mySQL_error());
	$Trow = array();
	$Tnewarr2 = array();
	
	$i= 0;
	while($Trow = mySQL_fetch_array($result))
	{
		$Tnewarr2[$i] = $Trow[0];
		$i++;
	}
	$a = sizeof($Tnewarr2);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Tnewarr2[$i]))
		{
			if($max < $Tnewarr2[$i])
			{
				$max = $Tnewarr2[$i];
			}
			
		}
		
	}
	$Tuni2 = array();
	for($i = 0; $i< sizeof($Tnewarr2); $i++)
	{
		$Tuni2[$i] = $Tnewarr2[$i] / $max *7;
	}
	print_r($Tuni2);
	
	
	$result = mySQL_Query("SELECT T3 FROM teaching") or die(mySQL_error());
	$Trow = array();
	$Tnewarr3 = array();
	
	$i= 0;
	while($Trow = mySQL_fetch_array($result))
	{
		$Tnewarr3[$i] = $Trow[0];
		$i++;
	}
	$a = sizeof($Tnewarr3);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Tnewarr3[$i]))
		{
			if($max < $Tnewarr3[$i])
			{
				$max = $Tnewarr3[$i];
			}
			
		}
		
	}
	$Tuni3 = array();
	for($i = 0; $i< sizeof($Tnewarr3); $i++)
	{
		$Tuni3[$i] = $Tnewarr3[$i] / $max *5;
	}
	print_r($Tuni3);
	
	
	
	$result = mySQL_Query("SELECT T4 FROM teaching") or die(mySQL_error());
	$Trow = array();
	$Tnewarr4 = array();
	
	$i= 0;
	while($Trow = mySQL_fetch_array($result))
	{
		$Tnewarr4[$i] = $Trow[0];
		$i++;
	}
	$a = sizeof($Tnewarr4);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Tnewarr4[$i]))
		{
			if($max < $Tnewarr4[$i])
			{
				$max = $Tnewarr4[$i];
			}
			
		}
		
	}
	$Tuni4 = array();
	for($i = 0; $i< sizeof($Tnewarr4); $i++)
	{
		$Tuni4[$i] = $Tnewarr4[$i] / $max *6;
	}
	print_r($Tuni4);
	
	
	$result = mySQL_Query("SELECT T5 FROM teaching") or die(mySQL_error());
	$Trow = array();
	$Tnewarr5 = array();
	
	$i= 0;
	while($Trow = mySQL_fetch_array($result))
	{
		$Tnewarr5[$i] = $Trow[0];
		$i++;
	}
	$a = sizeof($Tnewarr5);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Tnewarr5[$i]))
		{
			if($max < $Tnewarr5[$i])
			{
				$max = $Tnewarr5[$i];
			}
			
		}
		
	}
	$Tuni5 = array();
	for($i = 0; $i< sizeof($Tnewarr5); $i++)
	{
		$Tuni5[$i] = $Tnewarr5[$i] / $max *6;
	}
	print_r($Tuni5);
	
	$Tscore = array();
	for($i = 0 ; $i < $a ; $i++)
	{
		$Tscore[$i] = $Tuni1[$i] + $Tuni2[$i] + $Tuni3[$i] + $Tuni4[$i] + $Tuni5[$i];
	}
	
	echo "<br>";
	print_r($Tscore);
}	
?>