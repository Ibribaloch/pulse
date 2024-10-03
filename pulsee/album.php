<?php
include('config.php'); 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$artist_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$albumsQuery = "
    SELECT album_id, album_name, album_cover 
    FROM albums 
    WHERE artist_id = ?";

$albumsStmt = $conn->prepare($albumsQuery);
$albumsStmt->bind_param("i", $artist_id);
$albumsStmt->execute();
$albumsResult = $albumsStmt->get_result();

?>

<div class="row">
    <?php if ($albumsResult->num_rows > 0): ?>
        <?php while ($album = $albumsResult->fetch_assoc()): ?>
            <div class="col-xs-4 col-sm-4 col-md-3">
                <div class="item r" data-id="item-<?php echo $album['album_id']; ?>">
                    <div class="item-media">
                        <a href="album.detail.php?id=<?php echo $album['album_id']; ?>" class="item-media-content"
                           style="background-image: url('<?php echo htmlspecialchars($album['album_cover']); ?>')"></a>
                    </div>
                    <div class="item-info">
                        <div class="item-title text-ellipsis">
                            <a href="album.detail.php?id=<?php echo $album['album_id']; ?>"><?php echo htmlspecialchars($album['album_name']); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No albums found for this artist.</p>
    <?php endif; ?>
</div>

<?php
$albumsStmt->close();
?>
