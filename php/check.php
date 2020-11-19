<?php
	//session_start();
	
	$id = $_SESSION['id'];

	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	//echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	//echo "DB Connected <br>";
	
	$result = mySQL_Query("SELECT R1 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr[$i] = $Rrow[0];
		
		$i++;
	}
	$a = sizeof($newarr);
	//echo "<br>";
	$max = 0;
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr[$i]))
		{
			if($max < $newarr[$i])
			{
				$max = $newarr[$i];
			}	
		}	
	}
	
	
	$uni1 = array();
	for($i = 0; $i< sizeof($newarr); $i++)
	{
		$uni1[$i] = $newarr[$i] / $max *3;
	}
	//print_r($uni1);
	
	
	$result = mySQL_Query("SELECT R2 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr2 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr2[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr2);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr2[$i]))
		{
			if($max < $newarr2[$i])
			{
				$max = $newarr2[$i];
			}
			
		}
		
	}
	$uni2 = array();
	for($i = 0; $i< sizeof($newarr2); $i++)
	{
		$uni2[$i] = $newarr2[$i] / $max *2;
	}
	//print_r($uni2);
	
	
	$result = mySQL_Query("SELECT R3 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr3 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr3[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr3);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr3[$i]))
		{
			if($max < $newarr3[$i])
			{
				$max = $newarr3[$i];
			}
			
		}
		
	}
	$uni3 = array();
	for($i = 0; $i< sizeof($newarr3); $i++)
	{
		$uni3[$i] = $newarr3[$i] / $max *2;
	}
	//print_r($uni3);
	
	$result = mySQL_Query("SELECT R4 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr4 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr4[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr4);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr4[$i]))
		{
			if($max < $newarr4[$i])
			{
				$max = $newarr4[$i];
			}
			
		}
		
	}
	$uni4 = array();
	for($i = 0; $i< sizeof($newarr4); $i++)
	{
		$uni4[$i] = $newarr4[$i] / $max *2;
	}
	//print_r($uni4);
	
	
	$result = mySQL_Query("SELECT R5 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr5 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr5[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr5);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr5[$i]))
		{
			if($max < $newarr5[$i])
			{
				$max = $newarr5[$i];
			}
			
		}
		
	}
	$uni5 = array();
	for($i = 0; $i< sizeof($newarr5); $i++)
	{
		$uni5[$i] = $newarr5[$i] / $max *4;
	}
	//print_r($uni5);
	
	
	$result = mySQL_Query("SELECT R6 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr6 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr6[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr6);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr6[$i]))
		{
			if($max < $newarr6[$i])
			{
				$max = $newarr6[$i];
			}
			
		}
		
	}
	$uni6 = array();
	for($i = 0; $i< sizeof($newarr6); $i++)
	{
		$uni6[$i] = $newarr6[$i] / $max *1;
	}
	//print_r($uni6);
	
	
	$result = mySQL_Query("SELECT R7 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr7 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr7[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr7);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr7[$i]))
		{
			if($max < $newarr7[$i])
			{
				$max = $newarr7[$i];
			}
			
		}
		
	}
	$uni7 = array();
	for($i = 0; $i< sizeof($newarr7); $i++)
	{
		$uni7[$i] = $newarr7[$i] / $max *2;
	}
	//print_r($uni7);
	
	
	$result = mySQL_Query("SELECT R8 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr8 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr8[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr8);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr8[$i]))
		{
			if($max < $newarr8[$i])
			{
				$max = $newarr8[$i];
			}
			
		}
		
	}
	$uni8 = array();
	for($i = 0; $i< sizeof($newarr8); $i++)
	{
		$uni8[$i] = $newarr8[$i] / $max *4;
	}
	//print_r($uni8);
	
	$result = mySQL_Query("SELECT R9 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr9 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr9[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr9);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr9[$i]))
		{
			if($max < $newarr9[$i])
			{
				$max = $newarr9[$i];
			}
			
		}
		
	}
	$uni9 = array();
	for($i = 0; $i< sizeof($newarr9); $i++)
	{
		$uni9[$i] = $newarr9[$i] / $max *3;
	}
	//print_r($uni9);
	
	
	$result = mySQL_Query("SELECT R10 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr10 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr10[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr10);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr10[$i]))
		{
			if($max < $newarr10[$i])
			{
				$max = $newarr10[$i];
			}
			
		}
		
	}
	$uni10 = array();
	for($i = 0; $i< sizeof($newarr10); $i++)
	{
		$uni10[$i] = $newarr10[$i] / $max *3;
	}
	//print_r($uni10);
	
	
	$result = mySQL_Query("SELECT R11 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr11 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr11[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr11);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr11[$i]))
		{
			if($max < $newarr11[$i])
			{
				$max = $newarr11[$i];
			}
			
		}
		
	}
	$uni11 = array();
	for($i = 0; $i< sizeof($newarr11); $i++)
	{
		$uni11[$i] = $newarr11[$i] / $max *4;
	}
	//print_r($uni11);
	
	
	$result = mySQL_Query("SELECT R12 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr12 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr12[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr12);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr12[$i]))
		{
			if($max < $newarr12[$i])
			{
				$max = $newarr12[$i];
			}
			
		}
		
	}
	$uni12 = array();
	for($i = 0; $i< sizeof($newarr12); $i++)
	{
		$uni12[$i] = $newarr12[$i] / $max *2;
	}
	//print_r($uni12);
	
	
	$result = mySQL_Query("SELECT R13 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr13 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr13[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr13);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr13[$i]))
		{
			if($max < $newarr13[$i])
			{
				$max = $newarr13[$i];
			}
			
		}
		
	}
	$uni13 = array();
	for($i = 0; $i< sizeof($newarr13); $i++)
	{
		$uni13[$i] = $newarr13[$i] / $max *1;
	}
	//print_r($uni13);
	
	
	$result = mySQL_Query("SELECT R14 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr14 = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr14[$i] = $Rrow[0];
		$i++;
	}
	$a = sizeof($newarr14);
	//echo "<br>";
	$max = 0;
	//echo $Rrow[0];
	for($i = 0 ; $i < $a ; $i++)
	{
		if(isset($newarr14[$i]))
		{
			if($max < $newarr14[$i])
			{
				$max = $newarr14[$i];
			}
			
		}
		
	}
	$uni14 = array();
	for($i = 0; $i< sizeof($newarr14); $i++)
	{
		$uni14[$i] = $newarr14[$i] / $max *3;
	}
	//print_r($uni14);
	
	$Rscore = array();
	for($i = 0 ; $i < $a ; $i++)
	{
		$Rscore[$i] = $uni1[$i] + $uni2[$i] + $uni3[$i] + $uni4[$i] + $uni5[$i] + $uni6[$i] + $uni7[$i] + $uni8[$i] + $uni9[$i] + $uni10[$i] + $uni11[$i] + $uni12[$i] + $uni13[$i] + $uni14[$i];
	}
	
	//echo "<br>";
	//print_r($Rscore);
	
	//echo "<br>";
	//echo $Rscore[0];
	

	
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	//echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	//echo "DB Connected <br>";
	
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
	//echo "<br>";
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
	//print_r($Iuni1);
	
	
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
	//echo "<br>";
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
	//print_r($Iuni2);
	
	
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
	//echo "<br>";
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
	//print_r($Iuni3);
	
	
	
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
	//echo "<br>";
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
	//print_r($Iuni4);
	
	
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
	//echo "<br>";
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
	//print_r($Iuni5);
	
	$Iscore = array();
	for($i = 0 ; $i < $a ; $i++)
	{
		$Iscore[$i] = $Iuni1[$i] + $Iuni2[$i] + $Iuni3[$i] + $Iuni4[$i] + $Iuni5[$i];
	}
	
	//echo "<br>";
	//print_r($Iscore);
	//session_start();

	
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	//echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	//echo "DB Connected <br>";
	
	
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
	//echo "<br>";
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
	//print_r($Tuni1);
	
	
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
	//echo "<br>";
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
	//print_r($Tuni2);
	
	
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
	//echo "<br>";
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
	//print_r($Tuni3);
	
	
	
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
	//echo "<br>";
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
	//print_r($Tuni4);
	
	
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
	//echo "<br>";
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
	//print_r($Tuni5);
	
	$Tscore = array();
	for($i = 0 ; $i < $a ; $i++)
	{
		$Tscore[$i] = $Tuni1[$i] + $Tuni2[$i] + $Tuni3[$i] + $Tuni4[$i] + $Tuni5[$i];
	}
	
	//echo "<br>";
	//print_r($Tscore);
	//session_start();
	$_SESSION['Tscore'] = $Tscore[$id-1];


	
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	//echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	//echo "DB Connected <br>";
	
	
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
	//echo "<br>";
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
	//print_r($Suni1);
	
	
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
	//echo "<br>";
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
	//print_r($Suni2);
	
	
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
	//echo "<br>";
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
	//print_r($Suni3);
	
	
	
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
	//echo "<br>";
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
	//print_r($Suni4);
	
	
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
	//echo "<br>";
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
	//print_r($Suni5);
	
	$Sscore = array();
	for($i = 0 ; $i < $a ; $i++)
	{
		$Sscore[$i] = $Suni1[$i] + $Suni2[$i] + $Suni3[$i] + $Suni4[$i] + $Suni5[$i];
	}
	
	//echo "<br>";
	//print_r($Sscore);
	//session_start();
	$_SESSION['Sscore'] = $Sscore[$id-1];


	
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	//echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	//echo "DB Connected <br>";
	
	
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
	//echo "<br>";
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
	//print_r($Funi1);
	
	
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
	//echo "<br>";
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
	//print_r($Funi2);
	
	
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
	//echo "<br>";
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
	//print_r($Funi3);
	
	
	
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
	//echo "<br>";
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
	//print_r($Funi4);
	
	
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
	//echo "<br>";
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
	//print_r($Funi5);
	
	
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
	//echo "<br>";
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
	//print_r($Funi6);
	
	$Fscore = array();
	for($i = 0 ; $i < $a ; $i++)
	{
		$Fscore[$i] = $Funi1[$i] + $Funi2[$i] + $Funi3[$i] + $Funi4[$i] + $Funi5[$i] + $Funi6[$i];
	}
	
	//echo "<br>";
	//print_r($Fscore);
	//session_start();
	$_SESSION['Fscore'] = $Fscore[$id-1];



