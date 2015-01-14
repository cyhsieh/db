<?php

header("Content-Type: text/html; charset = utf-8");

include("mysql.inc.php");

if ($_GET['edit'] != '')
{
	$sql = "SELECT * FROM smallqq WHERE 記事編號 = '{$_GET['edit']}'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
}

else
{
	header("Location: smallQQmain.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title>修改記事</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</head>

<script>
$(function() {
    $("#form input").keypress(function(event){      
        if (event.keyCode == 13) $("#form").submit();
    });
});
</script>

<body>

	<form id = "form" method = "post" action = "QQupdate.php">
		日期：<input name = "time" value = "<?php echo $row['日期時間']; ?>"><br>
		項目：<input name = "item" value = "<?php echo $row['項目']; ?>"> <br>
		金額：<input name = "amount" value = "<?php echo $row['金額']; ?>"> <br>
		備註：<input name = "note" value = "<?php echo $row['備註']; ?>"> <br>
		<input name = "id" type = "hidden" value = "<?php echo $row['記事編號'];?>">
		<input name = "cancel" type = "button" value = "放棄" onclick = "location.href='smallQQmain.php'">
		<input name = "submit" type = "submit" value = "修改">
	</form>

</body>
</html>