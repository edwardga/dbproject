<?php require_once "include/auth.php"?>
<?php 
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
	$name = $_GET['name'] ;
	$date1 = $_GET['date1'] ;
	if ($date1 == NULL)
		$date1 = "'0000-00-00'" ;
	else 
		$date1 = "'".$date1."'" ;
	$date2 = $_GET['date2'] ;
	if ($date2 == NULL)
		$date2 = "'9999-99-99'" ;
	else 
		$date2 = "'".$date2."'" ;
	$style = $_GET['style'] ;
	$search = "SELECT * FROM `show` , `showstyle`  WHERE `show`.style_id = `showstyle`.id AND show.name LIKE '%$name%' AND day > $date1 AND day < $date2 AND showstyle.name LIKE '%$style%' ;" ;
	$query = mysql_query($search) ; 
	echo "</div><div class='indextable'>" ;
	echo "<table>" ;
	echo "<tr>
			<td class = 'head'>表演名稱</td>
			<td class = 'head'>日期</td>
			<td class = 'head'>時間</td>
			<td class = 'head'>地點</td>
			<td class = 'head'>售票系統</td>
			<td class = 'head'>表演風格</td>
			<td class = 'head'>選取</td>
		 </tr>" ;
	$result = 0 ;
	echo "<form method = 'post' action = 'addfavorite.php'>" ;
	while ($fetch = mysql_fetch_row($query)) 
	{
		$result = 1 ;
		$loc1 = "SELECT name FROM location WHERE id = $fetch[4]" ;
		$loc2 = mysql_query($loc1) ;
		$loc = mysql_fetch_row($loc2) ;
		$sell1 = "SELECT name FROM sellsystem WHERE id = $fetch[6]" ;
		$sell2 = mysql_query($sell1) ;
		$sell = mysql_fetch_row($sell2) ;
		$style1 = "SELECT name FROM showstyle WHERE id = $fetch[5]" ;
		$style2 = mysql_query($style1) ;
		$style = mysql_fetch_row($style2) ;
		echo "<tr><td>$fetch[1]</td><td>$fetch[2]</td><td>$fetch[3]</td><td>$loc[0]</td><td>$sell[0]</td><td>$style[0]</td>" ;
		echo "<td style='text-align:center'><input type=checkbox name='id[]' value= '$fetch[0]'></td></tr>" ;		
	}

	if($result == 0)
		echo "<tr><td colspan='7' style='text-align:center'>無法找到與目標相符的表演</td></tr>" ;
	else
		echo "<tr><td colspan='5' style='text-align:center'>找到以上表演</td><td colspan='2' style='text-align:center'><input type='submit' name = 'submit' value = '加入我的最愛'></td></tr>" ;	
	echo "</form>" ;
	echo "</table>" ;
?>