<?php
//header('content-type: text/html; charset  utf-8');
include("mysql.inc.php");
if (!empty($_POST["item"]) && !empty($_POST["amount"]))
{
	date_default_timezone_set("Asia/Taipei");
	$time = "";
	if (empty($_POST["date"]))
		$time = date("Y-m-d H:i:s");
	
	echo '時間：'.$time;
	$stmt = mysqli_prepare($conn, "INSERT $daily ("日期時間","項目","金額")", VALUES (?,?,?));
	
	mysqli_stmt_bind_parm($stmt, 'sss', $time, $item, $amount);
	
	mysqli_stmt_excute($stmt);
	
	if (mysqli_affected_rows($conn) > 0) {
		echo '已成功新增記事！<br>';
	}
	else {
		echo '無法新增…<br>';
	}
}
else {
	echo '請按上一頁重新輸入<br>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>DB TEST</title>
</head>

<body>
	<form method = "post" action="<?php $_SERVER["PHP_SELF"] ?>">
    日期：<input name = "time">
	項目：<input name = "item">
	金額：<input name = "amount">
	<input name = "submit" type = "submit" value = "新增">
	</form>
	
<?php

$result = mysqli_query($conn, "SELECT * FROM maincost");

echo "<p>Data in table is below...</br>

<table border = 'l'><tr><th>id</th>
					<th>Date</th><th>item</th>
					<th>amount</th><th>note</th>";

while ($row = mysqli_fetch_array($result)){
// foreach($row = mysqli_fetch_array($result)){
	echo "<tr><td> $row[0] </td><td>$row[1] </td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
	// echo $row;
	}
echo '</table>';

?>

</body>
</html>