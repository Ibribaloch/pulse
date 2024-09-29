<?php
include('config.php'); // Include your database configuration

// Get the song_id from the URL
if (isset($_GET['song_id'])) {
    $song_id = $_GET['song_id'];

    // Modify the SQL query to include the artist's name by joining the artists table
    $sql = "SELECT s.song_name, s.image_path, s.audio_path, s.views, s.likes, g.genre_name, a.artist_name
            FROM songs s
            LEFT JOIN genres g ON s.genre_id = g.genre_id
            LEFT JOIN artists a ON s.artist_id = a.artist_id
            WHERE s.song_id = ?";

    // Prepare the SQL statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the song_id to the query
        $stmt->bind_param("i", $song_id);
        // Execute the query
        $stmt->execute();
        // Fetch the result
        $result = $stmt->get_result();

        // Check if the song exists
        if ($result->num_rows > 0) {
            // Fetch the song details along with artist's name
            $song = $result->fetch_assoc();
        } else {
            die("Song not found.");
        }
        // Close the statement
        $stmt->close();
    } else {
        // Output the error if the statement fails to prepare
        die("Error preparing statement: " . $conn->error);
    }
} else {
    die("Error: song_id not found in URL.");
}
?>
    <div class="row-col">
        <div class="col-sm w w-auto-xs m-b">
            <div class="item w r">
                <div class="item-media">
                    <div class="item-media-content" style="background-image: url('<?php echo htmlspecialchars($song['image_path']); ?>')">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="p-l-md no-padding-xs">
                <div class="page-title">
                    <h1 class="inline"><?php echo htmlspecialchars($song['song_name']); ?></h1>
                </div>
                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">
                    Artist: <?php echo htmlspecialchars($song['artist_name']); ?>
                </p>
                <div class="item-action m-b">
                    <a class="btn btn-icon white rounded btn-share pull-right" data-toggle="modal" data-target="#share-modal">
                        <i class="fa fa-share-alt"></i>
                    </a>
                    <button 
                        class="btn-playpause text-primary m-r-sm" 
                        onclick="playSong('<?php echo isset($song['audio_path']) ? $song['audio_path'] : ''; ?>', 
                                          '<?php echo isset($song['song_name']) ? addslashes($song['song_name']) : ''; ?>', 
                                          '<?php echo isset($song['artist_name']) ? addslashes($song['artist_name']) : ''; ?>', 
                                          '<?php echo isset($song['image_path']) ? $song['image_path'] : 'images/default.jpg'; ?>')">
                        Play
                    </button>

                    <span class="text-muted"><?php echo $song['views']; ?></span>
                    <a class="btn btn-icon rounded btn-favorite">
                        <i class="fa fa-heart-o"></i>
                    </a>
                    <span class="text-muted"><?php echo $song['likes']; ?></span>
                    <div class="inline dropdown m-l-xs">
                        <a class="btn btn-icon rounded btn-more" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu pull-right black lt"></div>
                    </div>
                </div>
                <div class="item-meta">
                    <a class="btn btn-xs rounded white"><?php echo htmlspecialchars($song['genre_name']); ?></a>
                </div>
            </div>
        </div>
    </div>