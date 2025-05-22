<!DOCTYPE html>
<html>
<head>
    <title>Add New Pet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Add New Pet</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Breed</label>
            <input type="text" name="breed" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="number" name="age" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Owner</label>
            <input type="text" name="owner" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Pet</button>
    </form>
</div>
</body>
</html>
