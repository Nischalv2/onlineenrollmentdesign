<?php


$servername = "us-cdbr-east-06.cleardb.net";
$username = "b8088fe756207e";
$password = "248eb91b";
$dbname = "heroku_f75c68dec6849f1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
else
echo "Successfully Connection to the database!";

?>
