<?php
	include_once('include/auth.php') ;
	if(auth()=="artist")
	{
		require_once "include/header_logged_artist.php";
		//echo "<h1>您沒有使用此頁面的權力</h1>" ;
	}
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
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
</div>
<div class = 'indextable'>
<table>
<tr>
	<th class='head'>歌曲名稱</td>
    <th class='head'>歌曲風格</td>
    <th class='head'>分數</td>
    <th class='head'>表演者</td>
</tr>
<?php
	$display = "SELECT * FROM `myfavsong` WHERE account_id ='$_SESSION[account]'" ;
	$display2 = mysql_query($display) ;
	$temp = 0;
	while ($result = mysql_fetch_row($display2))
	{
		$temp = 1;
		$song1 = "SELECT * FROM `song` WHERE id='$result[2]'";
		$song2 = mysql_query($song1) ;
		if ($song2)
			$song = mysql_fetch_row($song2) ;
		$style1 = "SELECT name FROM showstyle WHERE id = $song[2]" ;
		$style2 = mysql_query($style1) ;
		if ($style2)
			$style = mysql_fetch_row($style2) ;
		$art1 = "SELECT name FROM artist WHERE id = $song[4]" ;
		$art2 = mysql_query($art1) ;
		if ($art2)
			$art = mysql_fetch_row($art2) ;
		echo "<tr>
				<td>$song[1]</a></td>
				<td>$style[0]</td><td>" ;
		if ($result[3]==1)
			echo "★☆☆☆☆" ;
		elseif ($result[3]==2)
			echo "★★☆☆☆" ;
		elseif ($result[3]==3)
			echo "★★★☆☆" ;
		elseif ($result[3]==4)
			echo "★★★★☆" ;
		elseif ($result[3]==5)
			echo "★★★★★" ;
		echo	"</td><td>$art[0]</td></tr>" ;
		}
	if ($temp == 0)
		echo "<td colspan='8' style='text-align:center'>您沒有將歌曲加入我的最愛中" ;
?>
</table>
</div>
<?php require_once "include/foot.php"; ?>
</body>
</html>