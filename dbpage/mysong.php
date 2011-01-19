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
?>


</div>
<div class="indextable">
	<table>
		<tr>
        	<th class="head">歌曲名稱</td>
            <th class="head">歌曲風格</td>
            <th class="head">敘述</td>
            <th class="head"></td>
        </tr>
        <?php
			$song = "SELECT song.name, showstyle.name , song.content ,song.id
					 FROM `song`, `artist`, `showstyle` 
					 WHERE song.ar_id = artist.id AND artist.id = '$ar_id_r[0]' AND song.style_id = showstyle.id 
				 ORDER BY song.id ;" ;
			$song_result = mysql_query($song);
        while ($result_row = mysql_fetch_row($song_result) )
		{
					echo "<tr>" ;
					echo "<td>".$result_row[0]."</td>" ;
					echo "<td>".$result_row[1]."</td>" ;
					echo "<td>".$result_row[2]."</td>" ;
					echo "<td><a href='delsong.php?id=$result_row[3]'>刪除</a></td></tr>" ;
		}
		?>
        
    </table>
</div>
   
    <?php } ?>
<?php require_once "include/foot.php"; ?>
