<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "online_enrollment_design";
$id = $_REQUEST["LID"];
$name = $_REQUEST["Name"];
$lname = $_REQUEST["Lastname"];
$email = $_REQUEST["Email"];
$address = $_REQUEST["Address"];
$salary = $_REQUEST["Salary"];
$qualification = $_REQUEST["Qualification"];


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
$sql = "UPDATE lecturer SET Name=?, Lastname=?, email=?, address=?, salary=?, qualification=? WHERE LID=?";
if ($stmt = $conn->prepare($sql))
$stmt->bind_param("ssssssi", $name, $lname, $email, $address, $salary, $qualification, $id);
else
{
$error = $conn->errno . ' ' . $conn->error;
echo $error;
}
$stmt->execute();
$conn->close();
//header("Location:PHPJavaScript.php");