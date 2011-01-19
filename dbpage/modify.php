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
$search = "SELECT * FROM `show` , `showstyle`, `artist`  WHERE `show`.style_id = `showstyle`.id AND artist.id = show.ar_id AND `show`.id = $id ;" ;
	$query = mysql_query($search) ; 
	echo "</div><div class='indextable'>" ;
	echo "<table><form method='post' action='modify1.php?id=$id'" ;
	echo "<tr>
			<th class = 'head'>表演名稱</td>
			<th class = 'head'>日期</td>
			<th class = 'head'>表演風格</td>
			<th class = 'head'>表演者</td>
			<th class = 'head'>分數</td>
			<th class = 'head'></td>
		 </tr>" ;
	$result = 0 ;
	while ($fetch = mysql_fetch_row($query)) 
	{
		$result = 1 ;
		$style1 = "SELECT name FROM showstyle WHERE id = $fetch[5]" ;
		$style2 = mysql_query($style1) ;
		$style = mysql_fetch_row($style2) ;
		echo "<tr>
				<td><a href = 'showinfo.php?id=$fetch[0]'>$fetch[1]</a></td>
				<td>$fetch[2]</td>
				<td>$style[0]</td>
				<td>$fetch[12]</td> ";
		echo "<td><select name='grade'>
				<option value =5>★★★★★
				<option value =4>★★★★☆
				<option value =3>★★★☆☆
				<option value =2>★★☆☆☆
				<option value =1>★☆☆☆☆			
				</select></td>" ;	
		echo "<td><input name = 'submit' type = 'submit' value = '送出'></td></tr>" ;
	}
?>
