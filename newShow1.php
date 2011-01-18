<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php
	if (isset($_GET["empty"]))
		echo 'No attribute can be empty!' ;	
		
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
	?>
	<h1>新增表演</h1>
    <form method = 'post' action = 'newShow2.php'>
   		<p>
        	表演名稱:<input type="text" name="name" id="name"  /><br />
            表演日期:<input type="text" name="day" id="day" />(yyyymmdd)<br />
            表演時間:<input type="text" name="stime" id="stime" />(hh:mm)<br />
            地點:<select  name="location" id="location" >
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
			?></select><br />
            表演主要風格:<select name="showstyle" id="showstyle">
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
			?></select><br />
            表演樂器:
            <?php
				$inst = "SELECT id, name 
					     FROM instrument;";
				$inst_result = mysql_query($inst);
				while ($inst_result_row = mysql_fetch_row($inst_result))
				{
					echo "<input type=checkbox name=" .$inst_result_row[1]. " value=" .$inst_result_row[1]. ">";
					echo $inst_result_row[1];
				}
			?><br />
            售票系統:<select name="sellsystem" id="sellsystem">
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
			?></select><br />
            <input type="submit" name="submit" id="submit" value="新增" />
	        <input type="reset" name="Reset" id="reset" value="清除" />
    	</p>
    </form>
	<?php
		
	?>
</body>
</html>