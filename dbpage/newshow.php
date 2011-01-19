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
        <form method = 'post' action = 'createshow.php'>
        </div>
        <div class = 'indextable'>
		<table>
    		<th colspan='2' class="head">新增表演</th>
    		<tr><td class="left">表演名稱</td>
            	<td><input type="text" name="name" id="name"  /></td></tr>
        	<tr><td class="left">表演日期(yyyy/mm/dd)</td>
            	<td><input type="text" name="day" id="day" />(yyyymmdd)</td></tr>
        	<tr><td class="left">表演時間(hh:mm)</td>
            	<td><input type="text" name="stime" id="stime" />(hh:mm)</td></tr>
        	<tr><td class="left">表演地點</td>
            	<td><select  name="location" id="location" >
            	<?php
				$locate = "SELECT name  
						FROM location;" ;
				$l_result = mysql_query($locate);
				$i = 1;
				while ($result_row = mysql_fetch_row(($l_result)))
				{
					echo "<option value=".$i."> " . $result_row[0] ;
					$i = $i + 1;
				}
				?></select></td></tr>
        	<tr><td class="left">表演主要風格</td>
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
        	<tr><td class="left">表演樂器</td>
            	<td><?php
					$inst = "SELECT id, name 
					     	FROM instrument;";
					$inst_result = mysql_query($inst);
					while ($inst_result_row = mysql_fetch_row($inst_result))
					{
						echo "<input type=checkbox name=" .$inst_result_row[1]. " value=" 
								.$inst_result_row[1]. ">";
						echo $inst_result_row[1];
					}
				?></td></tr>
        	<tr><td class="left">售票系統</td>
            	<td><select name="sellsystem" id="sellsystem">
            		<?php
					$s_sys = "SELECT name
						  	From sellsystem;";
					$s_sys_r = mysql_query($s_sys);
					$i=1;
					while ($s_sys_r_row = mysql_fetch_row(($s_sys_r)))
					{
						echo "<option value=".$i.">".$s_sys_r_row[0];
						$i = $i + 1;
					}
					?></select></td></tr>
        	<tr>
            	<td class="left"></td>
                <td><input type="submit" name="submit" id="submit" value="新增" />
                <input type="reset" name="Reset" id="reset" value="清除" /></td>
            </tr>
    
    	</table>
    <?php }?>

<?php require_once "include/foot.php"; ?>