<?php
	include_once('include/auth.php') ;
	$auth = auth() ;
	if ($auth == NULL)
		echo "您沒有使用此頁面的權力" ;
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
我的最愛
<table border = 1>
<tr><td>表演名稱</td><td>日期</td><td>時間</td><td>地點</td><td>表演風格</td><td>售票系統</td><td>分數</td><</tr>
<?php
	$display = "SELECT * FROM `myfavorite` WHERE account_id ='$_SESSION[account]'" ;
	$display2 = mysql_query($display) ;
	while ($result = mysql_fetch_row($display2))
	{
		$show1 = "SELECT * FROM `show` WHERE id='$result[2]'";
		$show2 = mysql_query($show1) ;
		$show = mysql_fetch_row($show2) ;
		$loc1 = "SELECT name FROM location WHERE id = $show[4]" ;
		$loc2 = mysql_query($loc1) ;
		$loc = mysql_fetch_row($loc2) ;
		$style1 = "SELECT name FROM showstyle WHERE id = $show[5]" ;
		$style2 = mysql_query($style1) ;
		$style = mysql_fetch_row($style2) ;
		$sell1 = "SELECT name FROM sellsystem WHERE id = $show[6]" ;
		$sell2 = mysql_query($sell1) ;
		$sell = mysql_fetch_row($sell2) ;
		echo "<tr><td>$show[1]</td><td>$show[2]</td><td>$show[3]</td><td>$loc[0]</td><td>$style[0]</td><td>$sell[0]</td><td>$result[3]</td></tr>" ;
	}
?>
</table>
</body>
</html>