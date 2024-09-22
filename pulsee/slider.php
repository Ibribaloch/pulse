<?php
include 'config.php';

// Fetch 3 random songs
$query = "SELECT song_id, song_name, image_path, artist_id 
          FROM songs 
          ORDER BY RAND() 
          LIMIT 3";
$result = $conn->query($query);
?>

<div class="col-sm-6 text-white m-b-sm">
								<div class="owl-carousel owl-theme owl-dots-sm owl-dots-bottom-left"
									data-ui-jp="owlCarousel" data-ui-options="{
		                     items: 1
		                    ,loop: true
		                    ,autoplay: true
		                    ,nav: true
		                    ,animateOut:&#x27;fadeOut&#x27;
		                  }">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="item r" data-id="item-<?php echo $row['song_id']; ?>"
             data-src="http://api.soundcloud.com/tracks/<?php echo $row['song_id']; ?>/stream?client_id=your-client-id">
            <div class="item-media primary">
                <a href="track.detail.html" class="item-media-content"
                   style="background-image: url('<?php echo $row['image_path']; ?>')">
                </a>
                <div class="item-overlay center">
                    <button class="btn-playpause">Play</button>
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
    <?php endwhile; ?>
</div>

<?php
function getArtistName($artist_id) {
    global $conn;
    $artist_query = "SELECT artist_name FROM artists WHERE artist_id = $artist_id";
    $artist_result = $conn->query($artist_query);
    $artist = $artist_result->fetch_assoc();
    return $artist['artist_name'];
}
?>
