<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "online_enrollment_design";

    
    $stid = $_POST["STID"];
    $mid = $_POST["MID"];
    $lid = $_POST["LID"];
    $block = $_POST["Block"];
    $mark= $_POST["Mark"];
    $averagemarks= $_POST["Averagemarks"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){echo '<script>alert("Welcome ")</script>';
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "INSERT INTO enrollment VALUES (?, ?,?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)){
            $stmt->bind_param("isiiii",$stid , $mid, $lid, $block, $mark,$averagemarks);
            if ($stmt->execute()) {
                echo "New record created successfully";
                header('Location: enrollmentpage.php');
            } else {
                echo "Error: ";
            }  
        }else
        {
            echo "Error while creating new record";
        }
        $conn->close();
    } 

