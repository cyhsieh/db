<?php

header("Content-Type: text/html; charset = utf-8");

include("mysql.inc.php");

if ($_GET['edit'] != '')
{

	$sql = "SELECT * FROM maincost WHERE 記事編號 = '{$_GET['edit']}'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);

	// 日期：<input name = "time">
	// 項目：<input name = "item">
	// 金額：<input name = "amount">
	// 備註：<input name = 'note'>
	// <input name = "submit" type = "submit" value = "新增">
	
	// $sql = "UPDATE  WHERE"
}

else
{
	header("Location: main.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title>修改記事</title>
</head>
<body>

	<form method = "post" action = "update.php">
		日期：<input name = "time" value = "<?php echo $row['日期時間']; ?>"><br>
		項目：<input name = "item" value = "<?php echo $row['項目']; ?>"> <br>
		金額：<input name = "amount" value = "<?php echo $row['金額']; ?>"> <br>
		備註：<input name = "note" value = "<?php echo $row['備註']; ?>"> <br>
		<input name = "id" type = "hidden" value = "<?php echo $row['記事編號'];?>">
		<input name = "cancel" type = "button" value = "放棄" onclick = "location.href='main.php'">
		<input name = "submit" type = "submit" value = "修改">
	</form>

</body>
</html>