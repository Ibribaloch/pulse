<?php
// Assuming you have your database connection in 'config.php'
include 'config.php';

// Fetch artists, their images, descriptions, and song counts
$query = "
    SELECT a.artist_id, a.artist_name, a.image_path, a.description, COUNT(s.song_id) AS song_count
    FROM artists a
    LEFT JOIN songs s ON a.artist_id = s.artist_id
    GROUP BY a.artist_id, a.artist_name, a.image_path, a.description
";

$result = mysqli_query($conn, $query);

// Check for results and display
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $artist_id = $row['artist_id'];
        $artist_name = $row['artist_name'];
        $image_path = $row['image_path']; // Path to artist's image
        $description = $row['description']; // Artist's description
        $song_count = $row['song_count'];
        
        echo "
        <div class='col-xs-4 col-sm-4 col-md-3'>
            <div class='item'>
                <div class='item-media rounded'>
                    <a href='artist.detail.php?id=$artist_id' class='item-media-content'
                       style='background-image: url(\"$image_path\")'></a>
                </div>
                <div class='item-info text-center'>
                    <div class='item-title text-ellipsis'>
                        <a href='artist.detail.php?id=$artist_id'>$artist_name</a>
                        <div class='text-sm text-muted'>$song_count songs</div>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
} else {
    echo "<p>No artists found.</p>";
}

// Close the database connection
mysqli_close($conn);
?>
