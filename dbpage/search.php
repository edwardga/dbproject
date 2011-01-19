<?php
	include_once('include/auth.php') ;
	$auth = auth() ;
	if ($auth == NULL)
		echo "您沒有使用此頁面的權力" ;
	else
	{
		echo"
			<form method = 'get' action = 'search1.php'>
			搜尋
			<table>
				<tr>
					<td>表演名稱</td><td><input name = 'name' type = 'text'></td>
			    </tr>
			    <tr>
			    	<td>日期</td><td><input name = 'date1' type = 'text'>(YYYY-MM-DD)</td>
			    </tr>
			    <tr>
			    	<td>至</td><td><input name = 'date2' type = 'text'>(YYYY-MM-DD)</td>
			    </tr>
			    <tr>
				    <td>風格</td><td><input name = 'style' type = 'text'></td>
			    </tr>
			</table>
			<input type='submit' name = 'search' value = '搜尋' >
			</form>
			" ;
	}
?>