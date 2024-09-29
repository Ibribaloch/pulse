<?php
// Include your database connection
include 'config.php'; // Ensure this points to your correct config file

// Initialize an empty array to avoid undefined variable issues
$songs = array();

// Update the query to join the songs and artists tables
$query = "
    SELECT s.song_id, s.song_name, s.image_path, s.artist_id, s.created_at, a.artist_name
    FROM songs s
    JOIN artists a ON s.artist_id = a.artist_id
    ORDER BY s.created_at DESC 
    LIMIT 8
";

// Execute the query
$result = $conn->query($query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Fetch the result and populate the $songs array
while ($row = $result->fetch_assoc()) {
    $songs[] = $row;
}

// Close the database connection (optional but recommended)
$conn->close();
?>

<!-- HTML Structure with PHP to dynamically generate content -->
<div class="row">
    <?php if (!empty($songs)) { // Check if there are any songs to display ?>
        <?php foreach ($songs as $song) { ?>
        <div class="col-sm-6">
            <div class="item r">
                <div class="item-media">
                    <a href="track.detail.html" class="item-media-content"
                       style="background-image: url('<?php echo htmlspecialchars($song['image_path']); ?>')">
                    </a>
                    <div class="item-overlay center">
                        <button class="btn-playpause" onclick="playSong('<?php echo $audio_path; ?>', '<?php echo $song_name; ?>', '<?php echo $artist_name; ?>', '<?php echo $image_path; ?>')">Play</button>
                    </div>
                </div>
                <div class="item-info">
                    <div class="item-overlay bottom text-right">
                        <a href="#" class="btn-favorite">
                            <i class="fa fa-heart-o"></i>
                        </a>
                        <a href="#" class="btn-more" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu pull-right black lt"></div>
                    </div>
                    <div class="item-title text-ellipsis">
                        <a href="track.detail.html"><?php echo htmlspecialchars($song['song_name']); ?></a>
                    </div>
                    <div class="item-author text-sm text-ellipsis">
                        <a href="artist.detail.html" class="text-muted"><?php echo htmlspecialchars($song['artist_name']); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php } else { ?>
        <p>No songs available at the moment.</p>
    <?php } ?>
</div>
