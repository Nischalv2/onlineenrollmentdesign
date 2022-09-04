<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "online_enrollment_design";

    
    $id = $_POST["MID"];
    $name = $_POST["Name"];
    $credit = $_POST["Credit"];
    $level = $_POST["Level"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){echo '<script>alert("Welcome ")</script>';
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "INSERT INTO module VALUES (?,?,?,?)";
        if ($stmt = $conn->prepare($sql)){
            $stmt->bind_param("ssii",$id ,$name,$credit,$level);
            if ($stmt->execute()) {
                echo "New record created successfully";
                header('Location: modulepage.php');
            } else {
                echo "Error: ";
            }  
        }else
        {
            echo "Error while creating new record";
        }
        $conn->close();
    } 

