<?php
include 'config.php'; 

$genre = isset($_GET['genre']) ? $_GET['genre'] : 'all';

$sql = "SELECT songs.song_name, songs.image_path, artists.artist_name, genres.genre_name 
        FROM songs 
        INNER JOIN artists ON songs.artist_id = artists.artist_id 
        INNER JOIN genres ON songs.genre_id = genres.genre_id";

if ($genre != 'all') {
    $sql .= " WHERE genres.genre_name = ?";
}

$stmt = $conn->prepare($sql);

if ($genre != 'all') {
    $stmt->bind_param("s", $genre);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="col-xs-4 col-sm-4 col-md-3">
            <div class="item r">
                <div class="item-media">
                    <a href="track.detail.html" class="item-media-content" style="background-image: url(' . $row['image_path'] . ')"></a>
                    <div class="item-overlay center"><button class="btn-playpause">Play</button></div>
                </div>
                <div class="item-info">
                    <div class="item-title text-ellipsis"><a href="track.detail.html">' . $row['song_name'] . '</a></div>
                    <div class="item-author text-sm text-ellipsis"><a href="artist.detail.html" class="text-muted">' . $row['artist_name'] . '</a></div>
                </div>
            </div>
        </div>';
    }
} else {
    echo '<p>No songs found for this genre.</p>';
}
?>
