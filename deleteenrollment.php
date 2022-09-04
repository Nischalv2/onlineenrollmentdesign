<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "online_enrollment_design";
$mid = $_REQUEST["MID"];
$block = $_REQUEST["Block"];
$stid = $_REQUEST["STID"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
$sql = "DELETE FROM enrollment WHERE MID=? AND Block=? AND STID=?";
if ($stmt = $conn->prepare($sql))
$stmt->bind_param("sii", $mid, $block, $stid);
else
{
$error = $conn->errno . ' ' . $conn->error;
echo $error;
}
$stmt->execute();
$conn->close();
//header("Location:PHPJavaScript.php");