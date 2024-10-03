<?php
include 'config.php'; 

$query = "
    SELECT songs.song_name, artists.artist_name, songs.image_path, songs.views, COUNT(liked_songs.song_id) AS like_count
    FROM songs
    JOIN artists ON songs.artist_id = artists.artist_id
    LEFT JOIN liked_songs ON songs.song_id = liked_songs.song_id
    GROUP BY songs.song_id
    ORDER BY songs.views DESC
    LIMIT 10"; 

$result = mysqli_query($conn, $query);

$songs = array();
while ($row = mysqli_fetch_assoc($result)) {
    $songs[] = $row;
}
?>

<?php foreach ($songs as $index => $song) { ?>
<div class="col-xs-12">
    <div class="item r" data-id="item-<?php echo rand(1, 100); ?>" 
         data-src="http://api.soundcloud.com/tracks/236288744/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
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
                <a href="track.detail.html">
                    <?php if ($index == 0) {  ?>
                        <strong><?php echo $song['song_name']; ?> (Treanding #1)</strong>
                    <?php } else { ?>
                        <?php echo $song['song_name']; ?>
                    <?php } ?>
                </a>
            </div>
            <div class="item-author text-sm text-ellipsis">
                <a href="artist.detail.html" class="text-muted"><?php echo $song['artist_name']; ?></a>
            </div>
            <div class="item-meta text-sm text-muted">
                <span class="item-meta-stats text-xs item-meta-right">
                    <i class="fa fa-play text-muted"></i> <?php echo $song['views']; ?> 
                    <i class="fa fa-heart m-l-sm text-muted"></i> <?php echo $song['like_count']; ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php } ?>
