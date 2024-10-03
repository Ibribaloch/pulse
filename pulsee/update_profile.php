<?php
include('config.php'); 

session_start();
$user_id = $_SESSION['user_id']; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'images/users/'; 
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); 
        }

        $profile_pic = $upload_dir . basename($_FILES['profile_pic']['name']);

        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profile_pic)) {
            $query = "UPDATE users SET name = ?, description = ?, profile_pic = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssi", $name, $description, $profile_pic, $user_id);
        } else {
            echo "Error uploading the file.";
            exit;
        }
    } else {
        $query = "UPDATE users SET name = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $name, $description, $user_id);
    }

    if ($stmt->execute()) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
