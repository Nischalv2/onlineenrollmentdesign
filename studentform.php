<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>Student Information</h1>
    <form name="addstudent" method="POST" action="addstudent.php">
        <div class="form-group">
            <label for="fname">STID</label>
            <input type="text" class="form-control" id="STID" name="STID" required>
        </div>
        <div class="form-group">
            <label for="fname">First name:</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
        </div>
        <div class="form-group">
            <label for="lname">Last name:</label>
            <input type="text" class="form-control" id="lname" name="lname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="Email" name="Email" required>
        </div>
        <div class="form-group">
            <label for="Address">Address:</label>
            <input type="text" class="form-control" id="Address" name="Address" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

