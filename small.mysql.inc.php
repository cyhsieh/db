<?php
//db setting...

$dbserver = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "daily";

header('content-type: text/html; charset=utf-8');
$conn = @mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);

if (mysqli_connect_errno($conn))
	die("cann't connect to DB server ");

mysqli_set_charset($conn, "utf8");
?>