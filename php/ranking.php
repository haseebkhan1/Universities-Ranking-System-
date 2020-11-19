<?php
	session_start();
	$score = $_SESSION['TotalScore'];
	$id = $_SESSION['id'];
	

	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	//echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	//echo "DB Connected <br>";
	
	
	
	//$uni1rs = $resc[0];
	// WHERE score='$uni1rs'
	$result = mySQL_Query("SELECT R1 FROM research") or die(mySQL_error());
	$Rrow = array();
	$newarr = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$newarr[$i] = $Rrow[0];
		
		$i++;
	}
	
	/*
	if(isset($newarr[0]))
		$uni1id = $newarr[0];
	
	
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
	
	
	$result = mySQL_Query("SELECT CL FROM ranking WHERE Uni_id='$id'") or die(mySQL_error());
	$Rrow = array();
	$rk = array();
	
	$i= 0;
	while($Rrow = mySQL_fetch_array($result))
	{
		$rk[$i] = $Rrow[0];
		
		$i++;
	}
	$rank = $rk[0];
	*/
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ranking</title>
</head>
<style>.table1 thead th{
    padding:15px;
    color:#fff;
    text-shadow:1px 1px 1px #568F23;
    border:1px solid #93CE37;
    border-bottom:3px solid #9ED929;
    background-color:#9DD929;
    background:-webkit-gradient(
        linear,
        left bottom,
        left top,
        color-stop(0.02, rgb(123,192,67)),
        color-stop(0.51, rgb(139,198,66)),
        color-stop(0.87, rgb(158,217,41))
        );
    background: -moz-linear-gradient(
        center bottom,
        rgb(123,192,67) 2%,
        rgb(139,198,66) 51%,
        rgb(158,217,41) 87%
        );
    -webkit-border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -moz-border-radius:5px 5px 0px 0px;
    border-top-left-radius:5px;
    border-top-right-radius:5px;
}
.table1 thead th:empty{
    background:transparent;
    border:none;
}
.table1 tfoot td{
    color: #9CD009;
    font-size:32px;
    text-align:center;
    padding:10px 0px;
    text-shadow:1px 1px 1px #444;
}
.table1 tfoot th{
    color:#666;
}
.table1 tbody td{
    padding:10px;
    text-align:center;
    background-color:#DEF3CA;
    border: 2px solid #E7EFE0;
    -moz-border-radius:2px;
    -webkit-border-radius:2px;
    border-radius:2px;
    color:#666;
    text-shadow:1px 1px 1px #fff;
}
.table1 tbody span.check::before{
    content : url(../images/check0.png)
}
</style>
<body>
<div>
<table width="80%" height="700" class="table1" align="center">
	<thead>
		<tr>
			
		  <th width="70" scope="col" abbr="Starter">Rank</th>
			<th width="241" scope="col" abbr="Medium">University</th>
			<th width="117" scope="col" abbr="Business">Category</th>
			<th width="117" scope="col" abbr="Deluxe">Score</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td height="76"></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tfoot>
	<tbody>
	<?php
		
		
		$result = mySQL_Query("SELECT score FROM admin ORDER BY score desc") or die(mySQL_error());
			$Rrow = array();
			$adsc = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$adsc[$i] = $Rrow[0];
				
				$i++;
			}
			
			$result = mySQL_Query("SELECT UniversityName FROM admin ORDER BY score desc") or die(mySQL_error());
			$Rrow = array();
			$adnm = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$adnm[$i] = $Rrow[0];
				
				$i++;
			}
			
			
			
			//$score = $adsc[0];
			//echo $score;
		
		$uniid=0;
		$unicl=NULL;
		for($x=0;$x<sizeof($newarr);$x++)
		{
			
				
			$result = mySQL_Query("SELECT score FROM admin WHERE Uni_id=$id") or die(mySQL_error());
			$Rrow = array();
			$resc = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$resc[$i] = $Rrow[0];
				
				$i++;
			}
			sort($resc);
			
			$result = mySQL_Query("SELECT score FROM internationalization") or die(mySQL_error());
			$Rrow = array();
			$insc = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$insc[$i] = $Rrow[0];
				
				$i++;
			}
			sort($insc);
			
			
			$result = mySQL_Query("SELECT score FROM teaching") or die(mySQL_error());
			$Rrow = array();
			$tesc = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$tesc[$i] = $Rrow[0];
				
				$i++;
			}
			sort($tesc);
			
			
			$result = mySQL_Query("SELECT score FROM social_integration") or die(mySQL_error());
			$Rrow = array();
			$sisc = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$sisc[$i] = $Rrow[0];
				
				$i++;
			}
			sort($sisc);
			
			
			$result = mySQL_Query("SELECT score FROM finance") or die(mySQL_error());
			$Rrow = array();
			$fisc = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$fisc[$i] = $Rrow[0];
				
				$i++;
			}
			sort($fisc);
			
			
			//$score = array();
			//for($a=0;$a<sizeof($resc);$a++)
			//{
				//$score[$x] = $resc[$x] + $insc[$x] + $tesc[$x] + $sisc[$x] + $fisc[$x];
			//}
			
			
			$rank = $x+1;
			if(isset($resc[$x]))
			$r = $resc[$x];
			$result = mySQL_Query("SELECT Uni_id FROM research WHERE score='$r'") or die(mySQL_error());
			$Rrow = array();
			$arr = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$arr[$i] = $Rrow[0];
				
				$i++;
			}
			if(isset($arr[0]))
				$uniid = $arr[0];
			
			
			
			$result = mySQL_Query("SELECT UniversityName FROM admin WHERE Uni_id='$rank'") or die(mySQL_error());
			$Rrow = array();
			$narr = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$narr[$i] = $Rrow[0];
				
				$i++;
			}
			if(isset($narr[0]))
				$uni = $narr[0];
			
			
			$result = mySQL_Query("SELECT CL FROM ranking WHERE Uni_id='$rank'") or die(mySQL_error());
			$Rrow = array();
			$newar = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$newar[$i] = $Rrow[0];
				
				$i++;
			}
			
			if(isset($newar[0]))
				$unicl = $newar[0];
			$uniscore = $score[$x];
		//$totalscore = $resc[$x] + $insc[$x] + $tesc[$x] + $sisc[$x] + $fisc[$x];
			//print_r($adsc);
			echo "<tr>";
				echo "<td>".$rank."</td>";
				if(isset($adnm[$x]))
				echo "<td>".$adnm[$x]."</td>";
				$q = $adnm[$x];
				$result = mySQL_Query("SELECT CL FROM ranking WHERE UniversityName='$q'") or die(mySQL_error());
			$Rrow = array();
			$adcl = array();
			
			$i= 0;
			while($Rrow = mySQL_fetch_array($result))
			{
				$adcl[$i] = $Rrow[0];
				
				
				echo "<td>".$Rrow[$i]."</td>";
				$i++;
			}
			//echo $q;
			
				//if(isset($adcl[$x]))
				//print_r($adcl);
				if(isset($adsc[$x]))
				echo "<td>".$adsc[$x]."</td>";
			echo "</tr>";
		}
	?>
		<!--
		<tr>
			
			<td>2</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td></td>
		</tr>
		<tr>
			
			<td>3</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td></td>
		</tr>
		<tr>
			
			<td>4</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td></td>
		</tr>
		<tr>
			
			<td><span class="check">5</span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
		</tr>
		<tr>
			
			<td><span class="check">6</span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
		</tr>
		<tr>
			
			<td><span class="check">7</span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
		</tr>
		<tr>
			
			<td><span class="check">8</span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
		</tr>
		<tr>
			
			<td><span class="check">9</span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
		</tr>
		<tr>
			
			<td><span class="check">10</span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
			<td><span class="check"></span></td>
		</tr>
		-->
	</tbody>
</table></div>
</body>
</html>