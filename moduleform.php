<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>Module Information</h1>
    <form name="addmodule" method="POST" action="addmodule.php">
        <div class="form-group">
            <label for="fname">MID</label>
            <input type="text" class="form-control" id="MID" name="MID" required>
        </div>
        <div class="form-group">
            <label for="fname">Name:</label>
            <input type="text" class="form-control" id="Name" name="Name" required>
        </div>
        <div class="form-group">
            <label for="lname">Credit:</label>
            <input type="text" class="form-control" id="Credit" name="Credit" required>
        </div>
        <div class="form-group">
            <label for="email">Level:</label>
            <input type="text" class="form-control" id="Level" name="Level" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

