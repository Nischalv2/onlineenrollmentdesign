<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "online_enrollment_design";
$id = $_REQUEST["STID"];
$name = $_REQUEST["Name"];
$lname = $_REQUEST["Lastname"];
$email = $_REQUEST["Email"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
$sql = "UPDATE student SET Name=?, LastName=?, Email=? WHERE STID=?";
if ($stmt = $conn->prepare($sql))
$stmt->bind_param("sssi", $name, $lname, $email, $id);
else
{
$error = $conn->errno . ' ' . $conn->error;
echo $error;
}
$stmt->execute();
$conn->close();
//header("Location:PHPJavaScript.php");