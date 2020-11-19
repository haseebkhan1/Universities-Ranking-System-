<?php
function IScore()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected <br>";
	
	$result = mySQL_Query("SELECT I1 FROM internationalization") or die(mySQL_error());
	$Irow = array();
	$Inewarr = array();
	
	$i= 0;
	while($Irow = mySQL_fetch_array($result))
	{
		$Inewarr[$i] = $Irow[0];
		
		$i++;
	}
	$a = sizeof($Inewarr);
	echo "<br>";
	$max = 0;
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Inewarr[$i]))
		{
			if($max < $Inewarr[$i])
			{
				$max = $Inewarr[$i];
			}	
		}	
	}
	
	$Iuni1 = array();
	for($i = 0; $i< sizeof($Inewarr); $i++)
	{
		$Iuni1[$i] = $Inewarr[$i] / $max *2;
	}
	print_r($Iuni1);
	
	
	$result = mySQL_Query("SELECT I2 FROM internationalization") or die(mySQL_error());
	$Irow = array();
	$Inewarr2 = array();
	
	$i= 0;
	while($Irow = mySQL_fetch_array($result))
	{
		$Inewarr2[$i] = $Irow[0];
		$i++;
	}
	$a = sizeof($Inewarr2);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Inewarr2[$i]))
		{
			if($max < $Inewarr2[$i])
			{
				$max = $Inewarr2[$i];
			}
			
		}
		
	}
	$Iuni2 = array();
	for($i = 0; $i< sizeof($Inewarr2); $i++)
	{
		$Iuni2[$i] = $Inewarr2[$i] / $max *1;
	}
	print_r($Iuni2);
	
	
	$result = mySQL_Query("SELECT I3 FROM internationalization") or die(mySQL_error());
	$Irow = array();
	$Inewarr3 = array();
	
	$i= 0;
	while($Irow = mySQL_fetch_array($result))
	{
		$Inewarr3[$i] = $Irow[0];
		$i++;
	}
	$a = sizeof($Inewarr3);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Inewarr3[$i]))
		{
			if($max < $Inewarr3[$i])
			{
				$max = $Inewarr3[$i];
			}
			
		}
		
	}
	$Iuni3 = array();
	for($i = 0; $i< sizeof($Inewarr3); $i++)
	{
		$Iuni3[$i] = $Inewarr3[$i] / $max *1;
	}
	print_r($Iuni3);
	
	
	
	$result = mySQL_Query("SELECT I4 FROM internationalization") or die(mySQL_error());
	$Irow = array();
	$Inewarr4 = array();
	
	$i= 0;
	while($Irow = mySQL_fetch_array($result))
	{
		$Inewarr4[$i] = $Irow[0];
		$i++;
	}
	$a = sizeof($Inewarr4);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Inewarr4[$i]))
		{
			if($max < $Inewarr4[$i])
			{
				$max = $Inewarr4[$i];
			}
			
		}
		
	}
	$Iuni4 = array();
	for($i = 0; $i< sizeof($Inewarr4); $i++)
	{
		$Iuni4[$i] = $Inewarr4[$i] / $max *1;
	}
	print_r($Iuni4);
	
	
	$result = mySQL_Query("SELECT I5 FROM internationalization") or die(mySQL_error());
	$Irow = array();
	$Inewarr5 = array();
	
	$i= 0;
	while($Irow = mySQL_fetch_array($result))
	{
		$Inewarr5[$i] = $Irow[0];
		$i++;
	}
	$a = sizeof($Inewarr5);
	echo "<br>";
	$max = 0;
	//echo $Irow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($Inewarr5[$i]))
		{
			if($max < $Inewarr5[$i])
			{
				$max = $Inewarr5[$i];
			}
			
		}
		
	}
	$Iuni5 = array();
	for($i = 0; $i< sizeof($Inewarr5); $i++)
	{
		$Iuni5[$i] = $Inewarr5[$i] / $max *1;
	}
	print_r($Iuni5);
	
	$Iscore = array();
	for($i = 0 ; $i < $a ; $i++)
	{
		$Iscore[$i] = $Iuni1[$i] + $Iuni2[$i] + $Iuni3[$i] + $Iuni4[$i] + $Iuni5[$i];
	}
	
	echo "<br>";
	print_r($Iscore);
}
?>