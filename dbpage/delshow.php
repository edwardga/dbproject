<?php
	include_once('include/auth.php') ;
	if(auth()=="artist")
		require_once "include/header_logged_artist.php";
	elseif(auth()=="audience")
		require_once "include/header_logged_aud.php";
	else
	{
		require_once "include/header_index.php";
		echo "<h1>您沒有使用此頁面的權力</h1>" ;
	}
    $db_host = 'localhost' ;
	$db_database = 'DBproject' ;
	$db_username = 'root' ;
	$connection = mysql_connect($db_host, $db_username, '');
	if (!$connection)
		die ("connection failed".mysql_error()) ;
	$selection = mysql_select_db($db_database) ;
	if (!$selection)
		die ("selection failed".mysql_error()) ; 
	mysql_query("SET NAMES 'utf8'");
	$id = $_GET['id'] ;
	$query = "DELETE FROM `show` WHERE id = $id ;" ;
	$result = mysql_query($query) ;
	$query1 = "DELETE FROM `myfavorite` WHERE s_id = $id ;" ;
	$result1 = mysql_query($query1) ;
	$query2 = "DELETE FROM `comment` WHERE s_id = $id ;" ;
	$result2 = mysql_query($query2) ;
	header ("Location:myshow.php") ;
?>