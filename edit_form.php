<?php
require 'db.php';

$id = $_GET['id'] ?? '';
if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM pets WHERE id = ?");
    $stmt->execute([$id]);
    $pet = $stmt->fetch();
} else {
    echo "Invalid ID.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Pet</h2>
    <form action="edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $pet['id'] ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($pet['name']) ?>" required>
        </div>
        <div class="form-group">
            <label>Breed</label>
            <input type="text" name="breed" class="form-control" value="<?= htmlspecialchars($pet['breed']) ?>" required>
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="number" name="age" class="form-control" value="<?= htmlspecialchars($pet['age']) ?>" required>
        </
::contentReference[oaicite:0]{index=0}
 
