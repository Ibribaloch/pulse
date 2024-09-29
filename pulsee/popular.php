<?php
// Include database configuration
include('config.php'); 

// Ensure connection is still valid
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the artist ID from the URL
$artist_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Prepare the SQL statement for top songs based on views
$topSongsQuery = "
    SELECT song_id, song_name, image_path, audio_path, views, likes 
    FROM songs 
    WHERE artist_id = ? 
    ORDER BY views DESC 
    LIMIT 4";

$topSongsStmt = $conn->prepare($topSongsQuery);
$topSongsStmt->bind_param("i", $artist_id);
$topSongsStmt->execute();
$topSongsResult = $topSongsStmt->get_result();

// Close the statement
$topSongsStmt->close();
$conn->close();
?>

<div class="row">
    <?php if ($topSongsResult->num_rows > 0): ?>
        <?php while ($song = $topSongsResult->fetch_assoc()): ?>
            <div class="col-md-12 col-lg-6">
                <div class="item r" data-id="item-<?php echo $song['song_id']; ?>" data-src="<?php echo htmlspecialchars($song['audio_path']); ?>">
                    <div class="item-media">
                        <a href="track.detail.php?id=<?php echo $song['song_id']; ?>" class="item-media-content" style="background-image: url('<?php echo htmlspecialchars($song['image_path']); ?>')"></a>
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
                            <a href="track.detail.php?id=<?php echo $song['song_id']; ?>"><?php echo htmlspecialchars($song['song_name']); ?></a>
                        </div>
                        <div class="item-author text-sm text-ellipsis hide">
                            <a href="artist.detail.php?id=<?php echo $artist_id; ?>" class="text-muted">Artist Name</a>
                        </div>
                        <div class="item-meta text-sm text-muted">
                            <span class="item-meta-stats text-xs">
                                <i class="fa fa-play text-muted"></i> <?php echo $song['views']; ?>
                                <i class="fa fa-heart m-l-sm text-muted"></i><?php echo $song['likes']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No top songs found for this artist.</p>
    <?php endif; ?>
</div>
