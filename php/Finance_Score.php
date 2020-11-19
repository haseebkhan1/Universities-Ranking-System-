<?php
function FScore()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected <br>";
	
	$result = mySQL_Query("SELECT F1 FROM finance") or die(mySQL_error());
	$Frow = array();
	$Fnewarr = array();
	
	$i= 0;
	while($Frow = mySQL_fetch_array($result))
	{
		$Fnewarr[$i] = $Frow[0];
		
		$i++;
	}
	$a = sizeof($Fnewarr);
	echo "<br>";
	$max = 0;
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Fnewarr[$i]))
		{
			if($max < $Fnewarr[$i])
			{
				$max = $Fnewarr[$i];
			}	
		}	
	}
	
	$Funi1 = array();
	for($i = 0; $i< sizeof($Fnewarr); $i++)
	{
		$Funi1[$i] = $Fnewarr[$i] / $max *5;
	}
	print_r($Funi1);
	
	
	$result = mySQL_Query("SELECT F2 FROM finance") or die(mySQL_error());
	$Frow = array();
	$Fnewarr2 = array();
	
	$i= 0;
	while($Frow = mySQL_fetch_array($result))
	{
		$Fnewarr2[$i] = $Frow[0];
		$i++;
	}
	$a = sizeof($Fnewarr2);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Fnewarr2[$i]))
		{
			if($max < $Fnewarr2[$i])
			{
				$max = $Fnewarr2[$i];
			}
			
		}
		
	}
	$Funi2 = array();
	for($i = 0; $i< sizeof($Fnewarr2); $i++)
	{
		$Funi2[$i] = $Fnewarr2[$i] / $max *3;
	}
	print_r($Funi2);
	
	
	$result = mySQL_Query("SELECT F3 FROM finance") or die(mySQL_error());
	$Frow = array();
	$Fnewarr3 = array();
	
	$i= 0;
	while($Frow = mySQL_fetch_array($result))
	{
		$Fnewarr3[$i] = $Frow[0];
		$i++;
	}
	$a = sizeof($Fnewarr3);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Fnewarr3[$i]))
		{
			if($max < $Fnewarr3[$i])
			{
				$max = $Fnewarr3[$i];
			}
			
		}
		
	}
	$Funi3 = array();
	for($i = 0; $i< sizeof($Fnewarr3); $i++)
	{
		$Funi3[$i] = $Fnewarr3[$i] / $max *4;
	}
	print_r($Funi3);
	
	
	
	$result = mySQL_Query("SELECT F4 FROM finance") or die(mySQL_error());
	$Frow = array();
	$Fnewarr4 = array();
	
	$i= 0;
	while($Frow = mySQL_fetch_array($result))
	{
		$Fnewarr4[$i] = $Frow[0];
		$i++;
	}
	$a = sizeof($Fnewarr4);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Fnewarr4[$i]))
		{
			if($max < $Fnewarr4[$i])
			{
				$max = $Fnewarr4[$i];
			}
			
		}
		
	}
	$Funi4 = array();
	for($i = 0; $i< sizeof($Fnewarr4); $i++)
	{
		$Funi4[$i] = $Fnewarr4[$i] / $max *5;
	}
	print_r($Funi4);
	
	
	$result = mySQL_Query("SELECT F5 FROM finance") or die(mySQL_error());
	$Frow = array();
	$Fnewarr5 = array();
	
	$i= 0;
	while($Frow = mySQL_fetch_array($result))
	{
		$Fnewarr5[$i] = $Frow[0];
		$i++;
	}
	$a = sizeof($Fnewarr5);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Fnewarr5[$i]))
		{
			if($max < $Fnewarr5[$i])
			{
				$max = $Fnewarr5[$i];
			}
			
		}
		
	}
	$Funi5 = array();
	for($i = 0; $i< sizeof($Fnewarr5); $i++)
	{
		$Funi5[$i] = $Fnewarr5[$i] / $max *1;
	}
	print_r($Funi5);
	
	
	$result = mySQL_Query("SELECT F6 FROM finance") or die(mySQL_error());
	$Frow = array();
	$Fnewarr6 = array();
	
	$i= 0;
	while($Frow = mySQL_fetch_array($result))
	{
		$Fnewarr6[$i] = $Frow[0];
		$i++;
	}
	$a = sizeof($Fnewarr6);
	echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Fnewarr6[$i]))
		{
			if($max < $Fnewarr6[$i])
			{
				$max = $Fnewarr6[$i];
			}
			
		}
		
	}
	$Funi6 = array();
	for($i = 0; $i< sizeof($Fnewarr6); $i++)
	{
		$Funi6[$i] = $Fnewarr6[$i] / $max *2;
	}
	print_r($Funi6);
	
	$Fscore = array();
	for($i = 0 ; $i < $a ; $i++)
	{
		$Fscore[$i] = $Funi1[$i] + $Funi2[$i] + $Funi3[$i] + $Funi4[$i] + $Funi5[$i] + $Funi6[$i];
	}
	
	echo "<br>";
	print_r($Fscore);
	
}
?>