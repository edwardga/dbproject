<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php
    	$s_n = $_POST[name];
		$s_d = $_POST[day];
		$s_t = $_POST[stime];
		$s_l = $_POST[location];
		$s_sty = $_POST[showstyle];
		$s_sell = $_POST[sellsystem];
				
		$db_host = 'localhost' ;
		$db_database = 'dbproject' ;
		$db_username = 'root' ;	
		
		$connection = mysql_connect($db_host, $db_username, '');
		if (!$connection)
			die ("connection failed".mysql_error()) ;
		$selection = mysql_select_db($db_database) ;
		if (!$selection)
			die ("selection failed".mysql_error()) ;
		mysql_query("SET NAMES 'utf8'");
		
		$newShow = "INSERT INTO `dbproject`.`show` (`id`, `name`, `day`, `time`, `l_id`, `style_id`, `sell_id`) VALUES (NULL, '$s_n', '$s_d', '$s_t', '$s_l', '$s_sty', '$s_sell');";
		$newShow_i = mysql_query($newShow) ;

		$show_id_r = mysql_query("SELECT `id` FROM `show` WHERE `name` = '$s_n' AND `day` = '$s_d' AND `time` = '$s_t' AND `l_id` ='$s_l';");
		$show_id = mysql_fetch_row($show_id_r);
		$inst = "SELECT id, name 
				 FROM instrument;";
		$inst_result = mysql_query($inst);
		while ($inst_result_row = mysql_fetch_row($inst_result)){
			if($_POST[$inst_result_row[1]]!=NULL){
				$newIns = "INSERT INTO `show_instrument` (`in_id`, `s_id`) VALUES ('$show_id[0]', '$inst_result_row[0]');";
				$newIns_i = mysql_query($newIns);
			}
		}
		
        ?>
    <h2>已新增表演</h2>
    <table>
    	<tr>
        	<td>表演名稱</td>
            <td><?php echo $s_n; ?></td>
        </tr>
        <tr>
        	<td>表演日期</td>
            <td><?php echo $s_d; ?></td>
        </tr>
        <tr>
        	<td>表演時間</td>
            <td><?php echo $s_t; ?></td>
        </tr>
        <tr>
        	<td>表演風格</td>
            <td><?php 
				$newStyle_r = mysql_query("SELECT `name` FROM `showstyle` WHERE `id` = '$s_sty';");
				$newStyle_r_row = mysql_fetch_row($newStyle_r);
				echo $newStyle_r_row[0];
			?></td>
        </tr>
        <tr>
        	<td>表演地點</td>
            <td><?php 
				$newlocat_r = mysql_query("SELECT `name` FROM `location` WHERE `id` = '$s_l';");
				$newlocat_r_row = mysql_fetch_row($newlocat_r);
				echo $newlocat_r_row[0];
			?></td>
        </tr>
        <tr>
        	<td>售票系統</td>
            <td><?php
            	$newSystem_r = mysql_query("SELECT `name` FROM `sellsystem` WHERE `id` = '$s_sell';");
				$newSystem_r_row = mysql_fetch_row($newSystem_r);
				echo $newSystem_r_row[0];
            ?></td>
        </tr>
    </table>
    
</body>
</html>
