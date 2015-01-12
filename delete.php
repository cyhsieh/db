<?php
// header('Content-Type: text/html; charset = utf-8');


include("mysql.inc.php");

if ($_GET['del'] != '')
{
	$sql = "DELETE FROM maincost WHERE 記事編號  = '{$_GET['del']}'";
	mysqli_query($conn,$sql);
	
	$rowDeleted = mysqli_affected_rows($conn);
		
	if ($rowDeleted > 0)
	{
		echo "刪除成功";
		header("Location: main.php");
	}
	
	else
	{
		echo "刪除失敗";
	}
}
?>

// <p><a href = "main.php">回清單</a></p>
