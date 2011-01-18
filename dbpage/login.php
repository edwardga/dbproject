<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php require_once "include/header_unlog.php"; ?>
<div id="pack2">
	<div id="music">
    	<p>Music in your life =)</p>
    </div>
    <div class="login">
    	<table>
			 <tr>
            	<th colspan='2'><h1><?php	if (isset($_GET["fail"]))echo '登入失敗' ;?> </h1></th>
			</tr>
            <tr>
            	<th colspan='2' class="head">登入</th>
			</tr>
        	<tr>
            	<form method = 'post' action = 'login1.php'>
            	<td class="left">帳號</td>
                <td class="right"> <input name = 'account_id' type = 'text' /></td>
            </tr>
            <tr>
            	<td class="left">密碼</td>
            	<td class="right"><input name = 'password' type = 'password' /></td>
            </tr>
            <tr>
            	<td class="left"><input name = 'submit' type = 'submit' /></td>
                </form>
                <td class="right"><a href="signup1.php"/>請點選這裡註冊新帳號</td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>