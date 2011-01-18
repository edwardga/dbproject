<?php
	session_start() ;
	$db_host = 'localhost' ;
	$db_database = 'dbproject' ;
	$db_username = 'root' ;
	$connection = mysql_connect($db_host, $db_username, '');
	if (!$connection)
		die ("connection failed".mysql_error()) ;
	$selection = mysql_select_db($db_database) ;
	if (!$selection)
		die ("selection failed".mysql_error()) ;
	function auth ()
	{
		if (!$_SESSION['account'])
			return 0 ;
		else
		{
			$query = "SELECT type FROM account WHERE account_id = '$_SESSION[account]';" ;
			$result = mysql_query($query) ;
			$fetch = mysql_fetch_row($result) ;
			return $fetch[0] ;
		}
	}
?>