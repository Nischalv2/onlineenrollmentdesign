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
    $sql = "SELECT * FROM student WHERE STID = ? OR Name = ? OR LastName = ?" ;
    $stmt = $conn->prepare($sql);
    $search = $_POST['search'];
    $stmt->bind_param("iss", $search, $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
}else{
    $sql = "SELECT * FROM student" ;
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
<HTML>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h1>Student Information</h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin:24px 0;">
        <div class="collapse navbar-collapse" id="navb">
            <form class="form-inline my-2 my-lg-0" method="POST">
                <input class="form-control mr-sm-2" type="text" placeholder="ID/Name/LAST Name" name="search">
                <button class="btn btn-success my-2 my-sm-0" type="Submit">Search</button>
            </form>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="studentpage.php">Refresh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="studentform.php">Add Student</a>
                </li>
            </ul> 
        </div>
    </nav>
    <div class=" col-sm-10">
    <table id="student_table" class="table">
        <thead class="thead-dark">   
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email </th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
    </div>
<script language="JavaScript">
    var result = <?php echo json_encode($rows); ?>;
    let table = document.getElementById("student_table");
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
        cell1.innerHTML = "<div contenteditable='false'>"+result[i].STID+" </div>";
        cell2.innerHTML = "<div contenteditable='true'>"+result[i].Name+" </div>";
        cell3.innerHTML = "<div contenteditable='true'>"+result[i].LastName+" </div>";
        cell4.innerHTML = "<div contenteditable='true'>"+result[i].email+" </div>";

        var x = document.createElement("button");//Creating the button
        x.setAttribute("id", "deletst-"+i);
        x.setAttribute("style", "width:100%");
        x.className="btn" ;
        x.innerHTML = '<span class="fa fa-trash"></span>';
        x.onclick = function() {delete_student(table,this);}
        cell6.appendChild(x); //Appending the button to the end of the
        //list

        var z = document.createElement("button");
        z.setAttribute("id", "applyeditst-"+i);
        z.setAttribute("style", "width:100%");
        z.className="btn" ;
        z.innerHTML = '<span class="fa fa-pencil"></span>';
        z.onclick = function() {edit_student(table,this);}
        cell5.appendChild(z);
    }

    function delete_student(table, element){
        let row = element.parentElement.parentElement;
        let STID = row.cells[0].innerText;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                table.deleteRow(row.rowIndex); // Record has been successfully
                //deleted
            }
        };
        xmlhttp.open("GET", "deletestudent.php?STID="+ STID, true);
        xmlhttp.send();
    }
    function edit_student(table,element){
        let row = element.parentElement.parentElement;
        let STID = row.cells[0].innerText;
        let Name = row.cells[1].innerText;
        let Lastname = row.cells[2].innerText;
        let Email = row.cells[3].innerText;
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET", "editstudent.php?STID="+STID + "&Name=" + Name + "&Lastname=" + Lastname + "&Email=" + Email, true);
        xmlhttp.send();
    }
</script>
</HTML>