<?php
function entropy($Prob1,$Prob2,$Prob3)
{
	$ent = -($Prob1 * log($Prob1,2.0))-($Prob2 * log($Prob2,2.0))-($Prob3 * log($Prob3,2.0));
	return $ent;
	//echo(log(2.7183) . "<br>");
	//echo log(0,2.0);
	//echo "<br>";
}
function decision()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	//echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	//echo "DB Connected <br>";
	
	$result = mySQL_Query("SELECT CL FROM ranking") or die(mySQL_error());
	$Drow = array();
	$CL = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$CL[$i] = $Drow[0];
		$i++;
	}
	$totalCL = sizeof($CL);
	print_r($CL);
	echo "<br>"; 
	echo "Total Class Labels: " . $totalCL;
	echo "<br>";
	$totalE=0;
	$totalG=0;
	$totalS=0;
	
	for($a = 0; $a < $totalCL; $a++)
	{
		if(isset($CL[$a]))
		{
			if($CL[$a] == "Excellent")
			{
				$totalE++;
			}
			else
				if($CL[$a] == "Good")
				{
					$totalG++;
				}
				else
					if($CL[$a] == "Satisfactory")
					{
						$totalS++;
					}
		}
	
	}
	session_start();
	$_SESSION["totslE"] = $totalE;
	$_SESSION["totalG"] = $totalG;
	$_SESSION["totalS"] = $totalS;
	
	$totalEnt=0;
	$ProbE=$totalE/$totalCL;
	$ProbG=$totalG/$totalCL;
	$ProbS=$totalS/$totalCL;
	
	$totalEnt=-($ProbE * log($ProbE,2.0))-($ProbG * log($ProbG,2.0))-($ProbS * log($ProbS,2.0));
	
	echo "Total Excellent: " . $totalE;
	echo "<br>";
	echo "Total Good: " . $totalG;
	echo "<br>";
	echo "Total Satisfactory: " . $totalS;
	
	echo "<br>" . "Total Entropy: " . $totalEnt;
	
	
	
	$result = mySQL_Query("SELECT R1 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R1 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR1 = sizeof($R1);
	echo "<br>";
	print_r($R1);
	echo "<br>"; 
	echo "Total R1: " . $totalR1;
	
	echo "<br>";
	echo "<h2>R1 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R1E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1E = sizeof($R1E);
	echo "Total R1 Excellent: " . $totalR1E . "<br>";
	$ProbR1E = $totalR1E/$totalR1;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R1EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1EE = sizeof($R1EE);
	$ProbR1EE = $totalR1EE/$totalR1E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R1EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1EG = sizeof($R1EG);
	$ProbR1EG = $totalR1EG/$totalR1E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R1ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1ES = sizeof($R1ES);
	$ProbR1ES = $totalR1ES/$totalR1E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R1G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1G = sizeof($R1G);
	echo "Total R1 Good: " . $totalR1G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R1GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1GE = sizeof($R1GE);
	$ProbR1GE = $totalR1GE/$totalR1G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R1GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1GG = sizeof($R1GG);
	$ProbR1GG = $totalR1GG/$totalR1G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R1GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1GS = sizeof($R1GS);
	$ProbR1GS = $totalR1GS/$totalR1G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R1S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1S = sizeof($R1S);
	echo "Total R1 Satisfactory: " . $totalR1S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R1SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1SE = sizeof($R1SE);
	$ProbR1SE = $totalR1SE/$totalR1S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R1SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1SG = sizeof($R1SG);
	$ProbR1SG = $totalR1SG/$totalR1S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R1 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R1SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R1SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR1SS = sizeof($R1SS);
	$ProbR1SS = $totalR1SS/$totalR1S;
	
	
	
	//Entropy of R1
	$ProbR1E= $totalR1E/$totalR1;
	$ProbR1G= $totalR1G/$totalR1;
	$ProbR1S= $totalR1S/$totalR1;
	
	//$EntR1E = -($ProbR1E * log($ProbR1E,2.0))-($ProbR1G * log($ProbR1G,2.0))-($ProbR1S * log($ProbR1S,2.0));
	//$EntR1G = -($ProbR1G * log($ProbR1G,2.0))-($ProbR1G * log($ProbR1G,2.0))-($ProbR1S * log($ProbR1S,2.0));
	//$EntR1S = -($ProbR1S * log($ProbR1S,2.0))-($ProbR1S * log($ProbR1G,2.0))-($ProbR1S * log($ProbR1S,2.0));
	
	if($ProbR1EE == 0 || $ProbR1EG == 0 || $ProbR1ES == 0)
	{
		$EntR1 = 0;
	}
	else
	{
		$EntR1= $ProbR1E * entropy($ProbR1EE,$ProbR1EG,$ProbR1ES) + $ProbR1G * entropy($ProbR1GE,$ProbR1GG,$ProbR1GS) + $ProbR1S * entropy($ProbR1SE,$ProbR1SG,$ProbR1SS);
	}
	
	echo "<br>";
	echo "Entropy of R1 AND CL is: " . $EntR1;
	echo "<br>";
	
	
	//R2
	
	$result = mySQL_Query("SELECT R2 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R2 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR2 = sizeof($R2);
	echo "<br>";
	print_r($R2);
	echo "<br>"; 
	echo "Total R2: " . $totalR2;
	
	
	
	//R2 Prob
	echo "<h2>R2 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R2E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2E = sizeof($R2E);
	echo "Total R2 Excellent: " . $totalR2E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R2EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2EE = sizeof($R2EE);
	$ProbR2EE = $totalR2EE/$totalR2E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R2EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2EG = sizeof($R2EG);
	$ProbR2EG = $totalR2EG/$totalR2E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R2ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2ES = sizeof($R2ES);
	$ProbR2ES = $totalR2ES/$totalR2E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R2G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2G = sizeof($R2G);
	echo "Total R2 Good: " . $totalR2G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R2GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2GE = sizeof($R2GE);
	$ProbR2GE = $totalR2GE/$totalR2G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R2GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2GG = sizeof($R2GG);
	$ProbR2GG = $totalR2GG/$totalR2G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R2GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2GS = sizeof($R2GS);
	$ProbR2GS = $totalR2GS/$totalR2G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R2S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2S = sizeof($R2S);
	echo "Total R2 Satisfactory: " . $totalR2S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R2SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2SE = sizeof($R2SE);
	$ProbR2SE = $totalR2SE/$totalR2S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R2SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2SG = sizeof($R2SG);
	$ProbR2SG = $totalR2SG/$totalR2S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R2 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R2SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R2SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR2SS = sizeof($R2SS);
	$ProbR2SS = $totalR2SS/$totalR2S;
	
	
	//Entropy of R2
	
	$ProbR2E= $totalR2E/$totalR2;
	$ProbR2G= $totalR2G/$totalR2;
	$ProbR2S= $totalR2S/$totalR2;
	
	
	if($ProbR2EE == 0 || $ProbR2EG == 0 || $ProbR2ES == 0)
	{
		$EntR2 = 0;
	}
	else
	{
		$EntR2= $ProbR2E * entropy($ProbR2EE,$ProbR2EG,$ProbR2ES) + $ProbR2G * entropy($ProbR2GE,$ProbR2GG,$ProbR2GS) + $ProbR2S * entropy($ProbR2SE,$ProbR2SG,$ProbR2SS);
	}
	
	echo "<br>";
	echo "Entropy of R2 AND CL is: " . $EntR2;
	echo "<br>";
	
	
	
	//R3
	
	$result = mySQL_Query("SELECT R3 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R3 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR3 = sizeof($R3);
	echo "<br>";
	print_r($R3);
	echo "<br>"; 
	echo "Total R3: " . $totalR3;
	
	
	
	//R3 Prob
	echo "<h2>R3 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R3E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3E = sizeof($R3E);
	echo "Total R3 Excellent: " . $totalR3E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R3EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3EE = sizeof($R3EE);
	$ProbR3EE = $totalR3EE/$totalR3E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R3EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3EG = sizeof($R3EG);
	$ProbR3EG = $totalR3EG/$totalR3E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R3ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3ES = sizeof($R3ES);
	$ProbR3ES = $totalR3ES/$totalR3E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R3G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3G = sizeof($R3G);
	echo "Total R3 Good: " . $totalR3G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R3GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3GE = sizeof($R3GE);
	$ProbR3GE = $totalR3GE/$totalR3G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R3GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3GG = sizeof($R3GG);
	$ProbR3GG = $totalR3GG/$totalR3G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R3GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3GS = sizeof($R3GS);
	$ProbR3GS = $totalR3GS/$totalR3G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R3S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3S = sizeof($R3S);
	echo "Total R3 Satisfactory: " . $totalR3S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R3SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3SE = sizeof($R3SE);
	$ProbR3SE = $totalR3SE/$totalR3S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R3SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3SG = sizeof($R3SG);
	$ProbR3SG = $totalR3SG/$totalR3S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R3 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R3SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R3SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR3SS = sizeof($R3SS);
	$ProbR3SS = $totalR3SS/$totalR3S;
	
	
	//Entropy of R3
	
	$ProbR3E= $totalR3E/$totalR3;
	$ProbR3G= $totalR3G/$totalR3;
	$ProbR3S= $totalR3S/$totalR3;
	
	
	if($ProbR3EE == 0 || $ProbR3EG == 0 || $ProbR3ES == 0)
	{
		$EntR3 = 0;
	}
	else
	{
		$EntR3= $ProbR3E * entropy($ProbR3EE,$ProbR3EG,$ProbR3ES) + $ProbR3G * entropy($ProbR3GE,$ProbR3GG,$ProbR3GS) + $ProbR3S * entropy($ProbR3SE,$ProbR3SG,$ProbR3SS);
	}
	
	echo "<br>";
	echo "Entropy of R3 AND CL is: " . $EntR3;
	echo "<br>";
	
	
	
	//R4
	
	$result = mySQL_Query("SELECT R4 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R4 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR4 = sizeof($R4);
	echo "<br>";
	print_r($R4);
	echo "<br>"; 
	echo "Total R4: " . $totalR4;
	
	
	
	//R4 Prob
	echo "<h2>R4 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R4E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4E = sizeof($R4E);
	echo "Total R4 Excellent: " . $totalR4E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R4EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4EE = sizeof($R4EE);
	$ProbR4EE = $totalR4EE/$totalR4E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R4EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4EG = sizeof($R4EG);
	$ProbR4EG = $totalR4EG/$totalR4E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R4ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4ES = sizeof($R4ES);
	$ProbR4ES = $totalR4ES/$totalR4E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R4G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4G = sizeof($R4G);
	echo "Total R4 Good: " . $totalR4G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R4GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4GE = sizeof($R4GE);
	$ProbR4GE = $totalR4GE/$totalR4G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R4GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4GG = sizeof($R4GG);
	$ProbR4GG = $totalR4GG/$totalR4G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R4GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4GS = sizeof($R4GS);
	$ProbR4GS = $totalR4GS/$totalR4G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R4S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4S = sizeof($R4S);
	echo "Total R4 Satisfactory: " . $totalR4S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R4SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4SE = sizeof($R4SE);
	$ProbR4SE = $totalR4SE/$totalR4S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R4SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4SG = sizeof($R4SG);
	$ProbR4SG = $totalR4SG/$totalR4S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R4 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R4SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R4SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR4SS = sizeof($R4SS);
	$ProbR4SS = $totalR4SS/$totalR4S;
	
	
	//Entropy of R4
	
	$ProbR4E= $totalR4E/$totalR4;
	$ProbR4G= $totalR4G/$totalR4;
	$ProbR4S= $totalR4S/$totalR4;
	
	
	if($ProbR4EE == 0 || $ProbR4EG == 0 || $ProbR4ES == 0)
	{
		$EntR4 = 0;
	}
	else
	{
		$EntR4= $ProbR4E * entropy($ProbR4EE,$ProbR4EG,$ProbR4ES) + $ProbR4G * entropy($ProbR4GE,$ProbR4GG,$ProbR4GS) + $ProbR4S * entropy($ProbR4SE,$ProbR4SG,$ProbR4SS);
	}
	
	echo "<br>";
	echo "Entropy of R4 AND CL is: " . $EntR4;
	echo "<br>";
	
	
	

	//R5
	
	$result = mySQL_Query("SELECT R5 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R5 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR5 = sizeof($R5);
	echo "<br>";
	print_r($R5);
	echo "<br>"; 
	echo "Total R5: " . $totalR5;
	
	
	
	//R5 Prob
	echo "<h2>R5 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R5E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5E = sizeof($R5E);
	echo "Total R5 Excellent: " . $totalR5E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R5EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5EE = sizeof($R5EE);
	$ProbR5EE = $totalR5EE/$totalR5E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R5EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5EG = sizeof($R5EG);
	$ProbR5EG = $totalR5EG/$totalR5E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R5ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5ES = sizeof($R5ES);
	$ProbR5ES = $totalR5ES/$totalR5E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R5G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5G = sizeof($R5G);
	echo "Total R5 Good: " . $totalR5G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R5GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5GE = sizeof($R5GE);
	$ProbR5GE = $totalR5GE/$totalR5G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R5GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5GG = sizeof($R5GG);
	$ProbR5GG = $totalR5GG/$totalR5G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R5GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5GS = sizeof($R5GS);
	$ProbR5GS = $totalR5GS/$totalR5G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R5S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5S = sizeof($R5S);
	echo "Total R5 Satisfactory: " . $totalR5S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R5SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5SE = sizeof($R5SE);
	$ProbR5SE = $totalR5SE/$totalR5S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R5SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5SG = sizeof($R5SG);
	$ProbR5SG = $totalR5SG/$totalR5S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R5 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R5SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R5SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR5SS = sizeof($R5SS);
	$ProbR5SS = $totalR5SS/$totalR5S;
	
	
	//Entropy of R5
	
	$ProbR5E= $totalR5E/$totalR5;
	$ProbR5G= $totalR5G/$totalR5;
	$ProbR5S= $totalR5S/$totalR5;
	
	
	if($ProbR5EE == 0 || $ProbR5EG == 0 || $ProbR5ES == 0)
	{
		$EntR5 = 0;
	}
	else
	{
		$EntR5= $ProbR5E * entropy($ProbR5EE,$ProbR5EG,$ProbR5ES) + $ProbR5G * entropy($ProbR5GE,$ProbR5GG,$ProbR5GS) + $ProbR5S * entropy($ProbR5SE,$ProbR5SG,$ProbR5SS);
	}
	
	echo "<br>";
	echo "Entropy of R5 AND CL is: " . $EntR5;
	echo "<br>";
	
	
	
	

	//R6
	
	$result = mySQL_Query("SELECT R6 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R6 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR6 = sizeof($R6);
	echo "<br>";
	print_r($R6);
	echo "<br>"; 
	echo "Total R6: " . $totalR6;
	
	
	
	//R6 Prob
	echo "<h2>R6 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R6E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6E = sizeof($R6E);
	echo "Total R6 Excellent: " . $totalR6E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R6EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6EE = sizeof($R6EE);
	$ProbR6EE = $totalR6EE/$totalR6E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R6EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6EG = sizeof($R6EG);
	$ProbR6EG = $totalR6EG/$totalR6E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R6ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6ES = sizeof($R6ES);
	$ProbR6ES = $totalR6ES/$totalR6E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R6G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6G = sizeof($R6G);
	echo "Total R6 Good: " . $totalR6G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R6GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6GE = sizeof($R6GE);
	$ProbR6GE = $totalR6GE/$totalR6G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R6GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6GG = sizeof($R6GG);
	$ProbR6GG = $totalR6GG/$totalR6G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R6GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6GS = sizeof($R6GS);
	$ProbR6GS = $totalR6GS/$totalR6G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R6S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6S = sizeof($R6S);
	echo "Total R6 Satisfactory: " . $totalR6S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R6SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6SE = sizeof($R6SE);
	$ProbR6SE = $totalR6SE/$totalR6S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R6SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6SG = sizeof($R6SG);
	$ProbR6SG = $totalR6SG/$totalR6S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R6 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R6SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R6SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR6SS = sizeof($R6SS);
	$ProbR6SS = $totalR6SS/$totalR6S;
	
	
	//Entropy of R6
	
	$ProbR6E= $totalR6E/$totalR6;
	$ProbR6G= $totalR6G/$totalR6;
	$ProbR6S= $totalR6S/$totalR6;
	
	
	if($ProbR6EE == 0 || $ProbR6EG == 0 || $ProbR6ES == 0)
	{
		$EntR6 = 0;
	}
	else
	{
		$EntR6= $ProbR6E * entropy($ProbR6EE,$ProbR6EG,$ProbR6ES) + $ProbR6G * entropy($ProbR6GE,$ProbR6GG,$ProbR6GS) + $ProbR6S * entropy($ProbR6SE,$ProbR6SG,$ProbR6SS);
	}
	
	echo "<br>";
	echo "Entropy of R6 AND CL is: " . $EntR6;
	echo "<br>";
	
	
	

	//R7
	
	$result = mySQL_Query("SELECT R7 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R7 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR7 = sizeof($R7);
	echo "<br>";
	print_r($R7);
	echo "<br>"; 
	echo "Total R7: " . $totalR7;
	
	
	
	//R7 Prob
	echo "<h2>R7 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R7E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7E = sizeof($R7E);
	echo "Total R7 Excellent: " . $totalR7E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R7EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7EE = sizeof($R7EE);
	$ProbR7EE = $totalR7EE/$totalR7E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R7EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7EG = sizeof($R7EG);
	$ProbR7EG = $totalR7EG/$totalR7E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R7ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7ES = sizeof($R7ES);
	$ProbR7ES = $totalR7ES/$totalR7E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R7G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7G = sizeof($R7G);
	echo "Total R7 Good: " . $totalR7G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R7GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7GE = sizeof($R7GE);
	$ProbR7GE = $totalR7GE/$totalR7G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R7GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7GG = sizeof($R7GG);
	$ProbR7GG = $totalR7GG/$totalR7G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R7GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7GS = sizeof($R7GS);
	$ProbR7GS = $totalR7GS/$totalR7G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R7S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7S = sizeof($R7S);
	echo "Total R7 Satisfactory: " . $totalR7S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R7SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7SE = sizeof($R7SE);
	$ProbR7SE = $totalR7SE/$totalR7S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R7SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7SG = sizeof($R7SG);
	$ProbR7SG = $totalR7SG/$totalR7S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R7 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R7SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R7SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR7SS = sizeof($R7SS);
	$ProbR7SS = $totalR7SS/$totalR7S;
	
	
	//Entropy of R7
	
	$ProbR7E= $totalR7E/$totalR7;
	$ProbR7G= $totalR7G/$totalR7;
	$ProbR7S= $totalR7S/$totalR7;
	
	
	if($ProbR7EE == 0 || $ProbR7EG == 0 || $ProbR7ES == 0)
	{
		$EntR7 = 0;
	}
	else
	{
		$EntR7= $ProbR7E * entropy($ProbR7EE,$ProbR7EG,$ProbR7ES) + $ProbR7G * entropy($ProbR7GE,$ProbR7GG,$ProbR7GS) + $ProbR7S * entropy($ProbR7SE,$ProbR7SG,$ProbR7SS);
	}
	
	echo "<br>";
	echo "Entropy of R7 AND CL is: " . $EntR7;
	echo "<br>";
	
	
	

	//R8
	
	$result = mySQL_Query("SELECT R8 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R8 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR8 = sizeof($R8);
	echo "<br>";
	print_r($R8);
	echo "<br>"; 
	echo "Total R8: " . $totalR8;
	
	
	
	//R8 Prob
	echo "<h2>R8 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R8E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8E = sizeof($R8E);
	echo "Total R8 Excellent: " . $totalR8E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R8EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8EE = sizeof($R8EE);
	$ProbR8EE = $totalR8EE/$totalR8E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R8EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8EG = sizeof($R8EG);
	$ProbR8EG = $totalR8EG/$totalR8E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R8ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8ES = sizeof($R8ES);
	$ProbR8ES = $totalR8ES/$totalR8E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R8G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8G = sizeof($R8G);
	echo "Total R8 Good: " . $totalR8G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R8GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8GE = sizeof($R8GE);
	$ProbR8GE = $totalR8GE/$totalR8G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R8GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8GG = sizeof($R8GG);
	$ProbR8GG = $totalR8GG/$totalR8G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R8GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8GS = sizeof($R8GS);
	$ProbR8GS = $totalR8GS/$totalR8G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R8S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8S = sizeof($R8S);
	echo "Total R8 Satisfactory: " . $totalR8S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R8SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8SE = sizeof($R8SE);
	$ProbR8SE = $totalR8SE/$totalR8S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R8SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8SG = sizeof($R8SG);
	$ProbR8SG = $totalR8SG/$totalR8S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R8 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R8SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R8SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR8SS = sizeof($R8SS);
	$ProbR8SS = $totalR8SS/$totalR8S;
	
	
	//Entropy of R8
	
	$ProbR8E= $totalR8E/$totalR8;
	$ProbR8G= $totalR8G/$totalR8;
	$ProbR8S= $totalR8S/$totalR8;
	
	
	if($ProbR8EE == 0 || $ProbR8EG == 0 || $ProbR8ES == 0)
	{
		$EntR8 = 0;
	}
	else
	{
		$EntR8= $ProbR8E * entropy($ProbR8EE,$ProbR8EG,$ProbR8ES) + $ProbR8G * entropy($ProbR8GE,$ProbR8GG,$ProbR8GS) + $ProbR8S * entropy($ProbR8SE,$ProbR8SG,$ProbR8SS);
	}
	
	echo "<br>";
	echo "Entropy of R8 AND CL is: " . $EntR8;
	echo "<br>";
	
	
	

	//R9
	
	$result = mySQL_Query("SELECT R9 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R9 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR9 = sizeof($R9);
	echo "<br>";
	print_r($R9);
	echo "<br>"; 
	echo "Total R9: " . $totalR9;
	
	
	
	//R9 Prob
	echo "<h2>R9 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R9E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9E = sizeof($R9E);
	echo "Total R9 Excellent: " . $totalR9E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R9EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9EE = sizeof($R9EE);
	$ProbR9EE = $totalR9EE/$totalR9E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R9EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9EG = sizeof($R9EG);
	$ProbR9EG = $totalR9EG/$totalR9E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R9ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9ES = sizeof($R9ES);
	$ProbR9ES = $totalR9ES/$totalR9E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R9G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9G = sizeof($R9G);
	echo "Total R9 Good: " . $totalR9G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R9GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9GE = sizeof($R9GE);
	$ProbR9GE = $totalR9GE/$totalR9G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R9GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9GG = sizeof($R9GG);
	$ProbR9GG = $totalR9GG/$totalR9G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R9GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9GS = sizeof($R9GS);
	$ProbR9GS = $totalR9GS/$totalR9G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R9S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9S = sizeof($R9S);
	echo "Total R9 Satisfactory: " . $totalR9S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R9SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9SE = sizeof($R9SE);
	$ProbR9SE = $totalR9SE/$totalR9S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R9SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9SG = sizeof($R9SG);
	$ProbR9SG = $totalR9SG/$totalR9S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R9 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R9SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R9SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR9SS = sizeof($R9SS);
	$ProbR9SS = $totalR9SS/$totalR9S;
	
	
	//Entropy of R9
	
	$ProbR9E= $totalR9E/$totalR9;
	$ProbR9G= $totalR9G/$totalR9;
	$ProbR9S= $totalR9S/$totalR9;
	
	
	if($ProbR9EE == 0 || $ProbR9EG == 0 || $ProbR9ES == 0)
	{
		$EntR9 = 0;
	}
	else
	{
		$EntR9= $ProbR9E * entropy($ProbR9EE,$ProbR9EG,$ProbR9ES) + $ProbR9G * entropy($ProbR9GE,$ProbR9GG,$ProbR9GS) + $ProbR9S * entropy($ProbR9SE,$ProbR9SG,$ProbR9SS);
	}
	
	echo "<br>";
	echo "Entropy of R9 AND CL is: " . $EntR9;
	echo "<br>";
	
	
	

	//R10
	
	$result = mySQL_Query("SELECT R10 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R10 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR10 = sizeof($R10);
	echo "<br>";
	print_r($R10);
	echo "<br>"; 
	echo "Total R10: " . $totalR10;
	
	
	
	//R10 Prob
	echo "<h2>R10 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R10E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10E = sizeof($R10E);
	echo "Total R10 Excellent: " . $totalR10E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R10EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10EE = sizeof($R10EE);
	$ProbR10EE = $totalR10EE/$totalR10E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R10EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10EG = sizeof($R10EG);
	$ProbR10EG = $totalR10EG/$totalR10E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R10ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10ES = sizeof($R10ES);
	$ProbR10ES = $totalR10ES/$totalR10E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R10G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10G = sizeof($R10G);
	echo "Total R10 Good: " . $totalR10G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R10GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10GE = sizeof($R10GE);
	$ProbR10GE = $totalR10GE/$totalR10G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R10GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10GG = sizeof($R10GG);
	$ProbR10GG = $totalR10GG/$totalR10G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R10GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10GS = sizeof($R10GS);
	$ProbR10GS = $totalR10GS/$totalR10G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R10S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10S = sizeof($R10S);
	echo "Total R10 Satisfactory: " . $totalR10S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R10SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10SE = sizeof($R10SE);
	$ProbR10SE = $totalR10SE/$totalR10S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R10SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10SG = sizeof($R10SG);
	$ProbR10SG = $totalR10SG/$totalR10S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R10 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R10SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R10SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR10SS = sizeof($R10SS);
	$ProbR10SS = $totalR10SS/$totalR10S;
	
	
	//Entropy of R10
	
	$ProbR10E= $totalR10E/$totalR10;
	$ProbR10G= $totalR10G/$totalR10;
	$ProbR10S= $totalR10S/$totalR10;
	
	
	if($ProbR10EE == 0 || $ProbR10EG == 0 || $ProbR10ES == 0)
	{
		$EntR10 = 0;
	}
	else
	{
		$EntR10= $ProbR10E * entropy($ProbR10EE,$ProbR10EG,$ProbR10ES) + $ProbR10G * entropy($ProbR10GE,$ProbR10GG,$ProbR10GS) + $ProbR10S * entropy($ProbR10SE,$ProbR10SG,$ProbR10SS);
	}
	
	echo "<br>";
	echo "Entropy of R10 AND CL is: " . $EntR10;
	echo "<br>";
	
	
	

	//R11
	
	$result = mySQL_Query("SELECT R11 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R11 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR11 = sizeof($R11);
	echo "<br>";
	print_r($R11);
	echo "<br>"; 
	echo "Total R11: " . $totalR11;
	
	
	
	//R11 Prob
	echo "<h2>R11 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R11E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11E = sizeof($R11E);
	echo "Total R11 Excellent: " . $totalR11E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R11EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11EE = sizeof($R11EE);
	$ProbR11EE = $totalR11EE/$totalR11E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R11EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11EG = sizeof($R11EG);
	$ProbR11EG = $totalR11EG/$totalR11E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R11ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11ES = sizeof($R11ES);
	$ProbR11ES = $totalR11ES/$totalR11E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R11G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11G = sizeof($R11G);
	echo "Total R11 Good: " . $totalR11G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R11GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11GE = sizeof($R11GE);
	$ProbR11GE = $totalR11GE/$totalR11G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R11GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11GG = sizeof($R11GG);
	$ProbR11GG = $totalR11GG/$totalR11G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R11GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11GS = sizeof($R11GS);
	$ProbR11GS = $totalR11GS/$totalR11G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R11S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11S = sizeof($R11S);
	echo "Total R11 Satisfactory: " . $totalR11S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R11SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11SE = sizeof($R11SE);
	$ProbR11SE = $totalR11SE/$totalR11S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R11SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11SG = sizeof($R11SG);
	$ProbR11SG = $totalR11SG/$totalR11S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R11 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R11SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R11SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR11SS = sizeof($R11SS);
	$ProbR11SS = $totalR11SS/$totalR11S;
	
	
	//Entropy of R11
	
	$ProbR11E= $totalR11E/$totalR11;
	$ProbR11G= $totalR11G/$totalR11;
	$ProbR11S= $totalR11S/$totalR11;
	
	
	if($ProbR11EE == 0 || $ProbR11EG == 0 || $ProbR11ES == 0)
	{
		$EntR11 = 0;
	}
	else
	{
		$EntR11= $ProbR11E * entropy($ProbR11EE,$ProbR11EG,$ProbR11ES) + $ProbR11G * entropy($ProbR11GE,$ProbR11GG,$ProbR11GS) + $ProbR11S * entropy($ProbR11SE,$ProbR11SG,$ProbR11SS);
	}
	
	echo "<br>";
	echo "Entropy of R11 AND CL is: " . $EntR11;
	echo "<br>";
	
	
	

	//R12
	
	$result = mySQL_Query("SELECT R12 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R12 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR12 = sizeof($R12);
	echo "<br>";
	print_r($R12);
	echo "<br>"; 
	echo "Total R12: " . $totalR12;
	
	
	
	//R12 Prob
	echo "<h2>R12 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R12E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12E = sizeof($R12E);
	echo "Total R12 Excellent: " . $totalR12E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R12EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12EE = sizeof($R12EE);
	$ProbR12EE = $totalR12EE/$totalR12E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R12EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12EG = sizeof($R12EG);
	$ProbR12EG = $totalR12EG/$totalR12E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R12ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12ES = sizeof($R12ES);
	$ProbR12ES = $totalR12ES/$totalR12E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R12G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12G = sizeof($R12G);
	echo "Total R12 Good: " . $totalR12G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R12GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12GE = sizeof($R12GE);
	$ProbR12GE = $totalR12GE/$totalR12G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R12GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12GG = sizeof($R12GG);
	$ProbR12GG = $totalR12GG/$totalR12G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R12GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12GS = sizeof($R12GS);
	$ProbR12GS = $totalR12GS/$totalR12G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R12S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12S = sizeof($R12S);
	echo "Total R12 Satisfactory: " . $totalR12S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R12SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12SE = sizeof($R12SE);
	$ProbR12SE = $totalR12SE/$totalR12S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R12SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12SG = sizeof($R12SG);
	$ProbR12SG = $totalR12SG/$totalR12S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R12 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R12SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R12SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR12SS = sizeof($R12SS);
	$ProbR12SS = $totalR12SS/$totalR12S;
	
	
	//Entropy of R12
	
	$ProbR12E= $totalR12E/$totalR12;
	$ProbR12G= $totalR12G/$totalR12;
	$ProbR12S= $totalR12S/$totalR12;
	
	
	if($ProbR12EE == 0 || $ProbR12EG == 0 || $ProbR12ES == 0)
	{
		$EntR12 = 0;
	}
	else
	{
		$EntR12= $ProbR12E * entropy($ProbR12EE,$ProbR12EG,$ProbR12ES) + $ProbR12G * entropy($ProbR12GE,$ProbR12GG,$ProbR12GS) + $ProbR12S * entropy($ProbR12SE,$ProbR12SG,$ProbR12SS);
	}
	
	echo "<br>";
	echo "Entropy of R12 AND CL is: " . $EntR12;
	echo "<br>";
	
	
	

	//R13
	
	$result = mySQL_Query("SELECT R13 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R13 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR13 = sizeof($R13);
	echo "<br>";
	print_r($R13);
	echo "<br>"; 
	echo "Total R13: " . $totalR13;
	
	
	
	//R13 Prob
	echo "<h2>R13 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R13E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13E = sizeof($R13E);
	echo "Total R13 Excellent: " . $totalR13E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R13EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13EE = sizeof($R13EE);
	$ProbR13EE = $totalR13EE/$totalR13E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R13EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13EG = sizeof($R13EG);
	$ProbR13EG = $totalR13EG/$totalR13E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R13ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13ES = sizeof($R13ES);
	$ProbR13ES = $totalR13ES/$totalR13E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R13G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13G = sizeof($R13G);
	echo "Total R13 Good: " . $totalR13G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R13GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13GE = sizeof($R13GE);
	$ProbR13GE = $totalR13GE/$totalR13G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R13GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13GG = sizeof($R13GG);
	$ProbR13GG = $totalR13GG/$totalR13G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R13GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13GS = sizeof($R13GS);
	$ProbR13GS = $totalR13GS/$totalR13G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R13S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13S = sizeof($R13S);
	echo "Total R13 Satisfactory: " . $totalR13S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R13SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13SE = sizeof($R13SE);
	$ProbR13SE = $totalR13SE/$totalR13S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	
	$R13SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13SG = sizeof($R13SG);
	$ProbR13SG = $totalR13SG/$totalR13S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R13 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R13SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R13SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR13SS = sizeof($R13SS);
	$ProbR13SS = $totalR13SS/$totalR13S;
	
	
	//Entropy of R13
	
	$ProbR13E= $totalR13E/$totalR13;
	$ProbR13G= $totalR13G/$totalR13;
	$ProbR13S= $totalR13S/$totalR13;
	
	
	if($ProbR13EE == 0 || $ProbR13EG == 0 || $ProbR13ES == 0)
	{
		$EntR13 = 0;
	}
	else
	{
		$EntR13= $ProbR13E * entropy($ProbR13EE,$ProbR13EG,$ProbR13ES) + $ProbR13G * entropy($ProbR13GE,$ProbR13GG,$ProbR13GS) + $ProbR13S * entropy($ProbR13SE,$ProbR13SG,$ProbR13SS);
	}
	
	echo "<br>";
	echo "Entropy of R13 AND CL is: " . $EntR13;
	echo "<br>";
	
	
	

	//R14
	
	$result = mySQL_Query("SELECT R14 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$R14 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalR14 = sizeof($R14);
	echo "<br>";
	print_r($R14);
	echo "<br>"; 
	echo "Total R14: " . $totalR14;
	
	
	
	//R14 Prob
	echo "<h2>R14 Prob!!!</h2> <br>";
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R14E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR14E = sizeof($R14E);
	echo "Total R14 Excellent: " . $totalR14E . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R14EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR14EE = sizeof($R14EE);
	$ProbR14EE = $totalR14EE/$totalR14E;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R14EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR14EG = sizeof($R14EG);
	$ProbR14EG = $totalR14EG/$totalR14E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R14ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR14ES = sizeof($R14ES);
	$ProbR14ES = $totalR14ES/$totalR14E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R14G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR14G = sizeof($R14G);
	echo "Total R14 Good: " . $totalR14G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$R14GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR14GE = sizeof($R14GE);
	$ProbR14GE = $totalR14GE/$totalR14G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$R14GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR14GG = sizeof($R14GG);
	$ProbR14GG = $totalR14GG/$totalR14G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R14GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR14GS = sizeof($R14GS);
	$ProbR14GS = $totalR14GS/$totalR14G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$R14S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalR14S = sizeof($R14S);
	echo "Total R14 Satisfactory: " . $totalR14S;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	$R14SE = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14SE[$i] = $Drow[0];	
		$i++;
	}
	echo "<br>";
	$totalR14SE = sizeof($R14SE);
	$ProbR14SE = $totalR14SE/$totalR14S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Satisfactory' AND CL ='Good'") or die(mySQL_error());
	$Drow = array();
	$R14SG = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14SG[$i] = $Drow[0];
		$i++;
	}
	echo "<br>";
	$totalR14SG = sizeof($R14SG);
	$ProbR14SG = $totalR14SG/$totalR14S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE R14 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	$R14SS = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$R14SS[$i] = $Drow[0];	
		$i++;
	}
	echo "<br>";
	$totalR14SS = sizeof($R14SS);
	$ProbR14SS = $totalR14SS/$totalR14S;
	
	//Entropy of R14
	$ProbR14E= $totalR14E/$totalR14;
	$ProbR14G= $totalR14G/$totalR14;
	$ProbR14S= $totalR14S/$totalR14;
	
	if($ProbR14EE == 0 || $ProbR14EG == 0 || $ProbR14ES == 0)
	{
		$EntR14 = 0;
	}
	else
	{
		$EntR14= $ProbR14E * entropy($ProbR14EE,$ProbR14EG,$ProbR14ES) + $ProbR14G * entropy($ProbR14GE,$ProbR14GG,$ProbR14GS) + $ProbR14S * entropy($ProbR14SE,$ProbR14SG,$ProbR14SS);
	}
	echo "<br>";
	echo "Entropy of R14 AND CL is: " . $EntR14;
	echo "<br>";
	
	
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!        Internationalization       !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
	
	
	$result = mySQL_Query("SELECT I1 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$I1 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalI1 = sizeof($I1);
	echo "<br>";
	print_r($I1);
	echo "<br>"; 
	echo "Total I1: " . $totalI1;
	
	echo "<br>";
	echo "<h2>I1 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I1E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1E = sizeof($I1E);
	echo "Total I1 Excellent: " . $totalI1E . "<br>";
	$ProbI1E = $totalI1E/$totalI1;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I1EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1EE = sizeof($I1EE);
	$ProbI1EE = $totalI1EE/$totalI1E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I1EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1EG = sizeof($I1EG);
	$ProbI1EG = $totalI1EG/$totalI1E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I1ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1ES = sizeof($I1ES);
	$ProbI1ES = $totalI1ES/$totalI1E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I1G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1G = sizeof($I1G);
	echo "Total I1 Good: " . $totalI1G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I1GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1GE = sizeof($I1GE);
	$ProbI1GE = $totalI1GE/$totalI1G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I1GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1GG = sizeof($I1GG);
	$ProbI1GG = $totalI1GG/$totalI1G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I1GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1GS = sizeof($I1GS);
	$ProbI1GS = $totalI1GS/$totalI1G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I1S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1S = sizeof($I1S);
	echo "Total I1 Satisfactory: " . $totalI1S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I1SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1SE = sizeof($I1SE);
	$ProbI1SE = $totalI1SE/$totalI1S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I1SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1SG = sizeof($I1SG);
	$ProbI1SG = $totalI1SG/$totalI1S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I1 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I1SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I1SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI1SS = sizeof($I1SS);
	$ProbI1SS = $totalI1SS/$totalI1S;
	
	
	
	//Entropy of I1
	$ProbI1E= $totalI1E/$totalI1;
	$ProbI1G= $totalI1G/$totalI1;
	$ProbI1S= $totalI1S/$totalI1;
	
	
	if($ProbI1EE == 0 || $ProbI1EG == 0 || $ProbI1ES == 0)
	{
		$EntI1 = 0;
	}
	else
	{
		$EntI1= $ProbI1E * entropy($ProbI1EE,$ProbI1EG,$ProbI1ES) + $ProbI1G * entropy($ProbI1GE,$ProbI1GG,$ProbI1GS) + $ProbI1S * entropy($ProbI1SE,$ProbI1SG,$ProbI1SS);
	}
	
	echo "<br>";
	echo "Entropy of I1 AND CL is: " . $EntI1;
	echo "<br>";
	
	
	
	
	$result = mySQL_Query("SELECT I2 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$I2 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalI2 = sizeof($I2);
	echo "<br>";
	print_r($I2);
	echo "<br>"; 
	echo "Total I2: " . $totalI2;
	
	echo "<br>";
	echo "<h2>I2 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I2E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2E = sizeof($I2E);
	echo "Total I2 Excellent: " . $totalI2E . "<br>";
	$ProbI2E = $totalI2E/$totalI2;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I2EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2EE = sizeof($I2EE);
	$ProbI2EE = $totalI2EE/$totalI2E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I2EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2EG = sizeof($I2EG);
	$ProbI2EG = $totalI2EG/$totalI2E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I2ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2ES = sizeof($I2ES);
	$ProbI2ES = $totalI2ES/$totalI2E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I2G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2G = sizeof($I2G);
	echo "Total I2 Good: " . $totalI2G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I2GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2GE = sizeof($I2GE);
	$ProbI2GE = $totalI2GE/$totalI2G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I2GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2GG = sizeof($I2GG);
	$ProbI2GG = $totalI2GG/$totalI2G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I2GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2GS = sizeof($I2GS);
	$ProbI2GS = $totalI2GS/$totalI2G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I2S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2S = sizeof($I2S);
	echo "Total I2 Satisfactory: " . $totalI2S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I2SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2SE = sizeof($I2SE);
	$ProbI2SE = $totalI2SE/$totalI2S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I2SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2SG = sizeof($I2SG);
	$ProbI2SG = $totalI2SG/$totalI2S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I2 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I2SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I2SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI2SS = sizeof($I2SS);
	$ProbI2SS = $totalI2SS/$totalI2S;
	
	
	
	//Entropy of I2
	$ProbI2E= $totalI2E/$totalI2;
	$ProbI2G= $totalI2G/$totalI2;
	$ProbI2S= $totalI2S/$totalI2;
	
	
	if($ProbI2EE == 0 || $ProbI2EG == 0 || $ProbI2ES == 0)
	{
		$EntI2 = 0;
	}
	else
	{
		$EntI2= $ProbI2E * entropy($ProbI2EE,$ProbI2EG,$ProbI2ES) + $ProbI2G * entropy($ProbI2GE,$ProbI2GG,$ProbI2GS) + $ProbI2S * entropy($ProbI2SE,$ProbI2SG,$ProbI2SS);
	}
	
	echo "<br>";
	echo "Entropy of I2 AND CL is: " . $EntI2;
	echo "<br>";
	
	
	
	
	$result = mySQL_Query("SELECT I3 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$I3 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalI3 = sizeof($I3);
	echo "<br>";
	print_r($I3);
	echo "<br>"; 
	echo "Total I3: " . $totalI3;
	
	echo "<br>";
	echo "<h2>I3 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I3E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3E = sizeof($I3E);
	echo "Total I3 Excellent: " . $totalI3E . "<br>";
	$ProbI3E = $totalI3E/$totalI3;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I3EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3EE = sizeof($I3EE);
	$ProbI3EE = $totalI3EE/$totalI3E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I3EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3EG = sizeof($I3EG);
	$ProbI3EG = $totalI3EG/$totalI3E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I3ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3ES = sizeof($I3ES);
	$ProbI3ES = $totalI3ES/$totalI3E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I3G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3G = sizeof($I3G);
	echo "Total I3 Good: " . $totalI3G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I3GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3GE = sizeof($I3GE);
	$ProbI3GE = $totalI3GE/$totalI3G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I3GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3GG = sizeof($I3GG);
	$ProbI3GG = $totalI3GG/$totalI3G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I3GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3GS = sizeof($I3GS);
	$ProbI3GS = $totalI3GS/$totalI3G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I3S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3S = sizeof($I3S);
	echo "Total I3 Satisfactory: " . $totalI3S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I3SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3SE = sizeof($I3SE);
	$ProbI3SE = $totalI3SE/$totalI3S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I3SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3SG = sizeof($I3SG);
	$ProbI3SG = $totalI3SG/$totalI3S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I3 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I3SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I3SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI3SS = sizeof($I3SS);
	$ProbI3SS = $totalI3SS/$totalI3S;
	
	
	
	//Entropy of I3
	$ProbI3E= $totalI3E/$totalI3;
	$ProbI3G= $totalI3G/$totalI3;
	$ProbI3S= $totalI3S/$totalI3;
	
	
	if($ProbI3EE == 0 || $ProbI3EG == 0 || $ProbI3ES == 0)
	{
		$EntI3 = 0;
	}
	else
	{
		$EntI3= $ProbI3E * entropy($ProbI3EE,$ProbI3EG,$ProbI3ES) + $ProbI3G * entropy($ProbI3GE,$ProbI3GG,$ProbI3GS) + $ProbI3S * entropy($ProbI3SE,$ProbI3SG,$ProbI3SS);
	}
	
	echo "<br>";
	echo "Entropy of I3 AND CL is: " . $EntI3;
	echo "<br>";
	
	
	
	$result = mySQL_Query("SELECT I4 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$I4 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalI4 = sizeof($I4);
	echo "<br>";
	print_r($I4);
	echo "<br>"; 
	echo "Total I4: " . $totalI4;
	
	echo "<br>";
	echo "<h2>I4 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I4E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4E = sizeof($I4E);
	echo "Total I4 Excellent: " . $totalI4E . "<br>";
	$ProbI4E = $totalI4E/$totalI4;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I4EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4EE = sizeof($I4EE);
	$ProbI4EE = $totalI4EE/$totalI4E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I4EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4EG = sizeof($I4EG);
	$ProbI4EG = $totalI4EG/$totalI4E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I4ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4ES = sizeof($I4ES);
	$ProbI4ES = $totalI4ES/$totalI4E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I4G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4G = sizeof($I4G);
	echo "Total I4 Good: " . $totalI4G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I4GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4GE = sizeof($I4GE);
	$ProbI4GE = $totalI4GE/$totalI4G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I4GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4GG = sizeof($I4GG);
	$ProbI4GG = $totalI4GG/$totalI4G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I4GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4GS = sizeof($I4GS);
	$ProbI4GS = $totalI4GS/$totalI4G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I4S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4S = sizeof($I4S);
	echo "Total I4 Satisfactory: " . $totalI4S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I4SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4SE = sizeof($I4SE);
	$ProbI4SE = $totalI4SE/$totalI4S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I4SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4SG = sizeof($I4SG);
	$ProbI4SG = $totalI4SG/$totalI4S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I4 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I4SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I4SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI4SS = sizeof($I4SS);
	$ProbI4SS = $totalI4SS/$totalI4S;
	
	
	
	//Entropy of I4
	$ProbI4E= $totalI4E/$totalI4;
	$ProbI4G= $totalI4G/$totalI4;
	$ProbI4S= $totalI4S/$totalI4;
	
	
	if($ProbI4EE == 0 || $ProbI4EG == 0 || $ProbI4ES == 0)
	{
		$EntI4 = 0;
	}
	else
	{
		$EntI4= $ProbI4E * entropy($ProbI4EE,$ProbI4EG,$ProbI4ES) + $ProbI4G * entropy($ProbI4GE,$ProbI4GG,$ProbI4GS) + $ProbI4S * entropy($ProbI4SE,$ProbI4SG,$ProbI4SS);
	}
	
	echo "<br>";
	echo "Entropy of I4 AND CL is: " . $EntI4;
	echo "<br>";
	
	
	
	$result = mySQL_Query("SELECT I5 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$I5 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalI5 = sizeof($I5);
	echo "<br>";
	print_r($I5);
	echo "<br>"; 
	echo "Total I5: " . $totalI5;
	
	echo "<br>";
	echo "<h2>I5 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I5E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5E = sizeof($I5E);
	echo "Total I5 Excellent: " . $totalI5E . "<br>";
	$ProbI5E = $totalI5E/$totalI5;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I5EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5EE = sizeof($I5EE);
	$ProbI5EE = $totalI5EE/$totalI5E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I5EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5EG = sizeof($I5EG);
	$ProbI5EG = $totalI5EG/$totalI5E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I5ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5ES = sizeof($I5ES);
	$ProbI5ES = $totalI5ES/$totalI5E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I5G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5G = sizeof($I5G);
	echo "Total I5 Good: " . $totalI5G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I5GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5GE = sizeof($I5GE);
	$ProbI5GE = $totalI5GE/$totalI5G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I5GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5GG = sizeof($I5GG);
	$ProbI5GG = $totalI5GG/$totalI5G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I5GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5GS = sizeof($I5GS);
	$ProbI5GS = $totalI5GS/$totalI5G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I5S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5S = sizeof($I5S);
	echo "Total I5 Satisfactory: " . $totalI5S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$I5SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5SE = sizeof($I5SE);
	$ProbI5SE = $totalI5SE/$totalI5S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$I5SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5SG = sizeof($I5SG);
	$ProbI5SG = $totalI5SG/$totalI5S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE I5 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$I5SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$I5SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalI5SS = sizeof($I5SS);
	$ProbI5SS = $totalI5SS/$totalI5S;
	
	
	
	//Entropy of I5
	$ProbI5E= $totalI5E/$totalI5;
	$ProbI5G= $totalI5G/$totalI5;
	$ProbI5S= $totalI5S/$totalI5;
	
	
	if($ProbI5EE == 0 || $ProbI5EG == 0 || $ProbI5ES == 0)
	{
		$EntI5 = 0;
	}
	else
	{
		$EntI5= $ProbI5E * entropy($ProbI5EE,$ProbI5EG,$ProbI5ES) + $ProbI5G * entropy($ProbI5GE,$ProbI5GG,$ProbI5GS) + $ProbI5S * entropy($ProbI5SE,$ProbI5SG,$ProbI5SS);
	}
	
	echo "<br>";
	echo "Entropy of I5 AND CL is: " . $EntI5;
	echo "<br>";
	
	
	
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!        Teaching Quality       !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
	
	
	$result = mySQL_Query("SELECT T1 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$T1 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalT1 = sizeof($T1);
	echo "<br>";
	print_r($T1);
	echo "<br>"; 
	echo "Total T1: " . $totalT1;
	
	echo "<br>";
	echo "<h2>T1 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T1E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1E = sizeof($T1E);
	echo "Total T1 Excellent: " . $totalT1E . "<br>";
	$ProbT1E = $totalT1E/$totalT1;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T1EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1EE = sizeof($T1EE);
	$ProbT1EE = $totalT1EE/$totalT1E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T1EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1EG = sizeof($T1EG);
	$ProbT1EG = $totalT1EG/$totalT1E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T1ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1ES = sizeof($T1ES);
	$ProbT1ES = $totalT1ES/$totalT1E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T1G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1G = sizeof($T1G);
	echo "Total T1 Good: " . $totalT1G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T1GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1GE = sizeof($T1GE);
	$ProbT1GE = $totalT1GE/$totalT1G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T1GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1GG = sizeof($T1GG);
	$ProbT1GG = $totalT1GG/$totalT1G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T1GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1GS = sizeof($T1GS);
	$ProbT1GS = $totalT1GS/$totalT1G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T1S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1S = sizeof($T1S);
	echo "Total T1 Satisfactory: " . $totalT1S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T1SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1SE = sizeof($T1SE);
	$ProbT1SE = $totalT1SE/$totalT1S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T1SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1SG = sizeof($T1SG);
	$ProbT1SG = $totalT1SG/$totalT1S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T1 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T1SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T1SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT1SS = sizeof($T1SS);
	$ProbT1SS = $totalT1SS/$totalT1S;
	
	
	
	//Entropy of T1
	$ProbT1E= $totalT1E/$totalT1;
	$ProbT1G= $totalT1G/$totalT1;
	$ProbT1S= $totalT1S/$totalT1;
	
	
	if($ProbT1EE == 0 || $ProbT1EG == 0 || $ProbT1ES == 0)
	{
		$EntT1 = 0;
	}
	else
	{
		$EntT1= $ProbT1E * entropy($ProbT1EE,$ProbT1EG,$ProbT1ES) + $ProbT1G * entropy($ProbT1GE,$ProbT1GG,$ProbT1GS) + $ProbT1S * entropy($ProbT1SE,$ProbT1SG,$ProbT1SS);
	}
	
	echo "<br>";
	echo "Entropy of T1 AND CL is: " . $EntT1;
	echo "<br>";
	
	
	
	
	$result = mySQL_Query("SELECT T2 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$T2 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalT2 = sizeof($T2);
	echo "<br>";
	print_r($T2);
	echo "<br>"; 
	echo "Total T2: " . $totalT2;
	
	echo "<br>";
	echo "<h2>T2 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T2E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2E = sizeof($T2E);
	echo "Total T2 Excellent: " . $totalT2E . "<br>";
	$ProbT2E = $totalT2E/$totalT2;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T2EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2EE = sizeof($T2EE);
	$ProbT2EE = $totalT2EE/$totalT2E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T2EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2EG = sizeof($T2EG);
	$ProbT2EG = $totalT2EG/$totalT2E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T2ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2ES = sizeof($T2ES);
	$ProbT2ES = $totalT2ES/$totalT2E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T2G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2G = sizeof($T2G);
	echo "Total T2 Good: " . $totalT2G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T2GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2GE = sizeof($T2GE);
	$ProbT2GE = $totalT2GE/$totalT2G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T2GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2GG = sizeof($T2GG);
	$ProbT2GG = $totalT2GG/$totalT2G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T2GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2GS[$i] = $Drow[0];
		
		$i++;

	}
	echo "<br>";
	$totalT2GS = sizeof($T2GS);
	$ProbT2GS = $totalT2GS/$totalT2G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T2S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2S = sizeof($T2S);
	echo "Total T2 Satisfactory: " . $totalT2S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T2SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2SE = sizeof($T2SE);
	$ProbT2SE = $totalT2SE/$totalT2S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T2SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2SG = sizeof($T2SG);
	$ProbT2SG = $totalT2SG/$totalT2S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T2 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T2SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T2SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT2SS = sizeof($T2SS);
	$ProbT2SS = $totalT2SS/$totalT2S;
	
	
	
	//Entropy of T2
	$ProbT2E= $totalT2E/$totalT2;
	$ProbT2G= $totalT2G/$totalT2;
	$ProbT2S= $totalT2S/$totalT2;
	
	
	if($ProbT2EE == 0 || $ProbT2EG == 0 || $ProbT2ES == 0)
	{
		$EntT2 = 0;
	}
	else
	{
		$EntT2= $ProbT2E * entropy($ProbT2EE,$ProbT2EG,$ProbT2ES) + $ProbT2G * entropy($ProbT2GE,$ProbT2GG,$ProbT2GS) + $ProbT2S * entropy($ProbT2SE,$ProbT2SG,$ProbT2SS);
	}
	
	echo "<br>";
	echo "Entropy of T2 AND CL is: " . $EntT2;
	echo "<br>";
	
	
	
	
	$result = mySQL_Query("SELECT T3 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$T3 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalT3 = sizeof($T3);
	echo "<br>";
	print_r($T3);
	echo "<br>"; 
	echo "Total T3: " . $totalT3;
	
	echo "<br>";
	echo "<h2>T3 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T3E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3E = sizeof($T3E);
	echo "Total T3 Excellent: " . $totalT3E . "<br>";
	$ProbT3E = $totalT3E/$totalT3;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T3EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3EE = sizeof($T3EE);
	$ProbT3EE = $totalT3EE/$totalT3E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T3EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3EG = sizeof($T3EG);
	$ProbT3EG = $totalT3EG/$totalT3E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T3ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3ES = sizeof($T3ES);
	$ProbT3ES = $totalT3ES/$totalT3E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T3G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3G = sizeof($T3G);
	echo "Total T3 Good: " . $totalT3G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T3GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3GE = sizeof($T3GE);
	$ProbT3GE = $totalT3GE/$totalT3G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T3GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3GG = sizeof($T3GG);
	$ProbT3GG = $totalT3GG/$totalT3G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T3GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3GS = sizeof($T3GS);
	$ProbT3GS = $totalT3GS/$totalT3G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T3S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3S = sizeof($T3S);
	echo "Total T3 Satisfactory: " . $totalT3S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T3SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3SE = sizeof($T3SE);
	$ProbT3SE = $totalT3SE/$totalT3S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T3SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3SG = sizeof($T3SG);
	$ProbT3SG = $totalT3SG/$totalT3S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T3 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T3SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T3SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT3SS = sizeof($T3SS);
	$ProbT3SS = $totalT3SS/$totalT3S;
	
	
	
	//Entropy of T3
	$ProbT3E= $totalT3E/$totalT3;
	$ProbT3G= $totalT3G/$totalT3;
	$ProbT3S= $totalT3S/$totalT3;
	
	
	if($ProbT3EE == 0 || $ProbT3EG == 0 || $ProbT3ES == 0)
	{
		$EntT3 = 0;
	}
	else
	{
		$EntT3= $ProbT3E * entropy($ProbT3EE,$ProbT3EG,$ProbT3ES) + $ProbT3G * entropy($ProbT3GE,$ProbT3GG,$ProbT3GS) + $ProbT3S * entropy($ProbT3SE,$ProbT3SG,$ProbT3SS);
	}
	
	echo "<br>";
	echo "Entropy of T3 AND CL is: " . $EntT3;
	echo "<br>";
	
	
	
	$result = mySQL_Query("SELECT T4 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$T4 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalT4 = sizeof($T4);
	echo "<br>";
	print_r($T4);
	echo "<br>"; 
	echo "Total T4: " . $totalT4;
	
	echo "<br>";
	echo "<h2>T4 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T4E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4E = sizeof($T4E);
	echo "Total T4 Excellent: " . $totalT4E . "<br>";
	$ProbT4E = $totalT4E/$totalT4;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T4EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4EE = sizeof($T4EE);
	$ProbT4EE = $totalT4EE/$totalT4E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T4EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4EG = sizeof($T4EG);
	$ProbT4EG = $totalT4EG/$totalT4E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T4ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4ES = sizeof($T4ES);
	$ProbT4ES = $totalT4ES/$totalT4E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T4G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4G = sizeof($T4G);
	echo "Total T4 Good: " . $totalT4G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T4GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4GE = sizeof($T4GE);
	$ProbT4GE = $totalT4GE/$totalT4G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T4GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4GG = sizeof($T4GG);
	$ProbT4GG = $totalT4GG/$totalT4G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T4GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4GS = sizeof($T4GS);
	$ProbT4GS = $totalT4GS/$totalT4G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T4S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4S = sizeof($T4S);
	echo "Total T4 Satisfactory: " . $totalT4S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T4SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4SE = sizeof($T4SE);
	$ProbT4SE = $totalT4SE/$totalT4S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T4SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4SG = sizeof($T4SG);
	$ProbT4SG = $totalT4SG/$totalT4S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T4 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T4SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T4SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT4SS = sizeof($T4SS);
	$ProbT4SS = $totalT4SS/$totalT4S;
	
	
	
	//Entropy of T4
	$ProbT4E= $totalT4E/$totalT4;
	$ProbT4G= $totalT4G/$totalT4;
	$ProbT4S= $totalT4S/$totalT4;
	
	
	if($ProbT4EE == 0 || $ProbT4EG == 0 || $ProbT4ES == 0)
	{
		$EntT4 = 0;
	}
	else
	{
		$EntT4= $ProbT4E * entropy($ProbT4EE,$ProbT4EG,$ProbT4ES) + $ProbT4G * entropy($ProbT4GE,$ProbT4GG,$ProbT4GS) + $ProbT4S * entropy($ProbT4SE,$ProbT4SG,$ProbT4SS);
	}
	
	echo "<br>";
	echo "Entropy of T4 AND CL is: " . $EntT4;
	echo "<br>";
	
	
	
	$result = mySQL_Query("SELECT T5 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$T5 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalT5 = sizeof($T5);
	echo "<br>";
	print_r($T5);
	echo "<br>"; 
	echo "Total T5: " . $totalT5;
	
	echo "<br>";
	echo "<h2>T5 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T5E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5E = sizeof($T5E);
	echo "Total T5 Excellent: " . $totalT5E . "<br>";
	$ProbT5E = $totalT5E/$totalT5;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T5EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5EE = sizeof($T5EE);
	$ProbT5EE = $totalT5EE/$totalT5E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T5EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5EG = sizeof($T5EG);
	$ProbT5EG = $totalT5EG/$totalT5E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T5ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5ES = sizeof($T5ES);
	$ProbT5ES = $totalT5ES/$totalT5E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T5G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5G = sizeof($T5G);
	echo "Total T5 Good: " . $totalT5G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T5GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5GE = sizeof($T5GE);
	$ProbT5GE = $totalT5GE/$totalT5G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T5GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5GG = sizeof($T5GG);
	$ProbT5GG = $totalT5GG/$totalT5G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T5GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5GS = sizeof($T5GS);
	$ProbT5GS = $totalT5GS/$totalT5G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T5S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5S = sizeof($T5S);
	echo "Total T5 Satisfactory: " . $totalT5S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$T5SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5SE = sizeof($T5SE);
	$ProbT5SE = $totalT5SE/$totalT5S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$T5SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5SG = sizeof($T5SG);
	$ProbT5SG = $totalT5SG/$totalT5S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE T5 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$T5SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$T5SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalT5SS = sizeof($T5SS);
	$ProbT5SS = $totalT5SS/$totalT5S;
	
	
	
	//Entropy of T5
	$ProbT5E= $totalT5E/$totalT5;
	$ProbT5G= $totalT5G/$totalT5;
	$ProbT5S= $totalT5S/$totalT5;
	
	
	if($ProbT5EE == 0 || $ProbT5EG == 0 || $ProbT5ES == 0)
	{
		$EntT5 = 0;
	}
	else
	{
		$EntT5= $ProbT5E * entropy($ProbT5EE,$ProbT5EG,$ProbT5ES) + $ProbT5G * entropy($ProbT5GE,$ProbT5GG,$ProbT5GS) + $ProbT5S * entropy($ProbT5SE,$ProbT5SG,$ProbT5SS);
	}
	
	echo "<br>";
	echo "Entropy of T5 AND CL is: " . $EntT5;
	echo "<br>";
	
	
	
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!        Social Integration       !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
	
	
	$result = mySQL_Query("SELECT S1 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$S1 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalS1 = sizeof($S1);
	echo "<br>";
	print_r($S1);
	echo "<br>"; 
	echo "Total S1: " . $totalS1;
	
	echo "<br>";
	echo "<h2>S1 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S1E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1E = sizeof($S1E);
	echo "Total S1 Excellent: " . $totalS1E . "<br>";
	$ProbS1E = $totalS1E/$totalS1;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S1EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1EE = sizeof($S1EE);
	$ProbS1EE = $totalS1EE/$totalS1E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S1EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1EG = sizeof($S1EG);
	$ProbS1EG = $totalS1EG/$totalS1E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S1ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1ES = sizeof($S1ES);
	$ProbS1ES = $totalS1ES/$totalS1E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S1G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1G = sizeof($S1G);
	echo "Total S1 Good: " . $totalS1G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S1GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1GE = sizeof($S1GE);
	$ProbS1GE = $totalS1GE/$totalS1G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S1GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1GG = sizeof($S1GG);
	$ProbS1GG = $totalS1GG/$totalS1G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S1GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1GS = sizeof($S1GS);
	$ProbS1GS = $totalS1GS/$totalS1G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S1S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1S = sizeof($S1S);
	echo "Total S1 Satisfactory: " . $totalS1S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S1SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1SE = sizeof($S1SE);
	$ProbS1SE = $totalS1SE/$totalS1S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S1SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1SG = sizeof($S1SG);
	$ProbS1SG = $totalS1SG/$totalS1S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S1 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S1SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S1SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS1SS = sizeof($S1SS);
	$ProbS1SS = $totalS1SS/$totalS1S;
	
	
	
	//Entropy of S1
	$ProbS1E= $totalS1E/$totalS1;
	$ProbS1G= $totalS1G/$totalS1;
	$ProbS1S= $totalS1S/$totalS1;
	
	
	if($ProbS1EE == 0 || $ProbS1EG == 0 || $ProbS1ES == 0)
	{
		$EntS1 = 0;
	}
	else
	{
		$EntS1= $ProbS1E * entropy($ProbS1EE,$ProbS1EG,$ProbS1ES) + $ProbS1G * entropy($ProbS1GE,$ProbS1GG,$ProbS1GS) + $ProbS1S * entropy($ProbS1SE,$ProbS1SG,$ProbS1SS);
	}
	
	echo "<br>";
	echo "Entropy of S1 AND CL is: " . $EntS1;
	echo "<br>";
	
	
	
	
	$result = mySQL_Query("SELECT S2 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$S2 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalS2 = sizeof($S2);
	echo "<br>";
	print_r($S2);
	echo "<br>"; 
	echo "Total S2: " . $totalS2;
	
	echo "<br>";
	echo "<h2>S2 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S2E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2E = sizeof($S2E);
	echo "Total S2 Excellent: " . $totalS2E . "<br>";
	$ProbS2E = $totalS2E/$totalS2;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S2EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2EE = sizeof($S2EE);
	$ProbS2EE = $totalS2EE/$totalS2E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S2EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2EG = sizeof($S2EG);
	$ProbS2EG = $totalS2EG/$totalS2E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S2ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2ES = sizeof($S2ES);
	$ProbS2ES = $totalS2ES/$totalS2E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S2G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2G = sizeof($S2G);
	echo "Total S2 Good: " . $totalS2G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S2GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2GE = sizeof($S2GE);
	$ProbS2GE = $totalS2GE/$totalS2G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S2GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2GG = sizeof($S2GG);
	$ProbS2GG = $totalS2GG/$totalS2G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S2GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2GS[$i] = $Drow[0];
		
		$i++;


	}
	echo "<br>";
	$totalS2GS = sizeof($S2GS);
	$ProbS2GS = $totalS2GS/$totalS2G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S2S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2S = sizeof($S2S);
	echo "Total S2 Satisfactory: " . $totalS2S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S2SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2SE = sizeof($S2SE);
	$ProbS2SE = $totalS2SE/$totalS2S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S2SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2SG = sizeof($S2SG);
	$ProbS2SG = $totalS2SG/$totalS2S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S2 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S2SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S2SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS2SS = sizeof($S2SS);
	$ProbS2SS = $totalS2SS/$totalS2S;
	
	
	
	//Entropy of S2
	$ProbS2E= $totalS2E/$totalS2;
	$ProbS2G= $totalS2G/$totalS2;
	$ProbS2S= $totalS2S/$totalS2;
	
	
	if($ProbS2EE == 0 || $ProbS2EG == 0 || $ProbS2ES == 0)
	{
		$EntS2 = 0;
	}
	else
	{
		$EntS2= $ProbS2E * entropy($ProbS2EE,$ProbS2EG,$ProbS2ES) + $ProbS2G * entropy($ProbS2GE,$ProbS2GG,$ProbS2GS) + $ProbS2S * entropy($ProbS2SE,$ProbS2SG,$ProbS2SS);
	}
	
	echo "<br>";
	echo "Entropy of S2 AND CL is: " . $EntS2;
	echo "<br>";
	
	
	
	
	$result = mySQL_Query("SELECT S3 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$S3 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalS3 = sizeof($S3);
	echo "<br>";
	print_r($S3);
	echo "<br>"; 
	echo "Total S3: " . $totalS3;
	
	echo "<br>";
	echo "<h2>S3 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S3E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3E = sizeof($S3E);
	echo "Total S3 Excellent: " . $totalS3E . "<br>";
	$ProbS3E = $totalS3E/$totalS3;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S3EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3EE = sizeof($S3EE);
	$ProbS3EE = $totalS3EE/$totalS3E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S3EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3EG = sizeof($S3EG);
	$ProbS3EG = $totalS3EG/$totalS3E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S3ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3ES = sizeof($S3ES);
	$ProbS3ES = $totalS3ES/$totalS3E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S3G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3G = sizeof($S3G);
	echo "Total S3 Good: " . $totalS3G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S3GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3GE = sizeof($S3GE);
	$ProbS3GE = $totalS3GE/$totalS3G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S3GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3GG = sizeof($S3GG);
	$ProbS3GG = $totalS3GG/$totalS3G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S3GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3GS = sizeof($S3GS);
	$ProbS3GS = $totalS3GS/$totalS3G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S3S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3S = sizeof($S3S);
	echo "Total S3 Satisfactory: " . $totalS3S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S3SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3SE = sizeof($S3SE);
	$ProbS3SE = $totalS3SE/$totalS3S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S3SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3SG = sizeof($S3SG);
	$ProbS3SG = $totalS3SG/$totalS3S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S3 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S3SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S3SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS3SS = sizeof($S3SS);
	$ProbS3SS = $totalS3SS/$totalS3S;
	
	
	
	//Entropy of S3
	$ProbS3E= $totalS3E/$totalS3;
	$ProbS3G= $totalS3G/$totalS3;
	$ProbS3S= $totalS3S/$totalS3;
	
	
	if($ProbS3EE == 0 || $ProbS3EG == 0 || $ProbS3ES == 0)
	{
		$EntS3 = 0;
	}
	else
	{
		$EntS3= $ProbS3E * entropy($ProbS3EE,$ProbS3EG,$ProbS3ES) + $ProbS3G * entropy($ProbS3GE,$ProbS3GG,$ProbS3GS) + $ProbS3S * entropy($ProbS3SE,$ProbS3SG,$ProbS3SS);
	}
	
	echo "<br>";
	echo "Entropy of S3 AND CL is: " . $EntS3;
	echo "<br>";
	
	
	
	$result = mySQL_Query("SELECT S4 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$S4 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalS4 = sizeof($S4);
	echo "<br>";
	print_r($S4);
	echo "<br>"; 
	echo "Total S4: " . $totalS4;
	
	echo "<br>";
	echo "<h2>S4 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S4E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4E = sizeof($S4E);
	echo "Total S4 Excellent: " . $totalS4E . "<br>";
	$ProbS4E = $totalS4E/$totalS4;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S4EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4EE = sizeof($S4EE);
	$ProbS4EE = $totalS4EE/$totalS4E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S4EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4EG = sizeof($S4EG);
	$ProbS4EG = $totalS4EG/$totalS4E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S4ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4ES = sizeof($S4ES);
	$ProbS4ES = $totalS4ES/$totalS4E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S4G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4G = sizeof($S4G);
	echo "Total S4 Good: " . $totalS4G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S4GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4GE = sizeof($S4GE);
	$ProbS4GE = $totalS4GE/$totalS4G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S4GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4GG = sizeof($S4GG);
	$ProbS4GG = $totalS4GG/$totalS4G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S4GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4GS = sizeof($S4GS);
	$ProbS4GS = $totalS4GS/$totalS4G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S4S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4S = sizeof($S4S);
	echo "Total S4 Satisfactory: " . $totalS4S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S4SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4SE = sizeof($S4SE);
	$ProbS4SE = $totalS4SE/$totalS4S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S4SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4SG = sizeof($S4SG);
	$ProbS4SG = $totalS4SG/$totalS4S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S4 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S4SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S4SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS4SS = sizeof($S4SS);
	$ProbS4SS = $totalS4SS/$totalS4S;
	
	
	
	//Entropy of S4
	$ProbS4E= $totalS4E/$totalS4;
	$ProbS4G= $totalS4G/$totalS4;
	$ProbS4S= $totalS4S/$totalS4;
	
	
	if($ProbS4EE == 0 || $ProbS4EG == 0 || $ProbS4ES == 0)
	{
		$EntS4 = 0;
	}
	else
	{
		$EntS4= $ProbS4E * entropy($ProbS4EE,$ProbS4EG,$ProbS4ES) + $ProbS4G * entropy($ProbS4GE,$ProbS4GG,$ProbS4GS) + $ProbS4S * entropy($ProbS4SE,$ProbS4SG,$ProbS4SS);
	}
	
	echo "<br>";
	echo "Entropy of S4 AND CL is: " . $EntS4;
	echo "<br>";
	
	
	
	$result = mySQL_Query("SELECT S5 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$S5 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalS5 = sizeof($S5);
	echo "<br>";
	print_r($S5);
	echo "<br>"; 
	echo "Total S5: " . $totalS5;
	
	echo "<br>";
	echo "<h2>S5 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S5E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5E = sizeof($S5E);
	echo "Total S5 Excellent: " . $totalS5E . "<br>";
	$ProbS5E = $totalS5E/$totalS5;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S5EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5EE = sizeof($S5EE);
	$ProbS5EE = $totalS5EE/$totalS5E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S5EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5EG = sizeof($S5EG);
	$ProbS5EG = $totalS5EG/$totalS5E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S5ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5ES = sizeof($S5ES);
	$ProbS5ES = $totalS5ES/$totalS5E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S5G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5G = sizeof($S5G);
	echo "Total S5 Good: " . $totalS5G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S5GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5GE = sizeof($S5GE);
	$ProbS5GE = $totalS5GE/$totalS5G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S5GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5GG = sizeof($S5GG);
	$ProbS5GG = $totalS5GG/$totalS5G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S5GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5GS = sizeof($S5GS);
	$ProbS5GS = $totalS5GS/$totalS5G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S5S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5S = sizeof($S5S);
	echo "Total S5 Satisfactory: " . $totalS5S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$S5SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5SE = sizeof($S5SE);
	$ProbS5SE = $totalS5SE/$totalS5S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$S5SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5SG = sizeof($S5SG);
	$ProbS5SG = $totalS5SG/$totalS5S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE S5 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$S5SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$S5SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalS5SS = sizeof($S5SS);
	$ProbS5SS = $totalS5SS/$totalS5S;
	
	
	
	//Entropy of S5
	$ProbS5E= $totalS5E/$totalS5;
	$ProbS5G= $totalS5G/$totalS5;
	$ProbS5S= $totalS5S/$totalS5;
	
	
	if($ProbS5EE == 0 || $ProbS5EG == 0 || $ProbS5ES == 0)
	{
		$EntS5 = 0;
	}
	else
	{
		$EntS5= $ProbS5E * entropy($ProbS5EE,$ProbS5EG,$ProbS5ES) + $ProbS5G * entropy($ProbS5GE,$ProbS5GG,$ProbS5GS) + $ProbS5S * entropy($ProbS5SE,$ProbS5SG,$ProbS5SS);
	}
	
	echo "<br>";
	echo "Entropy of S5 AND CL is: " . $EntS5;
	echo "<br>";
	
	
	
	
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!        Finance And Facilities       !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
	
	
	$result = mySQL_Query("SELECT F1 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$F1 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalF1 = sizeof($F1);
	echo "<br>";
	print_r($F1);
	echo "<br>"; 
	echo "Total F1: " . $totalF1;
	
	echo "<br>";
	echo "<h2>F1 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F1E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1E = sizeof($F1E);
	echo "Total F1 Excellent: " . $totalF1E . "<br>";
	$ProbF1E = $totalF1E/$totalF1;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F1EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1EE = sizeof($F1EE);
	$ProbF1EE = $totalF1EE/$totalF1E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F1EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1EG = sizeof($F1EG);
	$ProbF1EG = $totalF1EG/$totalF1E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F1ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1ES = sizeof($F1ES);
	$ProbF1ES = $totalF1ES/$totalF1E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F1G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1G = sizeof($F1G);
	echo "Total F1 Good: " . $totalF1G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F1GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1GE = sizeof($F1GE);
	$ProbF1GE = $totalF1GE/$totalF1G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F1GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1GG = sizeof($F1GG);
	$ProbF1GG = $totalF1GG/$totalF1G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F1GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1GS = sizeof($F1GS);
	$ProbF1GS = $totalF1GS/$totalF1G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F1S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1S = sizeof($F1S);
	echo "Total F1 Satisfactory: " . $totalF1S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F1SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1SE = sizeof($F1SE);
	$ProbF1SE = $totalF1SE/$totalF1S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F1SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1SG = sizeof($F1SG);
	$ProbF1SG = $totalF1SG/$totalF1S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F1 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F1SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F1SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF1SS = sizeof($F1SS);
	$ProbF1SS = $totalF1SS/$totalF1S;
	
	
	
	//Entropy of F1
	$ProbF1E= $totalF1E/$totalF1;
	$ProbF1G= $totalF1G/$totalF1;
	$ProbF1S= $totalF1S/$totalF1;
	
	
	if($ProbF1EE == 0 || $ProbF1EG == 0 || $ProbF1ES == 0)
	{
		$EntF1 = 0;
	}
	else
	{
		$EntF1= $ProbF1E * entropy($ProbF1EE,$ProbF1EG,$ProbF1ES) + $ProbF1G * entropy($ProbF1GE,$ProbF1GG,$ProbF1GS) + $ProbF1S * entropy($ProbF1SE,$ProbF1SG,$ProbF1SS);
	}
	
	echo "<br>";
	echo "Entropy of F1 AND CL is: " . $EntF1;
	echo "<br>";
	
	
	
	
	$result = mySQL_Query("SELECT F2 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$F2 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalF2 = sizeof($F2);
	echo "<br>";
	print_r($F2);
	echo "<br>"; 
	echo "Total F2: " . $totalF2;
	
	echo "<br>";
	echo "<h2>F2 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F2E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2E = sizeof($F2E);
	echo "Total F2 Excellent: " . $totalF2E . "<br>";
	$ProbF2E = $totalF2E/$totalF2;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F2EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2EE = sizeof($F2EE);
	$ProbF2EE = $totalF2EE/$totalF2E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F2EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2EG = sizeof($F2EG);
	$ProbF2EG = $totalF2EG/$totalF2E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F2ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2ES = sizeof($F2ES);
	$ProbF2ES = $totalF2ES/$totalF2E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F2G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2G = sizeof($F2G);
	echo "Total F2 Good: " . $totalF2G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F2GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2GE = sizeof($F2GE);
	$ProbF2GE = $totalF2GE/$totalF2G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F2GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2GG = sizeof($F2GG);
	$ProbF2GG = $totalF2GG/$totalF2G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F2GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2GS[$i] = $Drow[0];
		
		$i++;

	}
	echo "<br>";
	$totalF2GS = sizeof($F2GS);
	$ProbF2GS = $totalF2GS/$totalF2G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F2S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2S = sizeof($F2S);
	echo "Total F2 Satisfactory: " . $totalF2S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F2SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2SE = sizeof($F2SE);
	$ProbF2SE = $totalF2SE/$totalF2S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F2SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2SG = sizeof($F2SG);
	$ProbF2SG = $totalF2SG/$totalF2S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F2 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F2SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F2SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF2SS = sizeof($F2SS);
	$ProbF2SS = $totalF2SS/$totalF2S;
	
	
	
	//Entropy of F2
	$ProbF2E= $totalF2E/$totalF2;
	$ProbF2G= $totalF2G/$totalF2;
	$ProbF2S= $totalF2S/$totalF2;
	
	
	if($ProbF2EE == 0 || $ProbF2EG == 0 || $ProbF2ES == 0)
	{
		$EntF2 = 0;
	}
	else
	{
		$EntF2= $ProbF2E * entropy($ProbF2EE,$ProbF2EG,$ProbF2ES) + $ProbF2G * entropy($ProbF2GE,$ProbF2GG,$ProbF2GS) + $ProbF2S * entropy($ProbF2SE,$ProbF2SG,$ProbF2SS);
	}
	
	echo "<br>";
	echo "Entropy of F2 AND CL is: " . $EntF2;
	echo "<br>";
	
	
	
	
	$result = mySQL_Query("SELECT F3 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$F3 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalF3 = sizeof($F3);
	echo "<br>";
	print_r($F3);
	echo "<br>"; 
	echo "Total F3: " . $totalF3;
	
	echo "<br>";
	echo "<h2>F3 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F3E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3E = sizeof($F3E);
	echo "Total F3 Excellent: " . $totalF3E . "<br>";
	$ProbF3E = $totalF3E/$totalF3;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F3EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3EE = sizeof($F3EE);
	$ProbF3EE = $totalF3EE/$totalF3E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F3EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3EG = sizeof($F3EG);
	$ProbF3EG = $totalF3EG/$totalF3E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F3ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3ES = sizeof($F3ES);
	$ProbF3ES = $totalF3ES/$totalF3E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F3G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3G = sizeof($F3G);
	echo "Total F3 Good: " . $totalF3G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F3GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3GE = sizeof($F3GE);
	$ProbF3GE = $totalF3GE/$totalF3G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F3GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3GG = sizeof($F3GG);
	$ProbF3GG = $totalF3GG/$totalF3G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F3GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3GS = sizeof($F3GS);
	$ProbF3GS = $totalF3GS/$totalF3G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F3S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3S = sizeof($F3S);
	echo "Total F3 Satisfactory: " . $totalF3S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F3SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3SE = sizeof($F3SE);
	$ProbF3SE = $totalF3SE/$totalF3S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F3SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3SG = sizeof($F3SG);
	$ProbF3SG = $totalF3SG/$totalF3S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F3 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F3SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F3SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF3SS = sizeof($F3SS);
	$ProbF3SS = $totalF3SS/$totalF3S;
	
	
	
	//Entropy of F3
	$ProbF3E= $totalF3E/$totalF3;
	$ProbF3G= $totalF3G/$totalF3;
	$ProbF3S= $totalF3S/$totalF3;
	
	
	if($ProbF3EE == 0 || $ProbF3EG == 0 || $ProbF3ES == 0)
	{
		$EntF3 = 0;
	}
	else
	{
		$EntF3= $ProbF3E * entropy($ProbF3EE,$ProbF3EG,$ProbF3ES) + $ProbF3G * entropy($ProbF3GE,$ProbF3GG,$ProbF3GS) + $ProbF3S * entropy($ProbF3SE,$ProbF3SG,$ProbF3SS);
	}
	
	echo "<br>";
	echo "Entropy of F3 AND CL is: " . $EntF3;
	echo "<br>";
	
	
	
	$result = mySQL_Query("SELECT F4 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$F4 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalF4 = sizeof($F4);
	echo "<br>";
	print_r($F4);
	echo "<br>"; 
	echo "Total F4: " . $totalF4;
	
	echo "<br>";
	echo "<h2>F4 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F4E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4E = sizeof($F4E);
	echo "Total F4 Excellent: " . $totalF4E . "<br>";
	$ProbF4E = $totalF4E/$totalF4;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F4EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4EE = sizeof($F4EE);
	$ProbF4EE = $totalF4EE/$totalF4E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F4EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4EG = sizeof($F4EG);
	$ProbF4EG = $totalF4EG/$totalF4E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F4ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4ES = sizeof($F4ES);
	$ProbF4ES = $totalF4ES/$totalF4E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F4G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4G = sizeof($F4G);
	echo "Total F4 Good: " . $totalF4G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F4GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4GE = sizeof($F4GE);
	$ProbF4GE = $totalF4GE/$totalF4G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F4GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4GG = sizeof($F4GG);
	$ProbF4GG = $totalF4GG/$totalF4G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F4GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4GS = sizeof($F4GS);
	$ProbF4GS = $totalF4GS/$totalF4G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F4S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4S = sizeof($F4S);
	echo "Total F4 Satisfactory: " . $totalF4S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F4SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4SE = sizeof($F4SE);
	$ProbF4SE = $totalF4SE/$totalF4S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F4SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4SG = sizeof($F4SG);
	$ProbF4SG = $totalF4SG/$totalF4S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F4 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F4SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F4SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF4SS = sizeof($F4SS);
	$ProbF4SS = $totalF4SS/$totalF4S;
	
	
	
	//Entropy of F4
	$ProbF4E= $totalF4E/$totalF4;
	$ProbF4G= $totalF4G/$totalF4;
	$ProbF4S= $totalF4S/$totalF4;
	
	
	if($ProbF4EE == 0 || $ProbF4EG == 0 || $ProbF4ES == 0)
	{
		$EntF4 = 0;
	}
	else
	{
		$EntF4= $ProbF4E * entropy($ProbF4EE,$ProbF4EG,$ProbF4ES) + $ProbF4G * entropy($ProbF4GE,$ProbF4GG,$ProbF4GS) + $ProbF4S * entropy($ProbF4SE,$ProbF4SG,$ProbF4SS);
	}
	
	echo "<br>";
	echo "Entropy of F4 AND CL is: " . $EntF4;
	echo "<br>";
	
	
	
	$result = mySQL_Query("SELECT F5 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$F5 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalF5 = sizeof($F5);
	echo "<br>";
	print_r($F5);
	echo "<br>"; 
	echo "Total F5: " . $totalF5;
	
	echo "<br>";
	echo "<h2>F5 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F5E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5E = sizeof($F5E);
	echo "Total F5 Excellent: " . $totalF5E . "<br>";
	$ProbF5E = $totalF5E/$totalF5;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F5EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5EE = sizeof($F5EE);
	$ProbF5EE = $totalF5EE/$totalF5E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F5EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5EG = sizeof($F5EG);
	$ProbF5EG = $totalF5EG/$totalF5E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F5ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5ES = sizeof($F5ES);
	$ProbF5ES = $totalF5ES/$totalF5E;	
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F5G = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5G[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5G = sizeof($F5G);
	echo "Total F5 Good: " . $totalF5G . "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F5GE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5GE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5GE = sizeof($F5GE);
	$ProbF5GE = $totalF5GE/$totalF5G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F5GG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5GG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5GG = sizeof($F5GG);
	$ProbF5GG = $totalF5GG/$totalF5G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F5GS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5GS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5GS = sizeof($F5GS);
	$ProbF5GS = $totalF5GS/$totalF5G;
	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F5S = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5S[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5S = sizeof($F5S);
	echo "Total F5 Satisfactory: " . $totalF5S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F5SE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5SE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5SE = sizeof($F5SE);
	$ProbF5SE = $totalF5SE/$totalF5S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F5SG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5SG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5SG = sizeof($F5SG);
	$ProbF5SG = $totalF5SG/$totalF5S;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F5 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F5SS = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F5SS[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF5SS = sizeof($F5SS);
	$ProbF5SS = $totalF5SS/$totalF5S;
	
	
	
	//Entropy of F5
	$ProbF5E= $totalF5E/$totalF5;
	$ProbF5G= $totalF5G/$totalF5;
	$ProbF5S= $totalF5S/$totalF5;
	
	
	if($ProbF5EE == 0 || $ProbF5EG == 0 || $ProbF5ES == 0)
	{
		$EntF5 = 0;
	}
	else
	{
		$EntF5= $ProbF5E * entropy($ProbF5EE,$ProbF5EG,$ProbF5ES) + $ProbF5G * entropy($ProbF5GE,$ProbF5GG,$ProbF5GS) + $ProbF5S * entropy($ProbF5SE,$ProbF5SG,$ProbF5SS);
	}
	
	echo "<br>";
	echo "Entropy of F5 AND CL is: " . $EntF5;
	echo "<br>";
	
	
	
	
	$result = mySQL_Query("SELECT F6 FROM ranking") or die(mySQL_error());
	$Drow = array();
	$F6 = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6[$i] = $Drow[0];
		
		$i++;
	}
	
	$totalF6 = sizeof($F6);
	echo "<br>";
	print_r($F6);
	echo "<br>"; 
	echo "Total F6: " . $totalF6;
	
	echo "<br>";
	echo "<h2>F6 Prob!!!</h2> <br>";

	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F6E = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6E[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF6E = sizeof($F6E);
	echo "Total F6 Excellent: " . $totalF6E . "<br>";
	$ProbF6E = $totalF6E/$totalF6;

	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Excellent' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	
	$F6EE = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6EE[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF6EE = sizeof($F6EE);
	$ProbF6EE = $totalF6EE/$totalF6E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Excellent' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	
	$F6EG = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6EG[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF6EG = sizeof($F6EG);
	$ProbF6EG = $totalF6EG/$totalF6E;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Excellent' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	
	$F6ES = array();
	
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6ES[$i] = $Drow[0];
		
		$i++;
	}
	echo "<br>";
	$totalF6ES = sizeof($F6ES);
	$ProbF6ES = $totalF6ES/$totalF6E;	
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Good'") or die(mySQL_error());
	$Drow = array();
	$F6G = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6G[$i] = $Drow[0];
		$i++;
	}
	echo "<br>";
	$totalF6G = sizeof($F6G);
	echo "Total F6 Good: " . $totalF6G . "<br>";
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Good' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	$F6GE = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6GE[$i] = $Drow[0];
		$i++;
	}
	echo "<br>";
	$totalF6GE = sizeof($F6GE);
	$ProbF6GE = $totalF6GE/$totalF6G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Good' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	$F6GG = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6GG[$i] = $Drow[0];
		$i++;
	}
	echo "<br>";
	$totalF6GG = sizeof($F6GG);
	$ProbF6GG = $totalF6GG/$totalF6G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Good' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	$F6GS = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6GS[$i] = $Drow[0];
		$i++;
	}
	echo "<br>";
	$totalF6GS = sizeof($F6GS);
	$ProbF6GS = $totalF6GS/$totalF6G;
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	$F6S = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6S[$i] = $Drow[0];
		$i++;
	}
	echo "<br>";
	$totalF6S = sizeof($F6S);
	echo "Total F6 Satisfactory: " . $totalF6S . "<br>";
	echo "<br>";
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Satisfactory' AND CL = 'Excellent'") or die(mySQL_error());
	$Drow = array();
	$F6SE = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6SE[$i] = $Drow[0];
		$i++;
	}
	echo "<br>";
	$totalF6SE = sizeof($F6SE);
	$ProbF6SE = $totalF6SE/$totalF6S;
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Satisfactory' AND CL = 'Good'") or die(mySQL_error());
	$Drow = array();
	$F6SG = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6SG[$i] = $Drow[0];
		$i++;
	}
	echo "<br>";
	$totalF6SG = sizeof($F6SG);
	$ProbF6SG = $totalF6SG/$totalF6S;
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE F6 = 'Satisfactory' AND CL = 'Satisfactory'") or die(mySQL_error());
	$Drow = array();
	$F6SS = array();
	$i= 0;
	while($Drow = mySQL_fetch_array($result))
	{
		$F6SS[$i] = $Drow[0];
		$i++;
	}
	echo "<br>";
	$totalF6SS = sizeof($F6SS);
	$ProbF6SS = $totalF6SS/$totalF6S;
	
	//Entropy of F6
	$ProbF6E= $totalF6E/$totalF6;
	$ProbF6G= $totalF6G/$totalF6;
	$ProbF6S= $totalF6S/$totalF6;
	
	if($ProbF6EE == 0 || $ProbF6EG == 0 || $ProbF6ES == 0)
	{
		$EntF6 = 0;
	}
	else
	{
		$EntF6= $ProbF6E * entropy($ProbF6EE,$ProbF6EG,$ProbF6ES) + $ProbF6G * entropy($ProbF6GE,$ProbF6GG,$ProbF6GS) + $ProbF6S * entropy($ProbF6SE,$ProbF6SG,$ProbF6SS);
	}
	
	echo "<br>";
	echo "Entropy of F6 AND CL is: " . $EntF6;
	echo "<br>";
	
	
	
	
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!        Information Gain        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
	
	
	$gain = array();
	
	
	$gain[0] = $totalEnt - $EntR1;
	$gain[1] = $totalEnt - $EntR2;	
	$gain[2] = $totalEnt - $EntR3;	
	$gain[3] = $totalEnt - $EntR4;	
	$gain[4] = $totalEnt - $EntR5;	
	$gain[5] = $totalEnt - $EntR6;	
	$gain[6] = $totalEnt - $EntR7;	
	$gain[7] = $totalEnt - $EntR8;	
	$gain[8] = $totalEnt - $EntR9;	
	$gain[9] = $totalEnt - $EntR10;	
	$gain[10] = $totalEnt - $EntR11;	
	$gain[11] = $totalEnt - $EntR12;	
	$gain[12] = $totalEnt - $EntR13;
	$gain[13] = $totalEnt - $EntR14;	
	$gain[14] = $totalEnt - $EntI1;
	$gain[15] = $totalEnt - $EntI2;
	$gain[16] = $totalEnt - $EntI3;
	$gain[17] = $totalEnt - $EntI4;
	$gain[18] = $totalEnt - $EntI5;
	$gain[19] = $totalEnt - $EntT1;
	$gain[20] = $totalEnt - $EntT2;
	$gain[21] = $totalEnt - $EntT3;
	$gain[22] = $totalEnt - $EntT4;
	$gain[23] = $totalEnt - $EntT5;
	$gain[24] = $totalEnt - $EntS1;
	$gain[25] = $totalEnt - $EntS2;
	$gain[26] = $totalEnt - $EntS3;
	$gain[27] = $totalEnt - $EntS4;
	$gain[28] = $totalEnt - $EntS5;
	$gain[29] = $totalEnt - $EntF1;
	$gain[30] = $totalEnt - $EntF2;
	$gain[31] = $totalEnt - $EntF3;
	$gain[32] = $totalEnt - $EntF4;
	$gain[33] = $totalEnt - $EntF5;
	$gain[34] = $totalEnt - $EntF6;
	
	$maxGain = 0;
	$maxIndex = 0;
	for($x=0;$x<35;$x++)
	{
		if(isset($gain[$x]))
		{
			if($gain[$x]>$maxGain)
			{
				$maxGain = $gain[$x];
				$maxIndex = $x;
			}
		}
	}
	
	switch ($maxIndex) 
	{
		case 0:
			echo "R1";
			break;
		case 1:
			echo "R2";
			break;
		case 2:
			echo "R3";
			break;	
		case 3:
			echo "R4";
			break;
		case 4:
			echo "R5";
			break;
		case 5:
			echo "R6";
			break;
		case 6:
			echo "R7";
			break;
		case 7:
			echo "R8";
			break;
		case 8:
			echo "R9";
			break;
		case 9:
			echo "R10";
			break;
		case 10:
			echo "R11";
			break;
		case 11:
			echo "R12";
			break;
		case 12:
			echo "R13";
			break;
		case 13:
			echo "R14";
			break;
		case 14:
			echo "I1";
			break;
		case 15:
			echo "I2";
			break;
		case 16:
			echo "I3";
			break;
		case 17:
			echo "I4";
			break;
		case 18:
			echo "I5";
			break;
		case 19:
			echo "T1";
			break;
		case 20:
			echo "T2";
			break;	
		case 21:
			echo "T3";
			break;	
		case 22:
			echo "T4";
			break;	
		case 23:
			echo "T5";
			break;	
		case 24:
			echo "S1";
			break;	
		case 25:
			echo "S2";
			break;	
		case 26:
			echo "S3";
			break;	
		case 27:
			echo "S4";
			break;	
		case 28:
			echo "S5";
			break;	
		case 29:
			echo "F1";
			break;	
		case 30:
			echo "F2";
			break;	
		case 31:
			echo "F3";
			break;	
		case 32:
			echo "F4";
			break;	
		case 33:
			echo "F5";
			break;	
		case 34:
			echo "F6";
			break;	
	}
}
decision();
?>