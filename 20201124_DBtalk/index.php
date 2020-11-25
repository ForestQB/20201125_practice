<?php

	include("connect.php");//呼叫連結資料庫PHP
	
	$link=Connection();//與DB資料庫連結

	$result=mysql_query("SELECT `Time`,`Account`,`Message` FROM `boarduser` ORDER BY `Time` ASC",$link);
	//將回傳資料暫存取TIME,Account,Message升序排列
?>

<html>
   <head>
      <title>資料庫留言板</title>
   </head>
<body>
   <h1>留言板</h1>

   <table border="1" cellspacing="1" cellpadding="1">
		<tr><!-- 創建一個欄位表格<td>內容</td>,
		&nbsp;半形不換行空格,一般鍵盤space鍵
		&ensp;半形的空格，特性為寬度是 1/2 個中文字寬度
		&emsp;全形的空格，特性係寬度是 1 個中文字寬度
		 -->
			<td>&nbsp;Timestamp&nbsp;</td>
			<td>&nbsp;帳號&nbsp;</td>
			<td>&nbsp;訊息&nbsp;</td>
		</tr>
		
      <?php 
		  if($result!==FALSE)
		  {
			 while($row = mysql_fetch_array($result)) 
			 {
		        printf(
					"<tr>
					<td> &nbsp;%s </td>
					<td> &nbsp;%s&nbsp; </td>
					<td> &nbsp;%s&nbsp; </td>
					</tr>", 
		           $row["Time"], $row["Account"], $row["Message"]);
			 }
			 //如果有資料則用迴圈插入表格資料
		     mysql_free_result($result);
			 mysql_close($link);
		  }
      ?>
   </table>
   <form method="post" action="upmessage.php">
			Please input your name：
		<input type="text" name="Account" size="10"><br>
			I say：
		<input type="text" name="Message" size="10"><br>
		<input type="submit" value="傳送訊息">
	</form>
	<!-- <form method="post" action="2.php"> -->
	<form>
		<input type="submit" value="查看完整聊天內容">
	</form>
	<!-- <form method="post" action="2.php">
		<input type="submit" value="刪除資料">
	</form> -->
	<form method="post" action="serch.php">
			查詢哪一位使用者之訊息：
			<input type="text" name="Serch" size="10"><br>
		<input type="submit" value="查詢">
	</form>

</body>
</html>
