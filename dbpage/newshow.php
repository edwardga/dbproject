<?php require_once "include/auth.php"?>
<?php 
	if(auth()=="audience"){
		require_once "include/header_logged_aud.php";
		echo "<h1>您沒有使用此頁面的權力</h1>";
	}
	elseif(auth()!="artist"){
		require_once "include/header_index.php";
		echo "<h1>您沒有使用此頁面的權力</h1>";
	}
	else{
		 require_once "include/header_logged_artist.php"; ?>

	<table>
    	<th colspan='2' class="head">新增表演</th>
    	<tr><td class="left">表演名稱</td><td></td></tr>
        <tr><td class="left">表演日期(yyyy/mm/dd)</td><td></td></tr>
        <tr><td class="left">表演時間(hh:mm)</td><td></td></tr>
        <tr><td class="left">表演地點</td><td></td></tr>
        <tr><td class="left">表演主要風格</td><td></td></tr>
        <tr><td class="left">表演樂器</td><td></td></tr>
        <tr><td class="left">售票系統</td><td></td></tr>
        <tr><td class="left">確認</td><td>清除</td></tr>
    </table>
    <?php }?>

<?php require_once "include/foot.php"; ?>