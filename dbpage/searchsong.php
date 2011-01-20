<?php 
	include_once('include/auth.php') ;
	if(auth()==NULL)
	{
		require_once "include/header_index.php";
		echo "<h1>您沒有使用此頁面的權力</h1>" ;
	}
	else
	{
		if(auth()=="audience")
			require_once "include/header_logged_aud.php";
		elseif (auth()=="artist")
			require_once "include/header_logged_artist.php";
?>
	</div>
	<div class='indextable'>
	<form method = 'get' action = 'searchsong1.php'>
	<table>
	<th colspan='2' class='head'>搜尋</th>
		<tr>
			<td>歌曲名稱</td><td><input name = 'name' type = 'text'></td>
	    </tr>
	    	<td>風格</td><td><input name = 'style' type = 'text'></td>
	    </tr>
        <tr>
		    <td>表演者</td><td><input name = 'artist' type = 'text'></td>
	    </tr>
	<th colspan='2' class='foot'><input type='submit' name = 'search' value = '搜尋' ></th>
	</table>
	</form>
	
<?php } require_once "include/foot.php"; ?>