<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "online_enrollment_design";
$id = $_REQUEST["MID"];
$name = $_REQUEST["Name"];
$credit = $_REQUEST["Credit"];
$level = $_REQUEST["Level"];



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
$sql = "UPDATE module SET Name=?, Credit=?, Level=? WHERE MID=?";
if ($stmt = $conn->prepare($sql))
$stmt->bind_param("siis", $name, $credit, $level, $id);
else
{
$error = $conn->errno . ' ' . $conn->error;
echo $error;
}
$stmt->execute();
$conn->close();
//header("Location:PHPJavaScript.php");