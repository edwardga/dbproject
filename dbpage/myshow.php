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


	<h1>未來表演</h1>
</div>
<div class="scrolltable">
	<table>
		<tr>
        	<th class="head">表演名稱</td>
            <th class="head">表演日期</td>
            <th class="head">表演地點</td>
            <th class="head">售票系統</td>
            <th class="head"></td>            
        </tr>
        <?php
			$currday = date("Y-m-d");
			$show = "SELECT show.name, show.day, location.name, sellsystem.name, show.id 
					 FROM `show`, `location`, `sellsystem`, `artist`
					 WHERE show.l_id=location.id AND show.sell_id=sellsystem.id AND show.ar_id = artist.id AND artist.id = '$ar_id_r[0]'
				 ORDER BY show.day ;" ;
			$show_result = mysql_query($show);
			$temp1 = 0 ;
			$temp2 = 0 ;
        while ($result_row = mysql_fetch_row($show_result) )
		{
			if($result_row[1]>=$currday){
					$temp1 = 1 ;
					echo "<tr>" ;
					echo "<td><a href='showinfo.php?id=$result_row[4]'>".$result_row[0]."</a></td>" ;
					echo "<td>".$result_row[1]."</td>" ;
					echo "<td>".$result_row[2]."</td>" ;
					echo "<td>".$result_row[3]."</td>" ;
					echo "<td><a href='delshow.php?id=$result_row[4]'>刪除</a></td></tr>" ;
			}
		}
		if ($temp1 == 0)
			echo "<tr><td colspan='5' style='text-align:center'>您並未新增未來表演</td></tr>" 
		?>
        
    </table>
</div>
<div class="apDiv4">
	<h1>過去表演</h1>
</div>
<div class="scrolltable">
    	<table>
		<tr>
        	<th class="head">表演名稱</td>
            <th class="head">表演日期</td>
            <th class="head">表演地點</td>
            <th class="head">售票系統</td>
            <th class="head"></td>
        </tr>
        <?php
			$currday = date("Y-m-d");
			$show = "SELECT show.name, show.day, location.name, sellsystem.name, show.id  
					 FROM `show`, `location`, `sellsystem`, `artist`
					 WHERE show.l_id=location.id AND show.sell_id=sellsystem.id AND show.ar_id = artist.id AND artist.id = '$ar_id_r[0]'
				 ORDER BY show.day ;" ;
			$show_result = mysql_query($show);
		
        while ($result_row = mysql_fetch_row($show_result) )
		{
			if($result_row[1]<$currday){
					$temp2 = 1 ;
					echo "<tr>" ;
					echo "<td><a href='showinfo.php?id=$result_row[4]'>".$result_row[0]."</a></td>" ;
					echo "<td>".$result_row[1]."</td>" ;
					echo "<td>".$result_row[2]."</td>" ;
					echo "<td>".$result_row[3]."</td>" ;
					echo "<td><a href='delshow.php?id=$result_row[4]'>刪除</a></td></tr>" ;
			}
		}
		if ($temp2 == 0)
			echo "<tr><td colspan='5' style='text-align:center'>您並未新增過去表演</td></tr>" 
		?>
        
    </table>
    
    <?php } ?>
<?php require_once "include/foot.php"; ?>
