<?php require_once "include/header_logged_artist.php"; ?>

</div>
<div class="indextable">
	<table>
    <th colspan="2" class="head">搜尋</th>
	<tr>
		<td>表演名稱</td><td><input name = 'name' type = 'text'></td>
    </tr>
    <tr>
    	<td>日期(YYYY/MM/DD)</td><td><input name = 'date1' type = 'text'></td>
    </tr>
    <tr>
    	<td>至(YYYY/MM/DD)</td><td><input name = 'date2' type = 'text'></td>
    </tr>
    <tr>
	    <td>風格</td><td><input name = 'style' type = 'text'></td>
    </tr>
    <th colspan="2" class="foot"><input type='submit' name = 'search' value = '搜尋' ></th>
	</table>
        

<?php require_once "include/foot.php"; ?>
