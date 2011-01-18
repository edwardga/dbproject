<?php
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
	echo $search ;
	$query = mysql_query($search) ; 
	echo "<table border = 1>" ;
	echo "<tr><td>表演名稱</td><td>日期</td><td>時間</td><td>地點</td><td>表演風格</td><td>售票系統</td></tr>" ;
	do 
	{
		if($fetch[0]== NULL)
			echo "<tr><td colspan='6' align = 'center'>無法找到與目標相符的表演</td></tr>" ;
		else
		{

			$loc1 = "SELECT name FROM location WHERE id = $fetch[4]" ;
			$loc2 = mysql_query($loc1) ;
			$loc = mysql_fetch_row($loc2) ;
			$sell1 = "SELECT name FROM sellsystem WHERE id = $fetch[6]" ;
			$sell2 = mysql_query($sell1) ;
			$sell = mysql_fetch_row($sell2) ;
			$style1 = "SELECT name FROM showstyle WHERE id = $fetch[5]" ;
			$style2 = mysql_query($style1) ;
			$style = mysql_fetch_row($style2) ;
			echo "<tr><td>$fetch[1]</td><td>$fetch[2]</td><td>$fetch[3]</td><td>$loc[0]</td><td>$sell[0]</td><td>$style[0]</td></tr>" ;		
		}

	}while ($fetch = mysql_fetch_row($query)) ;
		echo "</table>" ;
?>