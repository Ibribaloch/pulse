<?php
include('config.php'); // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo 'User not logged in.';
    exit();
}

$user_id = $_SESSION['user_id']; // Get the logged-in user ID

// Fetch liked songs for the logged-in user
$stmt = $conn->prepare("
    SELECT songs.song_id, songs.song_name, songs.image_path
    FROM liked_songs
    JOIN songs ON liked_songs.song_id = songs.song_id
    WHERE liked_songs.user_id = ?
");
$stmt->bind_param("i", $user_id); // Bind the parameter
$stmt->execute();
$result = $stmt->get_result();
$liked_songs = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<div class="row">
    <?php if ($liked_songs): ?>
        <?php foreach ($liked_songs as $song): ?>
            <div class="col-xs-4 col-sm-4 col-md-3">
                <div class="item r">
                    <div class="item-media">
                        <a href="track.detail.php?id=<?= $song['song_id'] ?>" class="item-media-content"
                           style="background-image: url('<?= htmlspecialchars($song['image_path']) ?>')">
                        </a>
                        <div class="item-overlay center">
                            <button class="btn-playpause">Play</button>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="item-title text-ellipsis">
                            <a href="track.detail.php?id=<?= $song['song_id'] ?>"><?= htmlspecialchars($song['song_name']) ?></a>                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No liked songs found for this user.</p>
    <?php endif; ?>
</div>
