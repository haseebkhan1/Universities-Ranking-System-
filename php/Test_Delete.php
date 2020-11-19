<?php
function conn()
{
	mySQL_connect("localhost","root","1234") or die(mySQL_error());
	echo "MySQL Connection Established";
	mySQL_select_DB("universityrankingsystem") or die(mySQL_error());
	echo "DB Connected";
	
	$sql = "DELETE FROM research";
	$result = mySQL_Query($sql) or die(mySQL_error());
	
	$fsql = "DELETE FROM finance";
	$result = mySQL_Query($fsql) or die(mySQL_error());
	
	$isql = "DELETE FROM internationalization";
	$result = mySQL_Query($isql) or die(mySQL_error());
	
	$ssql = "DELETE FROM social_integration";
	$result = mySQL_Query($ssql) or die(mySQL_error());
	
	$tsql = "DELETE FROM teaching";
	$result = mySQL_Query($tsql) or die(mySQL_error());
	
	$tsql = "DELETE FROM ranking";
	$result = mySQL_Query($tsql) or die(mySQL_error());
}
conn();
?>
	