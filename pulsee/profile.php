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
// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch user details
$stmt = $conn->prepare("SELECT name, email, profile_pic FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $email, $profile_pic);
$stmt->fetch();
$stmt->close();

// Fetch user's favorite songs
$stmt = $conn->prepare("
    SELECT s.song_name 
    FROM favorite_songs fs
    JOIN songs s ON fs.song_id = s.song_id
    WHERE fs.user_id = ?
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$favorites = [];
while ($row = $result->fetch_assoc()) {
    $favorites[] = $row['song_name'];
}
$stmt->close();

// Fetch user's playlists and their songs
$playlists = [];
$stmt = $conn->prepare("
    SELECT p.playlist_id, p.playlist_name, s.song_name
    FROM playlists p
    LEFT JOIN playlist_songs ps ON p.playlist_id = ps.playlist_id
    LEFT JOIN songs s ON ps.song_id = s.song_id
    WHERE p.user_id = ?
    ORDER BY p.playlist_id, s.song_name
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $playlist_id = $row['playlist_id'];
    if (!isset($playlists[$playlist_id])) {
        $playlists[$playlist_id] = [
            'name' => $row['playlist_name'],
            'songs' => []
        ];
    }
    if ($row['song_name']) {
        $playlists[$playlist_id]['songs'][] = $row['song_name'];
    }
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .profile-container { width: 80%; margin: 20px auto; text-align: center; }
        img { width: 150px; height: 150px; border-radius: 50%; }
        .favorites, .playlists { text-align: left; margin: 20px auto; max-width: 600px; }
        .playlists .playlist { margin-bottom: 20px; }
        .playlists .playlist h3 { margin: 0; cursor: pointer; }
        .playlists .playlist ul { list-style-type: none; padding: 0; }
        .playlists .playlist ul li { margin: 5px 0; }
    </style>
    <script>
        function toggleSongs(playlistId) {
            var songsList = document.getElementById('songs-' + playlistId);
            if (songsList.style.display === 'none' || songsList.style.display === '') {
                songsList.style.display = 'block';
            } else {
                songsList.style.display = 'none';
            }
        }
    </script>
</head>
<body>

<div class="profile-container">
    <img src="<?php echo htmlspecialchars($profile_pic); ?>" alt="Profile Picture">
    <h1><?php echo htmlspecialchars($name); ?></h1>
    <p><?php echo htmlspecialchars($email); ?></p>

    <div class="favorites">
        <h2>Favorite Songs</h2>
        <ul>
            <?php foreach ($favorites as $song): ?>
                <li><?php echo htmlspecialchars($song); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="playlists">
        <h2>Playlists</h2>
        <?php foreach ($playlists as $playlist_id => $playlist): ?>
            <div class="playlist">
                <h3 onclick="toggleSongs(<?php echo $playlist_id; ?>)">
                    <?php echo htmlspecialchars($playlist['name']); ?>
                </h3>
                <ul id="songs-<?php echo $playlist_id; ?>" style="display: none;">
                    <?php foreach ($playlist['songs'] as $song): ?>
                        <li><?php echo htmlspecialchars($song); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
