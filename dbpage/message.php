<?php require_once "include/auth.php"?>
<?php 
	if(auth()=="artist")
		require_once "include/header_logged_artist.php";
	elseif(auth()=="audience")
		require_once "include/header_logged_aud.php";
	else
		require_once "include/header_index.php";
	mysql_query("SET NAMES 'utf8'");
?>
<?php
	$id = $_SESSION['account'] ;
	$title = $_POST['title'] ;
	$content = $_POST['content'] ;
	$timestamp = time()+ 8*60*60 ;
	$time = date("Y-m-d H:i:s", $timestamp) ;
	$insert = "INSERT INTO guestbook(id,account_id, time, content, title)
	           VALUES (NULL, '$id', '$time', '$content', '$title'); " ;
    $result = mysql_query ($insert);
	header ("Location:guestbook.php") ;
?>