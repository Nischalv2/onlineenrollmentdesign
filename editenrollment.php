<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "online_enrollment_design";
$mid = $_REQUEST["MID"];
$lid = $_REQUEST["LID"];
$stid = $_REQUEST["STID"];
$block = $_REQUEST["Block"];
$mark = $_REQUEST["Mark"];
$averagemarks = $_REQUEST["Averagemarks"];


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
$sql = "UPDATE enrollment SET Mark=?, Averagemarks=? WHERE MID=? AND LID=? AND STID=? AND Block=?";
if ($stmt = $conn->prepare($sql))
$stmt->bind_param("iisiii", $mark, $averagemarks, $mid, $lid, $stid, $block);
else
{
$error = $conn->errno . ' ' . $conn->error;
echo $error;
}
$stmt->execute();
$conn->close();
//header("Location:PHPJavaScript.php");