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
	$style = $_GET['style'] ;
	$artist = $_GET['artist'] ;
	$search = "SELECT * FROM `song` , `showstyle`, `artist`  WHERE `song`.style_id = `showstyle`.id AND song.name LIKE '%$name%' AND showstyle.name LIKE '%$style%' AND artist.id = song.ar_id AND artist.name LIKE '%$artist%' ;" ;
	$query = mysql_query($search) ; 
	echo "</div><div class='indextable'>" ;
	echo "<table>" ;
	echo "<tr>
			<th class = 'head'>歌曲名稱</td>
			<th class = 'head'>歌曲風格</td>
			<th class = 'head'>表演者</td>
			<th class = 'head'>選取</td>
		 </tr>" ;
	$result = 0 ;
	echo "<form method = 'post' action = 'addfavsong.php'>" ;
	while ($fetch = mysql_fetch_row($query)) 
	{
		$result = 1 ;
		echo "<tr>
				<td>$fetch[1]</td>
				<td>$fetch[6]</td>
				<td>$fetch[9]</td>" ;
		echo "<td style='text-align:center'><input type=checkbox name='id[]' value= '$fetch[0]'></td></tr>" ;		
	}

	if($result == 0)
		echo "<tr><td colspan='4' style='text-align:center'>無法找到與目標相符的歌曲</td></tr>" ;
	else
		echo "<tr><td colspan='2' style='text-align:center'>找到以上歌曲</td><td colspan='2' style='text-align:center'><input type='submit' name = 'submit' value = '加入我的最愛'></td></tr>" ;	
	echo "</form>" ;
	echo "</table>" ;
?>