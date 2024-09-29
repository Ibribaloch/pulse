<?php

include('config.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if name is provided
if (isset($_POST['name']) && !empty($_POST['name'])) {
    $playlist_name = $_POST['name'];
    $cover_image = 'images/default_playlist_cover.jpg'; // Default cover image
    $created_at = date('Y-m-d H:i:s');

    // Insert playlist into the database
    $sql = "INSERT INTO playlists (user_id, name, cover_image, created_at) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $playlist_name, $cover_image, $created_at);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to create playlist']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Playlist name is required']);
}

$conn->close();
?>
