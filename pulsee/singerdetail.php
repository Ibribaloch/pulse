<?php
include('config.php'); 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$artist_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $conn->prepare("SELECT artist_id, artist_name, image_path, description FROM artists WHERE artist_id = ?");
$stmt->bind_param("i", $artist_id);
$stmt->execute();
$result = $stmt->get_result();

$artist = $result->fetch_assoc(); 

$albumStmt = $conn->prepare("SELECT album_id, album_name FROM albums WHERE artist_id = ?");
$albumStmt->bind_param("i", $artist_id);
$albumStmt->execute();
$albumResult = $albumStmt->get_result();

$trackStmt = $conn->prepare("SELECT song_name FROM songs WHERE artist_id = ?");
$trackStmt->bind_param("i", $artist_id);
$trackStmt->execute();
$trackResult = $trackStmt->get_result();

$stmt->close();
$albumStmt->close();
$trackStmt->close();
$conn->close();
?>

    
                <div class="padding">
                    <div class="row-col">
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w rounded">
                                <div class="item-media">
                                    <div class="item-media-content" style="background-image: url('<?php echo htmlspecialchars($artist['image_path']); ?>')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <div class="page-title">
                                    <h1 class="inline"><?php echo htmlspecialchars($artist['artist_name']); ?></h1>
                                    <label class="fa fa-star text-primary text-lg m-b v-m m-l-xs" title="Pro"></label>
                                </div>
                                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">
                                    <?php echo htmlspecialchars($artist['description']); ?>
                                </p>
                                <div class="item-action m-b">
                                    <a class="btn btn-icon white rounded btn-share pull-right" data-toggle="modal" data-target="#share-modal">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                    <button class="btn-playpause text-primary m-r-sm"></button>
                                    <span><?php echo $albumResult->num_rows; ?> Albums, <?php echo $trackResult->num_rows; ?> Tracks</span>
                                </div>
                                <div class="block clearfix m-b">
                                    <?php while ($album = $albumResult->fetch_assoc()): ?>
                                        <a class="btn btn-xs rounded white" href="search.php?query=<?php echo urlencode($album['album_name']); ?>">
                                            <?php echo htmlspecialchars($album['album_name']); ?>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
