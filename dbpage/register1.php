<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php require_once "include/header_unlog.php"; ?>
	<div class="regulartable">
    	<table>
        	<tr>
            	<th colspan='2' class="head">註冊</th>
			</tr>
        	<tr>
            	<form method = "get" action = "register2.php">
            	<td class="left">帳戶類型</td>
                <td class="right"><select name="type"><option value ="artist">表演者<option value ="audience">觀眾</select></td>
            </tr>
            <tr>
            	<th colspan='2' class="foot"><input name="submit" type="submit" value="確認"/></th>
                </form>
            </tr>
        </table>
	</div>
<?php require_once "include/foot.php"; ?>
</body>
</html>