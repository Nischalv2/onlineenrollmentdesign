<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "online_enrollment_design";
$id = $_REQUEST["LID"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
$sql = "DELETE FROM lecturer WHERE LID=?";
if ($stmt = $conn->prepare($sql))
$stmt->bind_param("i", $id);
else
{
$error = $conn->errno . ' ' . $conn->error;
echo $error;
}
$stmt->execute();
$conn->close();
//header("Location:PHPJavaScript.php");