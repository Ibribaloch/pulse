<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pulse";

// Create a new connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
// Get the user ID from the session
$user_id = $_SESSION['user_id'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment'] ?? ''; 
    $song_id = $_POST['song_id'] ?? ''; 

    if (!empty($comment) && !empty($song_id) && isset($user_id)) {
        $stmt = $con->prepare("INSERT INTO comments (song_id, user_id, comment) VALUES (?, ?, ?)");
        
        if ($stmt) {
            $stmt->bind_param("iis", $song_id, $user_id, $comment);
            if ($stmt->execute()) {
                echo "Comment submitted successfully!";
                header("Location: track.detail.php?song_id=" . $song_id);
                exit();
            } else {
                echo "Error executing statement: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Comment cannot be empty or user ID is not set.";
    }
}

// Close the connection at the end of the script
$conn->close();
?>
