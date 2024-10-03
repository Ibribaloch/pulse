<?php
$playlist_id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM playlists WHERE id = ?");
$stmt->execute([$playlist_id]);
$playlist = $stmt->fetch();

?>
