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
	if (auth()!=NULL)
	{
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
	<th class='head'>表演名稱</td>
    <th class='head'>日期</td>
    <th class='head'>表演風格</td>
    <th class='head'>分數</td>
    <th class='head'>表演者</td>
    <th class='head'></td>
    <th class='head'></td>
</tr>
<?php
	$display = "SELECT * FROM `myfavorite` WHERE account_id ='$_SESSION[account]'" ;
	$display2 = mysql_query($display) ;
	$temp = 0;

		
	while ($result = mysql_fetch_row($display2))
	{
		$temp = 1;
		$show1 = "SELECT * FROM `show` WHERE id='$result[2]'";
		$show2 = mysql_query($show1) ;
		if ($show2)
			$show = mysql_fetch_row($show2) ;
		$loc1 = "SELECT name FROM location WHERE id = $show[4]" ;
		$loc2 = mysql_query($loc1) ;
		if ($loc2)
			$loc = mysql_fetch_row($loc2) ;
		$style1 = "SELECT name FROM showstyle WHERE id = $show[5]" ;
		$style2 = mysql_query($style1) ;
		if ($style2)
			$style = mysql_fetch_row($style2) ;
		$sell1 = "SELECT name FROM sellsystem WHERE id = $show[6]" ;
		$sell2 = mysql_query($sell1) ;
		if ($sell2)
			$sell = mysql_fetch_row($sell2) ;
		$art1 = "SELECT name FROM artist WHERE id = $show[7]" ;
		$art2 = mysql_query($art1) ;
		if ($art2)
			$art = mysql_fetch_row($art2) ;
		echo "<tr>
				<td><a href='showinfo.php?id=$show[0]'>$show[1]</a></td>
				<td>$show[2]</td>
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
		echo	"</td><td>$art[0]</td>" ;
		echo "<td><a href='modify.php?id=$show[0]'>修改分數</a></td>" ;
		echo "<td><a href='delete.php?id=$show[0]'>刪除</a></td></tr>" ;
	}
	if ($temp == 0)
		echo "<td colspan='8' style='text-align:center'>您沒有將表演加入我的最愛中" ;}
?>
</table>
</div>
<?php require_once "include/foot.php"; ?>
</body>
</html>