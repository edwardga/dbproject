<?php
	session_start() ;
	$db_host = 'localhost' ;
	$db_database = 'DBproject' ;
	$db_username = 'root' ;
	$connection = mysql_connect($db_host, $db_username, '');
	if (!$connection)
		die ("connection failed".mysql_error()) ;
	$selection = mysql_select_db($db_database) ;
	if (!$selection)
		die ("selection failed".mysql_error()) ;
	$acc = $_POST[account_id] ;
	$pw = md5($_POST[password]) ;
	$query = "SELECT * FROM account
	          WHERE account_id='$acc' AND password ='$pw';";
	$result = mysql_query($query) ;
	if ($result_row = mysql_fetch_row(($result)))
	{
		$_SESSION['account'] = $acc ;
		header ("Location:temp.php") ;
	}
	else
        header ("Location:login1.php?fail=1") ;
?>