<?php session_start() ;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>玩樂生活</title>
	<link rel="stylesheet" href="stylesheet/reset.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="stylesheet/style.css" type="text/css" media="screen" charset="utf-8">
	
</head>

<body>
<div id="pack">
	<div id="header">
		<img src="images/green.png" width="69" height="66" class="note" />
  		<p>玩樂生活</p>
	</div>
    <div id ="logstat">
		<ul>
        	<?php 
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
				$accountid = $_SESSION['account'];
				$name = "SELECT audience.name
						 FROM `account` , `audience` 
						 WHERE `account_id` = '$accountid' AND 
						 	   `audience`.`id` = `account`.`type_id`;";
				$name_r = mysql_query($name);
				$name_r_row = mysql_fetch_row($name_r);
				
			?>
    		<h1><?php echo $name_r_row[0] ?>，你好!</h1>
        	<li><a href="logout.php">登出</a></li>
    	</ul>
	</div>
</div>

<div class="nav">
	<ul>
    	<li><a href="index.php">首頁</a></li>
        <li><a href="">我的最愛</a></li>
        <li><a href="search.php">搜尋</a></li>
    </ul>
	</div>
<div class="apDiv4">

