<?php
include('config.php'); // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo 'User not logged in.';
    exit();
}

$user_id = $_SESSION['user_id']; // Get the logged-in user ID

// Fetch liked songs for the logged-in user (limit to 5)
$stmt = $conn->prepare("
    SELECT songs.song_id, songs.song_name, songs.image_path
    FROM liked_songs
    JOIN songs ON liked_songs.song_id = songs.song_id
    WHERE liked_songs.user_id = ?
    LIMIT 5
");
$stmt->bind_param("i", $user_id); // Bind the parameter
$stmt->execute();
$result = $stmt->get_result();
$liked_songs = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!-- Your existing section -->
<div class="row">
    <?php foreach ($liked_songs as $song): ?>
        <div class="col-xs-12">
            <div class="item r" data-id="item-<?= $song['song_id'] ?>" data-src="http://api.soundcloud.com/tracks/<?= $song['song_id'] ?>/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                <div class="item-media">
                    <a href="track.detail.php?id=<?= $song['song_id'] ?>" class="item-media-content" style="background-image: url('<?= htmlspecialchars($song['image_path']) ?>')">
                    </a>
                </div>
                <div class="item-info">
                    <div class="item-title text-ellipsis">
                        <a href="track.detail.php?id=<?= $song['song_id'] ?>">
                            <?= htmlspecialchars($song['song_name']) ?>
                        </a>
                    </div>
                    <div class="item-author text-sm text-ellipsis">
                        <a href="artist.detail.php?id=<?= $song['song_id'] ?>" class="text-muted">Artist Name</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Message if no liked songs found -->
<?php if (empty($liked_songs)): ?>
    <p>No liked songs found for this user.</p>
<?php endif; ?>
