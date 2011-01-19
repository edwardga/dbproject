<?php require_once "include/auth.php"?>
<?php 
	if(auth()=="artist")
		require_once "include/header_logged_artist.php";
	elseif(auth()=="audience")
		require_once "include/header_logged_aud.php";
	else
		require_once "include/header_index.php";
	mysql_query("SET NAMES 'utf8'");
	$id = $_GET["id"];
	$title = $_POST['title'];
	$post = $_POST['content'] ;
	$query = "INSERT INTO comment(id,account_id,s_id,post,title) VALUES (NULL, '$_SESSION[account]', '$id', '$post', '$title')" ;
	$result = mysql_query($query) ;
	header ("Location:showinfo.php?id=$id") ;
?>