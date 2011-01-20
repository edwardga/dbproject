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
	$id = $_POST['id'] ;
	echo "</div><div class='indextable'>" ;
	echo "<table>" ;
	echo "<tr>
			<th class = 'head'>表演名稱</td>
			<th class = 'head'>日期</td>
			<th class = 'head'>時間</td>
			<th class = 'head'>地點</td>
			<th class = 'head'>售票系統</td>
			<th class = 'head'>表演風格</td>
			<th class = 'head'>表演者</td>
			<th class = 'head'>分數</td>
		 </tr>" ;
	if ($id != NULL) {
	echo "<form method = 'post' action='addfavorite2.php'>" ;
	for ($i = 0 ; $id[$i] != NULL ; $i++)
	{
		$display1 = "SELECT * FROM `show` WHERE id = '$id[$i]'" ;
		$display2 = mysql_query($display1) ;
		if ($display2)
			$display = mysql_fetch_row($display2) ;
		$loc1 = "SELECT name FROM location WHERE id = $display[4]" ;
		$loc2 = mysql_query($loc1) ;
		if ($loc2)
			$loc = mysql_fetch_row($loc2) ;
		$style1 = "SELECT name FROM showstyle WHERE id = $display[5]" ;
		$style2 = mysql_query($style1) ;
		if ($style2)
			$style = mysql_fetch_row($style2) ;
		$sell1 = "SELECT name FROM sellsystem WHERE id = $display[6]" ;
		$sell2 = mysql_query($sell1) ;
		if ($sell2)
			$sell = mysql_fetch_row($sell2) ;
		$art1 = "SELECT name FROM artist WHERE id = $display[7]" ;
		$art2 = mysql_query($art1) ;
		if ($art2)
			$art = mysql_fetch_row($art2) ;
		echo "<tr><td>$display[1]</td><td>$display[2]</td><td>$display[3]</td><td>$loc[0]</td><td>$sell[0]</td><td>$style[0]</td><td>$art[0]</td>";
		echo "<td><select name='grade[$i]'>
				<option value =5>★★★★★
				<option value =4>★★★★☆
				<option value =3>★★★☆☆
				<option value =2>★★☆☆☆
				<option value =1>★☆☆☆☆			
				</select></td></tr>" ;
		echo "<input name = 'id[$i]' type = 'hidden' value = '$id[$i]'>" ;
	}
	echo "<tr><td colspan = '7'></td><td  style='text-align:center'><input name='submit' type = 'submit' value = '送出'></td></tr>" ;}
	else
		echo "<tr><td style = 'text-align:center' colspan = '8' >您並未選擇任何表演</td>" ;
	echo "</form></table>" ; }
?>
<?php require_once "include/foot.php"; ?>