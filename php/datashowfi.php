<?php
session_start();
$research = $_SESSION['Rscore'];
$inter = $_SESSION['Iscore'];
$teaching = $_SESSION['Tscore'];
$social = $_SESSION['Sscore'];
$finance = $_SESSION['Fscore'];
$totalScore = $_SESSION['TotalScore'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
<table width="80%" height="626" class="table1" align="center">
	<thead>
		<tr>
			
		  <th width="864" scope="col" abbr="Starter">Attributes</th>
			<th width="241" scope="col" abbr="Medium">Total Score</th>
			<th width="117" scope="col" abbr="Business">Obtain Scores</th>
			<th width="257" scope="col" abbr="Deluxe">CLick for Detail</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td height="76">&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tfoot>
	<tbody>
		<tr>
			
			<td>Research</td>
			<td>36</td>
			<td><?php echo $research[0]; ?></td>
			<td><p><a href="http://localhost/FYP/fyp-1/research.HTML">Research</a></p></td>
		</tr>
		<tr>
			
			<td>Internationalisation</td>
			<td>6</td>
			<td><?php echo $inter[0]; ?></td>
			<td><p><a href="http://localhost/FYP/fyp-1/internationalisation.HTML">Internationalisation</a></p></td>
		</tr>
		<tr>
			
			<td>Teaching Quality</td>
			<td>30</td>
			<td><?php echo $teaching[0]; ?></td>
			<td><span class="check"><p><a href="http://localhost/FYP/fyp-1/newteachingqualtiy.html">Teaching quality</a></p></span></td>
		</tr>
		<tr>
			
			<td>Social</td>
			<td>8</td>
			<td><?php echo $social[0]; ?></td>
			<td><p><a href="http://localhost/FYP/fyp-1/newsocial.html">Social</a></p></td>
		</tr>
		<tr>
			
			<td><span class="check">Finance And Facility</span></td>
			<td><span class="check"></span><p>20</p></td>
			<td><span class="check"></span><p><?php echo $finance[0]; ?></td>
			<td><p><a href="http://localhost/FYP/fyp-1/newfinence.html">Finance</a></p></td>
		</tr>
		<tr>
			
			<td><span class="check"></span></td>
			<td><span class="check"><p>100</p></span></td>
			<td><span class="check"><p><?php echo $totalScore[0]; ?></p></span></td>
			<td><span class="check"></span></td>
		</tr>
	</tbody>
</table></div>
</body>
</html>