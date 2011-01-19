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
	echo "</div><div class='indextable'>" ;
	echo "<table>" ;
	echo "<tr>
			<th class = 'head'>歌曲名稱</td>
			<th class = 'head'>歌曲風格</td>
			<th class = 'head'>敘述</td>
			<th class = 'head'>表演者</td>
			<th class = 'head'>分數</td>
		 </tr>" ;
	if ($id != NULL) {
	echo "<form method = 'post' action='modifys1.php?id=$id'>" ;
	for ($i = 0 ; $id[$i] != NULL ; $i++)
	{
		$display1 = "SELECT * FROM `song` WHERE id = '$id[$i]'" ;
		$display2 = mysql_query($display1) ;
		if ($display2)
			$display = mysql_fetch_row($display2) ;
		$style1 = "SELECT name FROM showstyle WHERE id = $display[2]" ;
		$style2 = mysql_query($style1) ;
		if ($style2)
			$style = mysql_fetch_row($style2) ;
		$art1 = "SELECT name FROM artist WHERE id = $display[4]" ;
		$art2 = mysql_query($art1) ;
		if ($art2)
			$art = mysql_fetch_row($art2) ;
		echo "<tr>
				<td>$display[1]</td>
				<td>$display[3]</td>
				<td>$style[0]</td>
				<td>$art[0]</td>";
		echo "<td><select name='grade'>
				<option value =5>★★★★★
				<option value =4>★★★★☆
				<option value =3>★★★☆☆
				<option value =2>★★☆☆☆
				<option value =1>★☆☆☆☆			
				</select></td></tr>" ;
		}
	echo "<tr><td colspan = '4'></td><td  style='text-align:center'><input name='submit' type = 'submit' value = '送出'></td></tr>" ;}
	echo "</form></table>" ;
?>
<?php require_once "include/foot.php"; ?>