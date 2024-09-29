<?php
include 'config.php';

// Fetch the top 9 songs based on the number of views
$query = "
    SELECT s.song_id, s.song_name, s.image_path, s.artist_id, COUNT(v.song_id) as views 
    FROM songs s
    LEFT JOIN viewed_songs v ON s.song_id = v.song_id
    GROUP BY s.song_id
    ORDER BY views DESC
    LIMIT 9";
$result = $conn->query($query);
?>

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="">
            <div class="item r" data-id="item-<?php echo $row['song_id']; ?>"
                 data-src="http://api.soundcloud.com/tracks/<?php echo $row['song_id']; ?>/stream?client_id=your-client-id">
                <div class="item-media item-media-4by3">
                    <a href="track.detail.html" class="item-media-content"
                       style="background-image: url('<?php echo $row['image_path']; ?>')">
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
                        <a href="track.detail.html"><?php echo $row['song_name']; ?></a>
                    </div>
                    <div class="item-author text-sm text-ellipsis">
                        <a href="artist.detail.html" class="text-muted"><?php echo getArtistName($row['artist_id']); ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>

