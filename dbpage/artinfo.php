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
	$find1 = "SELECT * FROM artist WHERE id = '$id'" ;
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
        	<td>出道年份</td>
            <td><?php echo $find[2]; ?></td>
        </tr>
        </table>

        
</body>
</html>
<?php require_once "include/foot.php"; ?>