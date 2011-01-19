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
		mysql_query("SET NAMES 'utf8'"); ?>
        <form method = 'post' action = 'createsong.php'>
        </div>
        <div class = 'indextable'>
       
		<table>
    		<th colspan='2' class="head">新增歌曲 
				<?php if (isset($_GET["empty"]))
					  echo '<h2>(需填入名稱)</h2>' ;	?></th>
    		<tr><td class="left">歌曲名稱</td>
            	<td><input type="text" name="name" id="name"  /></td></tr>
        	<tr><td class="left">歌曲風格</td>
            	<td><select name="showstyle" id="showstyle">
            	<?php
				$sh_style = "SELECT name
							 FROM showstyle;";
				$ss_result = mysql_query($sh_style);
				$i = 1;
				while ($ss_result_row = mysql_fetch_row(($ss_result)))
				{
					echo "<option value=".$i.">" . $ss_result_row[0] ;
					$i = $i + 1;
				}
				?></select></td></tr>
         	<tr>
            	<td class="left">敘述</td>
            	<td><textarea type="text" name="content" cols="50"rows="5" style="resize:none" id="content"></textarea></td></tr>
            </tr>
            <tr>
                <th colspan="2" class="foot"><input type="submit" name="submit" id="submit" value="新增" />
                <input type="reset" name="Reset" id="reset" value="清除" /></td>
            </tr>
    
    	</table>
    <?php }?>

<?php require_once "include/foot.php"; ?>