<?php require_once "include/auth.php"?>
<?php 
	if(auth()=="audience"){
		require_once "include/header_logged_aud.php";
		echo "<h1>您沒有使用此頁面的權力</h1>";
	}
	elseif(auth()!="artist"){
		require_once "include/header_index.php";
		echo "<h1>您沒有使用此頁面的權力</h1>";
	}
	else{
		require_once "include/header_logged_artist.php"; 
		
        $s_n = $_POST[name];
		$s_sty = $_POST[showstyle];
		$s_c = $_POST[content];
		if ($s_n == NULL)
			header ("Location:newsong.php?empty=1") ;
		
		else{
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
		$ar_id = mysql_query("SELECT `artist`.`id` FROM `artist`,`account` WHERE `account`.`account_id` ='$accountid' AND `account`.`type_id` = `artist`.`id`;");
		$ar_id_r = mysql_fetch_row($ar_id); 
		$newSong = "INSERT INTO `dbproject`.`song` (`id`, `name`, `style_id`, `content`, `ar_id`) VALUES (NULL, '$s_n', '$s_sty', '$s_c', '$ar_id_r[0]');";
		$newSong_i = mysql_query($newSong) ;

		}?>
		</div>
        <div class = "indextable">
        <table>
    		<th colspan='2' class="head">已新增歌曲</th>
        	<tr>
        	<td>歌曲名稱</td>
            <td><?php echo $s_n; ?></td>
        </tr>
        <tr>
        	<td>歌曲風格</td>
            <td><?php 
				$newStyle_r = mysql_query("SELECT `name` FROM `showstyle` WHERE `id` = '$s_sty';");
				$newStyle_r_row = mysql_fetch_row($newStyle_r);
				echo $newStyle_r_row[0];
			?></td>
        </tr>
        <tr>
        	<td>敘述</td>
            <td><?php echo $s_c; ?></td>
        </tr>
        </table>
        
<?php	} ?>

<?php require_once "include/foot.php"; ?>