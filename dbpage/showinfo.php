<?php require_once "include/auth.php"?>
<?php 
	if(auth()=="artist")
		require_once "include/header_logged_artist.php";
	elseif(auth()=="audience")
		require_once "include/header_logged_aud.php";
	else
		require_once "include/header_index.php";
	mysql_query("SET NAMES 'utf8'");
	$id = $_GET["id"];
 	$show1 = "SELECT * FROM `show` WHERE id = '$id' ; " ;
	$show2 = mysql_query($show1) ;
	if ($show2)
		$show = mysql_fetch_row($show2) ;
?>
</div>
        <div class = "indextable">
        <table>
    		<tr>
            <th colspan="2" class="head"><?php echo $show[1]; ?></th>
        </tr>
        <tr>
        	<td>表演日期</td>
            <td><?php echo $show[2]; ?></td>
        </tr>
        <tr>
        	<td>表演時間</td>
            <td><?php echo $show[3]; ?></td>
        </tr>
        <tr>
        	<td>表演風格</td>
            <td><?php
				$newStyle_r = mysql_query("SELECT `name` FROM `showstyle` WHERE `id` = '$show[5]';");
				$newStyle_r_row = mysql_fetch_row($newStyle_r);
				echo $newStyle_r_row[0];
			?></td>
        </tr>
        <tr>
        	<td>表演地點</td>
            <td><?php 
				$newlocat_r = mysql_query("SELECT `name` FROM `location` WHERE `id` = '$show[4]';");
				$newlocat_r_row = mysql_fetch_row($newlocat_r);
				echo $newlocat_r_row[0];
			?></td>
        </tr>
        <tr>
        	<td>售票系統</td>
            <td><?php
            	$newSystem_r = mysql_query("SELECT `name` FROM `sellsystem` WHERE `id` = '$show[6]';");
				$newSystem_r_row = mysql_fetch_row($newSystem_r);
				echo $newSystem_r_row[0];
            ?></td>
        </tr>
        <tr>
        	<td>表演者</td>
            <td><?php
            	$newArt_r = mysql_query("SELECT `name` FROM `artist` WHERE `id` = '$show[7]';");
				$newArt_r_row = mysql_fetch_row($newArt_r);
				echo $newArt_r_row[0];
            ?></td>
        </tr>
        <tr>
        	<td>使用樂器</td>
            <td><?php
            	$newInst ="SELECT `in_id` FROM `show_instrument` WHERE `s_id` = '$show[0]';" ;
				$newInst_r = mysql_query($newInst);
				while ($newInst_r_row = mysql_fetch_row($newInst_r)){
				$inst = "SELECT name FROM `instrument` WHERE id = '$newInst_r_row[0]';" ;
				$inst2 = mysql_query($inst) ;
				$inst_r = mysql_fetch_row($inst2) ;
				echo $inst_r[0]. ' ' ;
			  }
            ?></td>
        </tr>
        </tr>
        </table>