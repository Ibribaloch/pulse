<?php
include('config.php'); // Include your database configuration

// Start the session to access the logged-in user's ID
session_start();
$user_id = $_SESSION['user_id']; // Assuming the user ID is stored in the session

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Check if a profile picture is uploaded
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
        // Handle file upload
        $upload_dir = 'images/users/'; // Make sure this directory exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Create the directory if it doesn't exist
        }

        $profile_pic = $upload_dir . basename($_FILES['profile_pic']['name']);

        // Move the uploaded file to the server's directory
        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profile_pic)) {
            // Update the profile picture in the database
            $query = "UPDATE users SET name = ?, description = ?, profile_pic = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssi", $name, $description, $profile_pic, $user_id);
        } else {
            echo "Error uploading the file.";
            exit;
        }
    } else {
        // If no profile picture is uploaded, update the rest of the fields only
        $query = "UPDATE users SET name = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $name, $description, $user_id);
    }

    // Execute the query and check for errors
    if ($stmt->execute()) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
