<?php
include('config.php'); 

$user_id = $_SESSION['user_id'] ?? null; 

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
        $user_profile_pic = 'images/default_profile_pic.jpg';
    }

    $stmt->close();
} else {
    $user_name = 'Guest';
    $user_profile_pic = 'images/default_profile_pic.jpg'; 
}

if (isset($_GET['song_id'])) {
    $song_id = $_GET['song_id'];

    $check_query = "SELECT * FROM viewed_songs WHERE user_id = ? AND song_id = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("ii", $user_id, $song_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows == 0) {
        $insert_query = "INSERT INTO viewed_songs (user_id, song_id) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("ii", $user_id, $song_id);
        $insert_stmt->execute();
        $insert_stmt->close();
    }

    $check_stmt->close();
} else {
    echo "Error: song_id not found in URL.";
    exit; 
}

?>
