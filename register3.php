<?php
	
	$acc = $_POST["account_id"] ;
	$pw = md5($_POST["password"]) ;
	$cpw = md5($_POST["cpw"]) ;
	$type = $_POST["type"] ;
	$name = $_POST["name"] ;
	$dtime = $_POST["debut_time"] ;
	$phone = $_POST["phone"] ;
	$id_seq = 1 ;
	$db_host = 'localhost' ;
	$db_database = 'DBproject' ;
	$db_username = 'root' ;
	if ($pw != $cpw)
		header ("Location:http://localhost/register2.php?fail=1") ;
	$connection = mysql_connect($db_host, $db_username, '');
	if (!$connection)
		die ("connection failed".mysql_error()) ;
	$selection = mysql_select_db($db_database) ;
	if (!$selection)
		die ("selection failed".mysql_error()) ;
	$valid = "SELECT * FROM account WHERE account_id = '$acc';" ;
	$valid2 = mysql_query($valid) ;
	if ($same = mysql_fetch_row($valid2))
		header ("Location:http://localhost/register2.php?err=1") ;
	if ($type == artist)
	{
		$total = "SELECT * FROM artist" ;
		$result = mysql_query($total) ;
		while ($result_row = mysql_fetch_row(($result)))
			$id_seq += 1 ;
		$query1 = "INSERT INTO account(account_id, password, type, type_id) VALUES ('$acc', '$pw', '$type', '$id_seq') " ;
		$query2 = "INSERT INTO artist(id, name, debut_time) VALUES ('$id_seq', '$name', '$dtime') " ;
		$result1 = mysql_query($query1) ;
		$result2 = mysql_query($query2) ;	
	}
	else
	{
		$total = "SELECT * FROM audience" ;
		$result = mysql_query($total) ;
		while ($result_row = mysql_fetch_row(($result)))
			$id_seq += 1 ;
		$query1 = "INSERT INTO account(account_id, password, type, type_id) VALUES ('$acc', '$pw', '$type', '$id_seq') " ;
		$query2 = "INSERT INTO audience(id, name, phone) VALUES ('$id_seq', '$name', '$phone') " ;
		$result1 = mysql_query($query1) ;
		$result2 = mysql_query($query2) ;	
	}
	$check = "SELECT * FROM account WHERE account_id = '$acc' AND password = '$pw' " ;
	$success = mysql_query($check) ; 
	if ($result_rowc = mysql_fetch_row(($success)))
		echo 'regist success' ;
?>