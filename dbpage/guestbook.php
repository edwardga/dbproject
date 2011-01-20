<?php require_once "include/auth.php"?>
<?php 
	include_once('include/auth.php') ;
	if(auth()==NULL)
	{
		require_once "include/header_index.php";
		echo "<h1>您沒有使用此頁面的權力</h1>" ;
	}
	else
	{
		if(auth()=="audience")
			require_once "include/header_logged_aud.php";
		elseif (auth()=="artist")
			require_once "include/header_logged_artist.php";
	mysql_query("SET NAMES 'utf8'");
?>
</div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<div class="indextable">
<table>
	<form method="post" action="message.php">
	<tr>
    	<td style="border-top-left-radius:10px">標題</td>
        <td style="padding-left:20px; border-top-right-radius:10px"><input name = 'title' type = 'text'></td>
    </tr>
    <tr>
    	<td>內容</td>
        <td><textarea name = 'content' cols="40" rows="5" style="resize:none"></textarea></td>
    </tr>
    <th colspan="2" class="foot"><input name = 'submit' type = 'submit' value = '送出'></th>
    </form>
</table>
</div>
<div id="showmes">
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
</div>
</body>
</html>
<?php } require_once "include/foot.php"; ?>

