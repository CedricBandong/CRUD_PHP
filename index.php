<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM pets");
$pets = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pets Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Pets Information</h2>
    <a href="create_form.php" class="btn btn-primary mb-3">Add New Pet</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Owner</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($pets as $pet): ?>
            <tr>
                <td><?= htmlspecialchars($pet['name']) ?></td>
                <td><?= htmlspecialchars($pet['breed']) ?></td>
                <td><?= htmlspecialchars($pet['age']) ?></td>
                <td><?= htmlspecialchars($pet['owner']) ?></td>
                <td><img src="<?= htmlspecialchars($pet['photo']) ?>" width="100"></td>
                <td>
                    <a href="edit_form.php?id=<?= $pet['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete.php?id=<?= $pet['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this pet?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
