<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "online_enrollment_design";

    
    $id = $_POST["LID"];
    $name = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["Email"];
    $address = $_POST["Address"];
    $salary = $_POST["Salary"];
    $qualification = $_POST["Qualification"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){echo '<script>alert("Welcome ")</script>';
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "INSERT INTO lecturer VALUES (?, ?,?, ?, ?, ?,?)";
        if ($stmt = $conn->prepare($sql)){
            $stmt->bind_param("issssss",$id , $name, $lname, $email, $address, $salary, $qualification);
            if ($stmt->execute()) {
                echo "New record created successfully";
                header('Location: lecturerpage.php');
            } else {
                echo "Error: ";
            }  
        }else
        {
            echo "Error while creating new record";
        }
        $conn->close();
    } 

