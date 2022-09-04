<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>Lecturer Information</h1>
    <form name="addlecturer" method="POST" action="addlecturer.php">
        <div class="form-group">
            <label for="fname">LID</label>
            <input type="text" class="form-control" id="LID" name="LID" required>
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
        <div class="form-group">
            <label for="Salary">Salary:</label>
            <input type="text" class="form-control" id="Salary" name="Salary" required>
        </div>
        <div class="form-group">
            <label for="Qualification">Qualification:</label>
            <input type="text" class="form-control" id="Qualification" name="Qualification" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

