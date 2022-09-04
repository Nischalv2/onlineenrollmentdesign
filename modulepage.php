<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_enrollment_design";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
else
// echo "Successfully Connection to the database!";*/

$servername = "us-cdbr-east-06.cleardb.net";
$username = "b8088fe756207e";
$password = "248eb91b";
$dbname = "heroku_f75c68dec6849f1";

if(isset($_POST['search'])){//check search value is set or not
    $sql = "SELECT * FROM module WHERE MID = ? OR Name = ? OR Credit = ? OR Level=?" ;
    $stmt = $conn->prepare($sql);
    $search = $_POST['search'];
    $stmt->bind_param("ssii", $search, $search, $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
}else{
    $sql = "SELECT * FROM module" ;
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
                    <a class="nav-link active" href="modulepage.php">Module</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="enrollmentpage.php">Enrollment</a>
                </li>
            </nav>
            </ul>

            <!-- Tab panes -->

            <div class="tab-content border mb-3">
    <h1>Module Information</h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin:24px 0;">
        <div class="collapse navbar-collapse" id="navb">
            <form class="form-inline my-2 my-lg-0" method="POST">
                <input class="form-control mr-sm-2" type="text" placeholder="ID/Name/Level " name="search">
                <button class="btn btn-success my-2 my-sm-0" type="Submit">Search</button>
            </form>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="modulepage.php">Refresh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="moduleform.php">Add Module</a>
                </li>
            </ul> 
        </div>
    </nav>
    <div class=" col-sm-12">
    <table id="module_table" class="table">
        <thead class="thead-dark">   
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Credit</th>
                <th>Level</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
    </div>
<script language="JavaScript">
    var result = <?php echo json_encode($rows); ?>;
    let table = document.getElementById("module_table");
    let nrow = table.rows.length; //Number of rows in the table (1 at
    //the beginning)
    for(i=0; i < result.length; i++){
        table.insertRow(nrow);
        let row = table.rows[nrow];
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);
        let cell4 = row.insertCell(3);
        let cell5 = row.insertCell(4);
        let cell6 = row.insertCell(5);
        cell1.innerHTML = "<div contenteditable='false'>"+result[i].MID+" </div>";
        cell2.innerHTML = "<div contenteditable='true'>"+result[i].Name+" </div>";
        cell3.innerHTML = "<div contenteditable='true'>"+result[i].Credit+" </div>";
        cell4.innerHTML = "<div contenteditable='true'>"+result[i].Level+" </div>";
    
        var z = document.createElement("button");
        z.setAttribute("id", "applyeditst-"+i);
        z.setAttribute("style", "width:100%");
        z.className="btn" ;
        z.innerHTML = '<span class="fa fa-pencil"></span>';
        z.onclick = function() {edit_module(table,this);}
        cell5.appendChild(z);
        
        var x = document.createElement("button");//Creating the button
        x.setAttribute("id", "deletst-"+i);
        x.setAttribute("style", "width:100%");
        x.className="btn" ;
        x.innerHTML = '<span class="fa fa-trash"></span>';
        x.onclick = function() {delete_module(table,this);}
        cell6.appendChild(x); //Appending the button to the end of the
        //list

        
    }

    function delete_module(table, element){
        let row = element.parentElement.parentElement;
        let MID = row.cells[0].innerText;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                table.deleteRow(row.rowIndex); // Record has been successfully
                //deleted
            }
        };
        xmlhttp.open("GET", "deletemodule.php?MID="+ MID, true);
        xmlhttp.send();
    }
    function edit_module(table,element){
        let row = element.parentElement.parentElement;
        let MID = row.cells[0].innerText;
        let Name = row.cells[1].innerText;
        let Credit = row.cells[2].innerText;
        let Level = row.cells[3].innerText;
        
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET", "editmodule.php?MID="+MID + "&Name=" + Name + "&Credit=" + Credit + "&Level=" + Level, true);
        xmlhttp.send();
    }
</script>
</HTML>