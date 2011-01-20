<?php
	
	$acc = $_POST["account_id"] ;
	$pw = md5($_POST["password"]) ;
	$cpw = md5($_POST["cpw"]) ;
	$type = $_POST["type"] ;
	$name = $_POST["name"] ;
	$dtime = $_POST["debut_time"] ;
	$phone = $_POST["phone"] ;
	$state = $_POST["statement"];
	$id_seq = 1 ;
	$db_host = 'localhost' ;
	$db_database = 'DBproject' ;
	$db_username = 'root' ;
	$connection = mysql_connect($db_host, $db_username, '');
	mysql_query("SET NAMES 'utf8'");
	if (!$connection)
		die ("connection failed".mysql_error()) ;
	$selection = mysql_select_db($db_database) ;
	if (!$selection)
		die ("selection failed".mysql_error()) ;
	$valid = "SELECT * FROM account WHERE account_id = '$acc';" ;
	$valid2 = mysql_query($valid) ;
	if ($acc == NULL or $pw == NULL or $name == NULL or ($phone == NULL and $dtime == NULL))
		header ("Location:signup2.php?type=$type&empty=1") ;
	elseif ($pw != $cpw)
		header ("Location:signup2.php?type=$type&fail=1") ;
	elseif ($same = mysql_fetch_row($valid2))
		header ("Location:signup2.php?type=$type&err=1") ;
	else{
	if ($type == artist)
	{
		$total = "SELECT * FROM artist" ;
		$result = mysql_query($total) ;
		while ($result_row = mysql_fetch_row(($result)))
			$id_seq += 1 ;
		$query1 = "INSERT INTO account(account_id, password, type, type_id) VALUES ('$acc', '$pw', '$type', '$id_seq') " ;
		$query2 = "INSERT INTO artist(id, name, debut_time, statement) VALUES ('$id_seq', '$name', '$dtime', '$state') " ;
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
	if ($result_rowc = mysql_fetch_row($success))
		header("Location:index.php") ;}
?>