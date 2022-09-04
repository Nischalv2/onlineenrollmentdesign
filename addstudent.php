<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "online_enrollment_design";

    
    $id = $_POST["STID"];
    $name = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["Email"];
    $address = $_POST["Address"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){echo '<script>alert("Welcome ")</script>';
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "INSERT INTO student VALUES (?, ?,?, ?, ?)";
        if ($stmt = $conn->prepare($sql)){
            $stmt->bind_param("issss",$id , $name, $lname, $email, $address);
            if ($stmt->execute()) {
                echo "New record created successfully";
                header('Location: mainpage.php');
            } else {
                echo "Error: ";
            }  
        }else
        {
            echo "Error while creating new record";
        }
        $conn->close();
    } 

