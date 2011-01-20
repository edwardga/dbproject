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
	$find1 = "SELECT * FROM song WHERE id = '$id'" ;
	$find2 = mysql_query($find1) ;
	$find = mysql_fetch_row($find2) ;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
</div>
	<div class = "indextable">
    <table>
    		<tr>
            <th colspan="2" class="head"><?php echo $find[1]; ?></th>
        </tr>
        <tr>
        	<td>歌曲風格</td>
            <td><?php
				$newStyle_r = mysql_query("SELECT `name` FROM `showstyle` WHERE `id` = '$find[2]';");
				$newStyle_r_row = mysql_fetch_row($newStyle_r);
				echo "<a href='styleinfo.php?id=$find[2]'>".$newStyle_r_row[0]."</a>";
			?></td>
        </tr>     
        <tr>
        	<td>表演者</td>
            <td><?php
            	$newArt_r = mysql_query("SELECT `name` FROM `artist` WHERE `id` = '$find[4]';");
				$newArt_r_row = mysql_fetch_row($newArt_r);
				echo "<a href='artinfo.php?id=$find[4]'>".$newArt_r_row[0]."</a>" ;				
            ?></td>
        </tr>
        <tr>
        	<td>內容</td>
            <td><?php echo $find[3]; ?></td>
        </tr>
                </tr>      
        </table>
</div>
<?php require_once "include/foot.php"; ?>
</body>
</html>