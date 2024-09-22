<?php
include 'config.php';

$query = "SELECT song_id, song_name, image_path, artist_id, created_at 
          FROM songs 
          ORDER BY created_at DESC 
          LIMIT 8";
$result = $conn->query($query);
?>

<div class="row">
  <?php while ($row = $result->fetch_assoc()): ?>
    <div class="col-xs-4 col-sm-4 col-md-3">
      <div class="item r" data-id="item-<?php echo $row['song_id']; ?>"
           data-src="http://api.soundcloud.com/tracks/<?php echo $row['song_id']; ?>/stream?client_id=your-client-id">
        <div class="item-media">
          <a href="track.detail.php?song_id=<?php echo $row['song_id']; ?>" class="item-media-content"
             style="background-image: url('<?php echo $row['image_path']; ?>')">
          </a>
          <div class="item-overlay center">
            <button class="btn-playpause">Play</button>
          </div>
        </div>
        <div class="item-info">
			<div class="item-overlay bottom text-right">
				<a href="#" class="btn-favorite">
					<i class="fa fa-heart-o">
					</i>
				</a>
				<a href="#" class="btn-more" data-toggle="dropdown">
                        <i class="fa fa-ellipsis-h"></i>
                    </a>
				<div class="dropdown-menu pull-right black lt">
				</div>
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
</div>


