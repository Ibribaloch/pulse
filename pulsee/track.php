<?php
include('config.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$artist_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$songsQuery = "
    SELECT song_id, song_name, image_path, views, likes, audio_path 
    FROM songs 
    WHERE artist_id = ? 
    ORDER BY views DESC";  

$songsStmt = $conn->prepare($songsQuery);
$songsStmt->bind_param("i", $artist_id);
$songsStmt->execute();
$songsResult = $songsStmt->get_result();
?>

<div class="row">
    <?php if ($songsResult->num_rows > 0): ?>
        <?php while ($song = $songsResult->fetch_assoc()): ?>
            <div class="col-xs-4 col-sm-4 col-md-3">
                <div class="item r" data-id="item-<?php echo $song['song_id']; ?>"
                     data-src="<?php echo htmlspecialchars($song['audio_path'], ENT_QUOTES); ?>">
                    <div class="item-media">
                        <a href="track.detail.php?id=<?php echo $song['song_id']; ?>" 
                           class="item-media-content" 
                           style="background-image: url('<?php echo htmlspecialchars($song['image_path'], ENT_QUOTES); ?>')">
                        </a>
                        <div class="item-overlay center">
                            <button class="btn-playpause">Play</button>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="item-overlay bottom text-right">
                            <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu pull-right black lt"></div>
                        </div>
                        <div class="item-title text-ellipsis">
                            <a href="track.detail.php?id=<?php echo $song['song_id']; ?>">
                                <?php echo htmlspecialchars($song['song_name']); ?>
                            </a>
                        </div>
                        <div class="item-meta text-sm text-muted">
                            <span class="item-meta-stats text-xs">
                                <i class="fa fa-play text-muted"></i> <?php echo $song['views']; ?> 
                                <i class="fa fa-heart m-l-sm text-muted"></i> <?php echo $song['likes']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No songs found for this artist.</p>
    <?php endif; ?>
</div>

<?php
$songsStmt->close();
?>
