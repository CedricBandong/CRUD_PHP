<?php
require 'db.php';
require 'upload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $breed = $_POST['breed'] ?? '';
    $age = $_POST['age'] ?? '';
    $owner = $_POST['owner'] ?? '';
    $photoPath = '';

    // Validate required fields
    if (empty($name) || empty($breed) || empty($age) || empty($owner) || empty($_FILES['photo']['name'])) {
        echo "All fields are required.";
        exit;
    }

    // Upload image
    $photoPath = uploadImage($_FILES['photo']);
    if (!$photoPath) {
        echo "Image upload failed.";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO pets (name, breed, age, owner, photo) VALUES (?, ?, ?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $breed, $age, $owner, $photoPath]);

    header("Location: index.php");
    exit;
}
?>
