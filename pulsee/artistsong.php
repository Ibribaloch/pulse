<?php
include('config.php');

if (isset($artist_id) && isset($song_id)) {
    $related_songs_sql = "SELECT song_id, song_name, image_path, audio_path 
                          FROM songs 
                          WHERE artist_id = ? AND song_id != ? 
                          LIMIT 5";
                          
    if ($stmt = $conn->prepare($related_songs_sql)) {
        $stmt->bind_param("ii", $artist_id, $song_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $related_songs = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    } else {
        die("Error preparing statement: " . $conn->error);
    }
} else {
    die("Error: artist_id or song_id not provided.");
}

$conn->close();
?>

<div class="row item-list item-list-xs m-b">
    <?php if (!empty($related_songs)): ?>
        <?php foreach ($related_songs as $song): ?>
            <div class="col-xs-12">
                <div class="item r">
                    <div class="item-media">
                        <a href="track.detail.php?song_id=<?php echo $song['song_id']; ?>" class="item-media-content"
                           style="background-image: url('<?php echo htmlspecialchars($song['image_path']); ?>')"></a>
                        <div class="item-overlay center">
                            <button class="btn-playpause" 
                                    onclick="playSong('<?php echo isset($song['audio_path']) ? $song['audio_path'] : ''; ?>', 
                                                       '<?php echo isset($song['song_name']) ? addslashes($song['song_name']) : ''; ?>', 
                                                       '<?php echo isset($song['artist_name']) ? addslashes($song['artist_name']) : ''; ?>', 
                                                       '<?php echo isset($song['image_path']) ? $song['image_path'] : 'images/default.jpg'; ?>')">
                                Play
                            </button>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="item-title text-ellipsis">
                            <a href="track.detail.php?song_id=<?php echo $song['song_id']; ?>">
                                <?php echo htmlspecialchars($song['song_name']); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No related songs found.</p>
    <?php endif; ?>
</div>
