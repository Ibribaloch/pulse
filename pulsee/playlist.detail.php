<?php
// Get the playlist ID
$playlist_id = $_GET['id'];

// Fetch playlist details from the database
$stmt = $pdo->prepare("SELECT * FROM playlists WHERE id = ?");
$stmt->execute([$playlist_id]);
$playlist = $stmt->fetch();

// Show playlist details here (e.g., songs in the playlist)
?>
