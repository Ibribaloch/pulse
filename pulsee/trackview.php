<?php
// Include the necessary configuration or session start code here
include('config.php'); // Example

// Fetch user info
$user_id = $_SESSION['user_id'] ?? null; // Ensure user_id exists in session

// Check if user is logged in
if ($user_id) {
    $sql = "SELECT name, profile_pic FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_name = $row['name'];
        $user_profile_pic = $row['profile_pic'];
    } else {
        $user_name = 'Guest';
        $user_profile_pic = 'images/default_profile_pic.jpg'; // Default profile picture
    }

    $stmt->close();
} else {
    // Handle cases where the user is not logged in
    $user_name = 'Guest';
    $user_profile_pic = 'images/default_profile_pic.jpg'; // Default profile picture
}

// Get the song_id from the query string (validate it exists)
if (isset($_GET['song_id'])) {
    $song_id = $_GET['song_id'];

    // Check if the song has already been viewed by this user
    $check_query = "SELECT * FROM viewed_songs WHERE user_id = ? AND song_id = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("ii", $user_id, $song_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows == 0) {
        // If not viewed yet, insert into the viewed_songs table
        $insert_query = "INSERT INTO viewed_songs (user_id, song_id) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("ii", $user_id, $song_id);
        $insert_stmt->execute();
        $insert_stmt->close();
    }

    $check_stmt->close();
} else {
    // If song_id is not present, handle the error (optional)
    echo "Error: song_id not found in URL.";
    exit; // Stop execution if the song_id is missing
}

?>
