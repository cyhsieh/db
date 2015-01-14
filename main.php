<script type="text/javascript" src="http://www.google.com/jsapi"></script> <script type="text/javascript" language="javascript"> google.load("jquery", "1.3"); </script>

<?php
date_default_timezone_set('ASIA/Taipei');
$mytable = 'maincost';

include ('mysql.inc.php');



if (!empty($_POST['item']) && !empty($_POST['amount']))
{
	$time = $_POST['time'];
	$item = $_POST['item'];
	$amount = $_POST['amount'];
	$note = $_POST['note'];
	
	if (empty($time))
	{
		$time = date('Y-m-d');
	}
	
	$stmt = mysqli_prepare($conn, "INSERT $mytable (日期時間, 項目,金額,備註) VALUES (?,?,?,?)");
	mysqli_stmt_bind_param($stmt, 'ssis', $time,$item,$amount,$note);
	mysqli_stmt_execute($stmt);
	
	// $sql = "INSERT maincost (日期時間, 項目, 金額, 備註) VALUES ($time, $item, $amount, $note)";
	// mysqli_query($conn, $sql);
	
	// if (mysqli_affected_rows($conn) > 0)
	// {
		// echo '新增成功！<br>';
	// }
	// else 
	// {
		// echo '無法新增<br>';
	// }
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!---->
	<link rel = "StyleSheet" type = "text/css" href = "DBTEST.css">
	<title>DB TEST</title>
</head>

<?php
if (!empty($_POST["time"]))
{
	if ($_POST["time"] != "")
		$nowtime = $_POST["time"];
}
else
	$nowtime = date("ymd");
?>

<body onload = "inputForm.time.select()">
	<div id = "top">
	<form name = "inputForm" method = "post" action="<?php $_SERVER["PHP_SELF"] ?>">
    日期：<input name = "time" value = "<?php echo "$nowtime"; ?>"><br>
	項目：<input name = "item"><br>
	金額：<input name = "amount"><br>
	備註：<input name = 'note'>
	<input name = "submit" type = "submit" value = "新增">
	</form>
	</div>
	
<?php

$result = mysqli_query($conn, "SELECT 記事編號,日期時間, 項目, 金額, 備註 FROM maincost");

echo "
<div id = 'mainContent'><div id = 'contentTitle'>Data in table is below...</div>


<table><tr><th>記事編號</th>
					<th>日期時間</th><th>項目</th>
					<th>金額</th><th>備註</th>";

while ($row = mysqli_fetch_array($result)){
// foreach($row = mysqli_fetch_array($result)){
	echo "<tr><td> $row[0] </td><td>$row[1] </td>
						<td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>
						<td><a href = 'delete.php?del={$row['記事編號']}'>刪除</a></td>
						<td><a href = 'edit.php?edit={$row['記事編號']}'>修改</a></td></tr>";
	// echo $row;
	}
echo '</table></div>';

?>

</body>
</html>