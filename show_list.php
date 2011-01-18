<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
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
        	<td>表演名稱</td>
            <td>表演者</td>
            <td>日期</td>
            <td>地點</td>
            <td>售票系統</td>
        </tr>
        <?php
			$show = "SELECT show.name, show.day, location.name, sellsystem.name  
					 FROM `show`, `location`, `sellsystem`
					 WHERE show.l_id=location.id AND show.sell_id=sellsystem.id
					 ORDER BY show.day DESC;" ;
			$show_result = mysql_query($show);
			while ($result_row = mysql_fetch_row(($show_result)))
			{
//				if($result_row[1]>=$currday){
					echo "<tr>" ;
					echo "<td>".$result_row[0]."</td>" ;
					echo "<td></td>";
					echo "<td>".$result_row[1]."</td>" ;
					echo "<td>".$result_row[2]."</td>" ;
					echo "<td>".$result_row[3]."</td>" ;
					echo "</tr>";
//				}
			}
		?>
        <tr>
        	<td></td>
        </tr>
    </table>
</body>

</html>