<?php
	session_start();
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$_SESSION["user"] = $username;

	//echo $username;
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	//echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	//echo "DB Connected";
	//echo "<br>";
	
	$result = mySQL_Query("SELECT * FROM admin WHERE username='$username' AND Password='$password'") or die(mySQL_error());
	$row = array();
	$up = array();
	
	$i= 0;
	while($row = mySQL_fetch_array($result))
	{
		//if(isset($row[0]))
		
			$up[$i] = $row[0];
		
		$i++;
	}
	$size = sizeof($up);
	if($size>0)
	{
		if(isset($up[0]))
			$_SESSION["id"] = $up[0];
		header("location: http://localhost/FYP/fyp-1/research.HTML");
	}
	else
		header("location: http://localhost/FYP/fyp-1/checkSignin.html");
	/*
	for($a=0;$a<$size;$a++)
	{
		if(isset($up[$a]))
		{
		
			if($up[$a]==$username && $up[$a+1]==$password)
			{
					echo "Login";
					header("location: http://localhost/FYP/fyp-1/research.HTML");
			}
			else
			{
				echo "Log out";
				
				header("location: http://localhost/FYP/fyp-1/checkSignin.html");
			}
		}
	}
	*/
?>