//echo "Research Score!!!";
//echo"<br>";
//$score1 = RScore();
//Rscore();
//echo "<br>";

//echo "<br>";
//echo "Internationalization Score!!!";
//echo "<br>";
//$score2 = IScore();
//Iscore();
//echo "<br>";

//echo "<br>";
//echo "Teaching Quality Score!!!";
//echo"<br>";
//$score3 = TScore();
//Tscore();
//echo "<br>";

//echo "<br>";
//echo "Social Integration Score!!!";
//echo"<br>";
//$score4 = SScore();
//Sscore();
//echo "<br>";

//echo "<br>";
//echo "Finance Score!!!";
//echo"<br>";
//$score5 = FScore();
//Fscore();
	
	$totalScore = $Rscore[$id-1]+$Iscore[$id-1]+$Tscore[$id-1]+$Sscore[$id-1]+$Fscore[$id-1];
	//session_start();
	$_SESSION['Rscore'] = $Rscore[$id-1];
	$_SESSION['Iscore'] = $Iscore[$id-1];

	$_SESSION['TotalScore'] = $totalScore;
	
	mysql_query("UPDATE research SET score = '$Rscore' WHERE id = '$id'");
	mysql_query("UPDATE internationalization SET score = '$Iscore' WHERE id = '$id'");
	mysql_query("UPDATE social_integration SET score = '$Sscore' WHERE id = '$id'");
	mysql_query("UPDATE teaching SET score = '$Tscore' WHERE id = '$id'");
	mysql_query("UPDATE finance SET score = '$Fscore' WHERE id = '$id'");

	
	include('DataInsert.php');
	
?>