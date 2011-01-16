<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	if (isset($_GET["fail"]))
		echo 'login failed' ;
?>
<form method = 'post' action = 'login2.php'>
Account: <input name = 'account_id' type = 'text' /><br />
Password: <input name = 'password' type = 'password' /><br />
<input name = 'submit' type = 'submit' />
</form>

</body>
</html>