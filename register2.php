<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	
<?php
	if (isset($_GET["empty"]))
		echo 'No attribute can be empty!' ;	
	if (isset($_GET["fail"]))
		echo 'passwords are not the same.' ;
	if (isset($_GET["err"]))
		echo 'account already used, please try another.' ;
	echo "<form method = 'post' action = 'register3.php'>" ;
	$switch = $_GET["type"] ;
	echo "Account: <input name = 'account_id' type = 'text' /><br />" ;
	echo "Password: <input name = 'password' type = 'password' /><br />" ;
	echo "Confirm Password: <input name = 'cpw' type = 'password'><br />" ;
	if ($switch == "artist")
	{
		echo "Artist Name: <input name = 'name' type = 'text'><br />" ;
	    echo "Debute Time(Year): <input name = 'debut_time' type = 'text'><br />" ;
	}
	else
	{
		echo "Audience Name: <input name = 'name' type = 'text'><br />" ;
	    echo "Phone Number: <input name = 'phone' type = 'text'><br />" ;
	}
	echo "<input name = 'type' type = 'hidden' value = '$switch'>" ;
	echo "<input name = 'submit' type = 'submit'" ;
?>
</body>
</html>