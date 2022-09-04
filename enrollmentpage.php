<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_enrollment_design";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
else
// echo "Successfully Connection to the database!";

if(isset($_POST['search'])){//check search value is set or not
    $sql = "SELECT module.name mname, lecturer.name lname, student.name sname, block, mark, averagemarks, module.mid, lecturer.lid, student.stid
    FROM enrollment 
    JOIN module on enrollment.mid = module.mid
    JOIN lecturer on enrollment.lid = lecturer.lid
    JOIN student on enrollment.stid = student.stid WHERE module.MID = ? OR student.STID=?" ;
    $stmt = $conn->prepare($sql);
    $search = $_POST['search'];
    $stmt->bind_param("si", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
}else{
    $sql = "SELECT module.name mname, lecturer.name lname, student.name sname, block, mark, averagemarks, module.mid, lecturer.lid, student.stid
    FROM enrollment 
    JOIN module on enrollment.mid = module.mid
    JOIN lecturer on enrollment.lid = lecturer.lid
    JOIN student on enrollment.stid = student.stid" ;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
}
$i = 0;
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$rows[$i] = $row;
$i++;
}
}else{
    echo "No Record Found!!";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container mt-3">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="mainpage.php">Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lecturerpage.php">Lecturer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="modulepage.php">Module</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="enrollmentpage.php">Enrollment</a>
                </li>
            </nav>
            </ul>

            <!-- Tab panes -->

            <div class="tab-content border mb-3">
    <h1>Enrollment Information</h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin:24px 0;">
        <div class="collapse navbar-collapse" id="navb">
            <form class="form-inline my-2 my-lg-0" method="POST">
                <input class="form-control mr-sm-2" type="text" placeholder="SID/MID " name="search">
                <button class="btn btn-success my-2 my-sm-0" type="Submit">Search</button>
            </form>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="enrollmentpage.php">Refresh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="enrollmentform.php">Add Enrollment</a>
                </li>
            </ul> 
        </div>
    </nav>
    <div class=" col-sm-12">
    <table id="enrollment_table" class="table">
        <thead class="thead-dark">   
            <tr>
                <th>Module ID</th>
                <th>Module Name</th>
                <th>Lecturer ID</th>
                <th>Lecturer Name</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Block</th>
                <th>Mark</th>
                <th>Average Mark</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
    </div>
<script language="JavaScript">
    var result = <?php echo json_encode($rows); ?>;
    let table = document.getElementById("enrollment_table");
    let nrow = table.rows.length; //Number of rows in the table (1 at
    //the beginning)
    for(i=0; i < result.length; i++){
        table.insertRow(nrow);
        let row = table.rows[nrow];
        let cell1 = row.insertCell(0);//mid
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);//lid
        let cell4 = row.insertCell(3);
        let cell5 = row.insertCell(4);//stid
        let cell6 = row.insertCell(5);
        let cell7 = row.insertCell(6);//block
        let cell8 = row.insertCell(7);//mark
        let cell9 = row.insertCell(8);//averagemarks
        let cell10 = row.insertCell(9);
        let cell11 = row.insertCell(10);
        cell1.innerHTML = "<div contenteditable='false'>"+result[i].mid+" </div>";
        cell2.innerHTML = "<div contenteditable='false'>"+result[i].mname+" </div>";
        cell3.innerHTML = "<div contenteditable='false'>"+result[i].lid+" </div>";
        cell4.innerHTML = "<div contenteditable='false'>"+result[i].lname+" </div>";
        cell5.innerHTML = "<div contenteditable='false'>"+result[i].stid+" </div>";
        cell6.innerHTML = "<div contenteditable='false'>"+result[i].sname+" </div>";
        cell7.innerHTML = "<div contenteditable='false'>"+result[i].block+" </div>";
        cell8.innerHTML = "<div contenteditable='true'>"+result[i].mark+" </div>";
        cell9.innerHTML = "<div contenteditable='true'>"+result[i].averagemarks+" </div>";
    
        var z = document.createElement("button");
        z.setAttribute("id", "applyeditst-"+i);
        z.setAttribute("style", "width:100%");
        z.className="btn" ;
        z.innerHTML = '<span class="fa fa-pencil"></span>';
        z.onclick = function() {edit_enrollment(table,this);}
        cell10.appendChild(z);
        
        var x = document.createElement("button");//Creating the button
        x.setAttribute("id", "deletst-"+i);
        x.setAttribute("style", "width:100%");
        x.className="btn" ;
        x.innerHTML = '<span class="fa fa-trash"></span>';
        x.onclick = function() {delete_enrollment(table,this);}
        cell11.appendChild(x); //Appending the button to the end of the
        //list

        
    }

    function delete_enrollment(table, element){
        let row = element.parentElement.parentElement;
        let MID = row.cells[0].innerText;
        let STID = row.cells[4].innerText;
        let Block = row.cells[6].innerText;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                table.deleteRow(row.rowIndex); // Record has been successfully
                //deleted
            }
        };
        xmlhttp.open("GET", "deleteenrollment.php?MID="+ MID + "&Block=" + Block + "&STID=" + STID, true);
        xmlhttp.send();
    }
    function edit_enrollment(table,element){
        let row = element.parentElement.parentElement;
        let MID = row.cells[0].innerText;
        let LID = row.cells[2].innerText;
        let STID = row.cells[4].innerText;
        let Block = row.cells[6].innerText;
        let Mark = row.cells[7].innerText;
        let Averagemarks = row.cells[8].innerText;

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET", "editenrollment.php?MID="+MID + "&LID=" + LID + "&STID=" + STID + "&Block=" + Block + "&Mark=" + Mark + "&Averagemarks=" + Averagemarks, true);
        xmlhttp.send();
    }
</script>
</HTML>