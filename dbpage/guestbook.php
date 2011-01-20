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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<table>
<?php
	$display1 = "SELECT * FROM guestbook ORDER BY time DESC" ;
	$display2 = mysql_query($display1) ;
	while ($display = mysql_fetch_row($display2))
	{
		echo "<table>
				<tr>
					<td>標題</td>
					<td>$display[4]</td>
				</tr>
				<tr>
					<td>留言者</td>
					<td>$display[1]</td>
				</tr>
				<tr>
					<td>時間</td>
					<td>$display[2]</td>
				</tr>
				<tr>
					<td>內容</td>
					<td>$display[3]</td>
				</tr>
			</table>" ;
	}
?>
</table>

<table>
	<form method="post" action="message.php">
	<tr>
    	<td>標題</td>
        <td><input name = 'title' type = 'text'></td>
    </tr>
    <tr>
    	<td>內容</td>
        <td><textarea name = 'content' cols="40" rows="5" style="resize:none"></textarea></td>
    </tr>
    <tr>
    	<td></td>
        <td><input name = 'submit' type = 'submit' value = '送出'></td>
    </tr>
    </form>
</table>
</body>
</html>