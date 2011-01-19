<?php
	include_once('include/auth.php') ;
	if(auth()=="artist")
		require_once "include/header_logged_artist.php";
	elseif(auth()=="audience")
		require_once "include/header_logged_aud.php";
	else
		require_once "include/header_index.php";
	$db_host = 'localhost' ;
	$db_database = 'dbproject' ;
	$db_username = 'root' ;
	$connection = mysql_connect($db_host, $db_username, '');
	if (!$connection)
		die ("connection failed".mysql_error()) ;
	$selection = mysql_select_db($db_database) ;
	if (!$selection)
		die ("selection failed".mysql_error()) ;
	mysql_query("SET NAMES 'utf8';") ;
	$id = $_POST['id'] ;
	$grade = $_POST['grade'] ;
	for ($i = 0 ; $id[$i] != NULL ; $i++)
	{
		$check1 = "SELECT id FROM myfavorite WHERE account_id = '$_SESSION[account]' AND s_id = '$id[$i]' ;" ;
		$check2 = mysql_query($check1) ;
		$check = mysql_fetch_row($check2) ;
		if ($check[0] == NULL )
		{
			$add1 = "INSERT INTO myfavorite(id, account_id, s_id, score) VALUES (NULL,'$_SESSION[account]','$id[$i]','$grade[$i]') ;" ;
			$add2 = mysql_query($add1) ;
		}
	}
	header ("Location:myfavorite.php") ;
?>