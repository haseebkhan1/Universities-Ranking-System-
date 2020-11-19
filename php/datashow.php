<?php
session_start();
$id = $_SESSION['id'];
$research = $_SESSION['Rscore'];
$inter = $_SESSION['Iscore'];
$teaching = $_SESSION['Tscore'];
$social = $_SESSION['Sscore'];
$finance = $_SESSION['Fscore'];
$totalScore = $_SESSION['TotalScore'];


$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '1234';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

//echo $id; exit;

$sql = "UPDATE research
        SET score=$research
        WHERE Uni_id='$id'";

mysql_select_db('universityrankingsystem');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
//echo "Updated data successfully\n";

$sql = "UPDATE admin
        SET score=$totalScore
        WHERE Uni_id='$id'";

mysql_select_db('universityrankingsystem');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Score</title>
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
<style>
input.MyButton {
width: 200px;
padding: 10px;
font-weight:bold;
font-size: 70%;
background: #3366CC;
color: #FFFFFF;
cursor: pointer;
border: 1px solid #999999;
border-radius: 5px;
-webkit-box-shadow: 6px 6px 5px #999999;
-moz-box-shadow: 6px 6px 5px #999999;
box-shaddow: 6px 6px 5px; #999999;

}
input.MyButton:hover {
color: #FFFF00;
background: #3366CC;
border: 1px solid #A3A3A3;
-webkit-box-shadow: 2px 2px 5px #666666;
-moz-box-shadow: 2px 2px 5px #666666;
box-shaddow: 2px 2px 5px; #666666;
}
</style>
<body>
<div>
<table width="80%" height="626" class="table1" align="center">
	<thead>
		<tr>
			
		  <th width="564" scope="col" abbr="Starter">Attributes</th>
			<th width="241" scope="col" abbr="Medium">Total Score</th>
			<th width="241" scope="col" abbr="Business">Obtained Score</th>
		<!--	<th width="257" scope="col" abbr="Deluxe">CLick for Detail</th> -->
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td height="76">&nbsp;</td>
			<td> <form action="http://localhost/FYP/fyp-1/ranking.php">
<input class="MyButton" type="submit" value="Rank" onClick="link" />
</form></td>
			<td></td>
			<td></td>
		</tr>
	</tfoot>
	<tbody>
		<tr>
			
			<td>Research</td>
			<td>36</td>
			<td><?php echo $research; ?></td>
		<!--	<td><p><a href="http://localhost/FYP/fyp-1/research.HTML">Research</a></p></td> -->
		</tr>
		<tr>
			
			<td>Internationalization</td>
			<td>6</td>
			<td><?php echo $inter; ?></td>
		<!--	<td><p><a href="http://localhost/FYP/fyp-1/internationalisation.HTML">Internationalisation</a></p></td> -->
		</tr>
		<tr>
			
			<td>Teaching Quality</td>
			<td>30</td>
			<td><?php echo $teaching; ?></td>
		<!--	<td><p><a href="http://localhost/FYP/fyp-1/newteachingqualtiy.html">Teaching Quality</a></p></td> -->
		</tr>
		<tr>
			
			<td>Social Integration</td>
			<td>8</td>
			<td><?php echo $social; ?></td>
		<!--	<td><p><a href="http://localhost/FYP/fyp-1/newsocial.html">Social</a></p></td> -->
		</tr>
		<tr>
			
			<td><span class="check">Finance And Facilities</span></td>
			<td><span class="check">20</span></td>
			<td><span class="check"><?php echo $finance; ?></span></td>
		<!--	<td><span class="check"><p><a href="http://localhost/FYP/fyp-1/newfinence.html">Finance</a></p></span></td> -->
		</tr>
		<tr>
			
			<td><span class="check"></span></td>
			<td><span class="check"><p>100</p></span></td>
			<td><span class="check"><?php echo $totalScore; ?></td>
           <!-- <td><span class="check"></td> -->
			        </tr>
			</tbody>
</table>	
</body>
</html>