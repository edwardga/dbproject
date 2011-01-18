<?php require_once "include/auth.php"?>
<?php 
	if(auth()==artist)
		require_once "include/header_logged_artist.php";
	elseif(auth()==audience)
		require_once "include/header_logged_aud.php";
	else
		require_once "include/header_index.php";
?>	
	<?php
		$currday = date("Y-m-d");
		
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
    <h1>近期演出資訊</h1>
	<table>
		<tr>
        	<td class="head">表演名稱</td>
            <td class="head">表演者</td>
            <td class="head">表演日期</td>
            <td class="head">表演地點</td>
            <td class="head">售票系統</td>
        </tr>
		<?php
			$show = "SELECT show.name, show.day, location.name, sellsystem.name  
					 FROM `show`, `location`, `sellsystem`
					 WHERE show.l_id=location.id AND show.sell_id=sellsystem.id
					 ORDER BY show.day ;" ;
			$show_result = mysql_query($show);
			$i=1;
			while ($i<=8 && $result_row = mysql_fetch_row($show_result) )
			{
				if($result_row[1]>=$currday){
					echo "<tr>" ;
					echo "<td>".$result_row[0]."</td>" ;
					echo "<td></td>";
					echo "<td>".$result_row[1]."</td>" ;
					echo "<td>".$result_row[2]."</td>" ;
					echo "<td>".$result_row[3]."</td>" ;
					echo "</tr>";
					$i = $i + 1;
				}
			}
		?>

    </table>
<?php require_once "include/foot.php"; ?>
