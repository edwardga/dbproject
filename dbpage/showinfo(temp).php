<?php require_once "include/auth.php"?>
<?php 
	if(auth()=="artist")
		require_once "include/header_logged_artist.php";
	elseif(auth()=="audience")
		require_once "include/header_logged_aud.php";
	else
		require_once "include/header_index.php";
	$id = $_GET["id"];
 	$show1 = "SELECT * FROM `show` WHERE id = '$id' ; " ;
	$show2 = mysql_query($show1) ;
	if ($show2)
		$show = mysql_fetch_row($show2) ;
?>
</div>
<div class = "showinfo">
	  <div id="showcomment">
  		<h1>觀眾評論</h1>
        <div id="showcomment2">
<?php
		$find1 = "SELECT * FROM comment WHERE s_id = '$show[0]'";
		$find2 = mysql_query($find2) ;
		while ($fetch = mysql_fetch_row($find2))
		{
		$type = auth() ;
		$name1 = "SELECT name FROM account, '$type' WHERE account.account_id = $_SESSION AND account.type = '' AND account.type_id=$type.id" ;
		echo $name1 ;
		echo"<table>
            <tr>
            	<td width='30%'>標題</td>
            	<td>$fetch[4]</td>
            </tr>
            <tr>
            	<td width='30%'>稱呼</td>
            	<td></td>
            </tr>
            <tr>
            	<td width='30%'>內容</td>
            	<td>我真的覺得多利多姿好好吃喔！！！天阿～～～真的超好吃的拉～～我一下就吃完兩包了。</td>
            </tr>
        </table>
		}" ;
		}
?>
       </div>
  </div>
	<div class="showinfo2">
        <table>
    		<tr>
            <th colspan="2" class="head"><?php echo $show[1]; ?></th>
        </tr>
        <tr>
        	<td>表演日期</td>
            <td><?php echo $show[2]; ?></td>
        </tr>
        <tr>
        	<td>表演時間</td>
            <td><?php echo $show[3]; ?></td>
        </tr>
        <tr>
        	<td>表演風格</td>
            <td><?php
				$newStyle_r = mysql_query("SELECT `name` FROM `showstyle` WHERE `id` = '$show[5]';");
				$newStyle_r_row = mysql_fetch_row($newStyle_r);
				echo $newStyle_r_row[0];
			?></td>
        </tr>
        <tr>
        	<td>表演地點</td>
            <td><?php 
				$newlocat_r = mysql_query("SELECT `name` FROM `location` WHERE `id` = '$show[4]';");
				$newlocat_r_row = mysql_fetch_row($newlocat_r);
				echo $newlocat_r_row[0];
			?></td>
        </tr>
        <tr>
        	<td>售票系統</td>
            <td><?php
            	$newSystem_r = mysql_query("SELECT `name` FROM `sellsystem` WHERE `id` = '$show[6]';");
				$newSystem_r_row = mysql_fetch_row($newSystem_r);
				echo $newSystem_r_row[0];
            ?></td>
        </tr>
        <tr>
        	<td>表演者</td>
            <td><?php
            	$newSystem_r = mysql_query("SELECT `name` FROM `artist` WHERE `id` = '$show[7]';");
				$newSystem_r_row = mysql_fetch_row($newSystem_r);
				echo $newSystem_r_row[0];
            ?></td>
        </tr>
        </tr>
        </table>
  </div>
  <div id="comment">
  		<table>
        <form method="post" action="write.php"> ;
        	<th colspan="2" class="head">評論</th>
            <tr>
            	<td class="left">標題</td>
                <td class="right"><input name = 'title' type = 'text' /></td>
            </tr>
            <tr>
            	<td class="left">內容</td>
            	<td  class="right"><textarea name = 'content' cols="40" rows="5" style="resize:none"></textarea></td>
            </tr>
            <th colspan="2" class="foot"><input type = 'submit' name = 'submit' value = '送出' /></th>
        </form>
        </table>        
  </div>

<?php require_once "include/foot.php"; ?>