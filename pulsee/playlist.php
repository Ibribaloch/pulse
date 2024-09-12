<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";  // Change this if your database username is different
$password = "";      // Add your MySQL password if required
$dbname = "pulse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
// Get playlist ID from URL
if (!isset($_GET['playlist_id'])) {
    die("No playlist ID provided.");
}

$playlist_id = intval($_GET['playlist_id']);

// Fetch playlist details
$stmt = $conn->prepare("SELECT playlist_name FROM playlists WHERE playlist_id = ?");
$stmt->bind_param("i", $playlist_id);
$stmt->execute();
$stmt->bind_result($playlist_name);
$stmt->fetch();
$stmt->close();

// Fetch songs in the playlist
$stmt = $conn->prepare("
    SELECT s.song_name
    FROM playlist_songs ps
    JOIN songs s ON ps.song_id = s.song_id
    WHERE ps.playlist_id = ?
");
$stmt->bind_param("i", $playlist_id);
$stmt->execute();
$result = $stmt->get_result();
$songs = [];
while ($row = $result->fetch_assoc()) {
    $songs[] = $row['song_name'];
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($playlist_name); ?></title>
    <style>
        body { font-family: Arial, sans-serif; }
        .playlist-container { width: 80%; margin: 20px auto; }
        .playlist-container h1 { text-align: center; }
        .songs { margin-top: 20px; }
    </style>
</head>
<body>

<div class="playlist-container">
    <h1><?php echo htmlspecialchars($playlist_name); ?></h1>

    <div class="songs">
        <h2>Songs</h2>
        <ul>
            <?php foreach ($songs as $song): ?>
                <li><?php echo htmlspecialchars($song); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

</body>
</html>
