<?php
require 'db.php';
require 'upload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $breed = $_POST['breed'] ?? '';
    $age = $_POST['age'] ?? '';
    $owner = $_POST['owner'] ?? '';

    if (empty($id) || empty($name) || empty($breed) || empty($age) || empty($owner)) {
        echo "All fields are required.";
        exit;
    }

    // Fetch existing photo path
    $stmt = $pdo->prepare("SELECT photo FROM pets WHERE id = ?");
    $stmt->execute([$id]);
    $pet = $stmt->fetch();
    $photoPath = $pet['photo'];

    // If new photo uploaded
    if (!empty($_FILES['photo']['name'])) {
        $newPhotoPath = uploadImage($_FILES['photo']);
        if ($newPhotoPath) {
            // Delete old photo
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
            $photoPath = $newPhotoPath;
        } else {
            echo "Image upload failed.";
            exit;
        }
    }

    // Update database
    $sql = "UPDATE pets SET name = ?, breed = ?, age = ?, owner = ?, photo = ? WHERE id = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $breed, $age, $owner, $photoPath, $id]);

    header("Location: index.php");
    exit;
}
?>
