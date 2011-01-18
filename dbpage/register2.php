<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php require_once "include/header_unlog.php"; ?>

	<div class="regulartable">
    	<table>
            <tr>
            	<th colspan='2'><h1>
					<?php
					 	if (isset($_GET["empty"]))
							echo '所有欄位皆需填入資料！' ;	
						if (isset($_GET["fail"]))
							echo '密碼不符' ;
						if (isset($_GET["err"]))
							echo '帳號已被使用，請使用其他帳號' ; ?></h1></th>
			</tr>
         <form method = 'post' action = 'register3.php'>
    <?php 
		$switch = $_GET["type"] ;
		if ($switch == "artist")
		{
			echo "
        	<tr>
            	<th colspan='2' class='head'>註冊　－　表演者</th>
			</tr>
        	<tr>
            	<td class='left'>帳號</td>
                <td class='right'><input type='text' size='20' name='account_id'/></td>
            </tr>
            <tr>
            	<td class='left'>密碼</td>
                <td class='right'><input type='password' size='20' name='password'/></td>
            </tr>
            <tr>
            	<td class='left'>確認密碼</td>
                <td class='right'><input type='password' size='20' name='cpw'/></td>
            </tr>
            <tr>
            	<td class='left'>表演者名稱</td>
                <td class='right'><input type='text' size='20' name='name'/></td>
            </tr>
            <tr>
            	<td class='left'>出道年份</td>
                <td class='right'><input type='year' size='20' name='debut_time'/></td>
			"
		; }
		else
		{
			echo "
        	<tr>
            	<th colspan='2' class='head'>註冊　－　觀眾</th>
			</tr>
        	<tr>
            	<td class='left'>帳號</td>
                <td class='right'><input type='text' size='20' name='account_id'/></td>
            </tr>
            <tr>
            	<td class='left'>密碼</td>
                <td class='right'><input type='password' size='20' name='password'/></td>
            </tr>
            <tr>
            	<td class='left'>確認密碼</td>
                <td class='right'><input type='password' size='20' name='cpw'/></td>
            </tr>
            <tr>
            	<td class='left'>觀眾名稱</td>
                <td class='right'><input type='text' size='20' name='name'/></td>
            </tr>
            <tr>
            	<td class='left'>電話</td>
                <td class='right'><input type='text' size='20' name='phone'/></td>
				
			"
		; }
			echo "<input name = 'type' type = 'hidden' value = '$switch'>" ;
?>
            <tr>
            	<th colspan='2' class="foot"><input name="submit" type="submit" value="確認"/></th>
            </tr>
            </form>
        </table>
	</div>
<?php require_once "include/foot.php"; ?>
</body>
</html>