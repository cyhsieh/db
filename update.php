<?php

include("mysql.inc.php");
$mytable = "maincost";

if  (!empty($_POST['item']) && !empty($_POST['amount']))
{
	$time = $_POST['time'];
	$item = $_POST['item'];
	$amount = $_POST['amount'];
	$note = $_POST['note'];
	$id = $_POST['id'];
	
	$stmt = mysqli_prepare($conn,"UPDATE $mytable SET 日期時間=?, 項目=?, 金額=?, 備註=? WHERE 記事編號 = $id");
	mysqli_stmt_bind_param($stmt,'ssis',$time,$item,$amount,$note);
	mysqli_stmt_execute($stmt);
	
	// $sql = "UPDATE $mytable SET 日期時間 = '{$time}', 項目 = '{$item}', 金額 = '{$amount}',備註 = '{$note}' WHERE 記事編號 = $id";
	// mysqli_query($conn,$sql);
	
	// if (mysqli_affected_rows($conn) > 0)
		// header("Location: main.php");
	
}
header("Location: main.php");
?>