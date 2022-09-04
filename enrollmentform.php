<?php
//connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_enrollment_design";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);

//student
$ssql = "SELECT * FROM student" ;
$sstmt = $conn->prepare($ssql);
$sstmt->execute();
$sresult = $sstmt->get_result();

//lecturer
$lsql = "SELECT * FROM lecturer" ;
$lstmt = $conn->prepare($lsql);
$lstmt->execute();
$lresult = $lstmt->get_result();

//module
$msql = "SELECT * FROM module" ;
$mstmt = $conn->prepare($msql);
$mstmt->execute();
$mresult = $mstmt->get_result();


?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>Enrollment Information</h1>
    <form name="addlecturer" method="POST" action="addenrollment.php">
        <div class="form-group">
        <label for="MID">Module list (select one):</label>
        <select class="form-control" id="MID" name="MID">
            <?php
            while($row = $mresult->fetch_assoc()) {
            ?>
            <option value=<?php echo $row["MID"]; ?> ><?php echo $row["Name"]; ?></option>    
            <?php }
            ?>
        </select>
        <label for="LID">Lecturer list (select one):</label>
        <select class="form-control" id="LID" name="LID">
            <?php
            while($row = $lresult->fetch_assoc()) {
            ?>
            <option value=<?php echo $row["LID"]; ?> ><?php echo $row["Name"]; ?></option>    
            <?php }
            ?>
        </select>
        <label for="STID">Student list (select one):</label>
        <select class="form-control" id="STID" name="STID">
            <?php
            while($row = $sresult->fetch_assoc()) {
            ?>
            <option value=<?php echo $row["STID"]; ?> ><?php echo $row["Name"]; ?></option>    
            <?php }
            ?>
        </select>
        </div>
        <div class="form-group">
            <label for="Block">Block:</label>
            <input type="text" class="form-control" id="Block" name="Block" required>
        </div>
        <div class="form-group">
            <label for="Mark">Mark:</label>
            <input type="text" class="form-control" id="Mark" name="Mark" required>
        </div>
        <div class="form-group">
            <label for="Averagemarks">Averagemarks:</label>
            <input type="text" class="form-control" id="Averagemarks" name="Averagemarks" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

