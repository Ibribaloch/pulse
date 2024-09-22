<?php
// Include your database connection
include 'config.php'; // Make sure this is correct

// SQL query to fetch 10 random songs
$query = "SELECT song_name, artist_name, image_path 
          FROM songs 
          JOIN artists ON songs.artist_id = artists.artist_id 
          ORDER BY RAND() 
          LIMIT 10"; // Fetch 10 random songs

// Execute the query
$result = mysqli_query($conn, $query);

// Store the songs in an array
$songs = array();
while ($row = mysqli_fetch_assoc($result)) {
    $songs[] = $row;
}
?>

<!-- HTML Structure with PHP to dynamically generate content -->
<div class="row">
    <?php foreach ($songs as $song) { ?>
    <div class="col-sm-6">
        <div class="item r">
            <div class="item-media">
                <a href="track.detail.html" class="item-media-content"
                   style="background-image: url('<?php echo $song['image_path']; ?>')">
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
                    <a href="track.detail.html"><?php echo $song['song_name']; ?></a>
                </div>
                <div class="item-author text-sm text-ellipsis">
                    <a href="artist.detail.html" class="text-muted"><?php echo $song['artist_name']; ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
