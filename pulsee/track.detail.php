<?php
include('config.php');
include('usercheck.php');
include('trackview.php');

if (isset($_GET['song_id'])) {
    $song_id = $_GET['song_id'];

    $sql = "SELECT s.song_name, s.image_path, s.audio_path, s.views, s.likes, g.genre_name, a.artist_name, a.artist_id
            FROM songs s
            LEFT JOIN genres g ON s.genre_id = g.genre_id
            LEFT JOIN artists a ON s.artist_id = a.artist_id
            WHERE s.song_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $song_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $song = $result->fetch_assoc();
            $artist_id = $song['artist_id'];
        } else {
            die("Song not found.");
        }
        $stmt->close();
    } else {
        die("Error preparing statement: " . $conn->error);
    }

    $count_sql = "SELECT COUNT(*) as song_count FROM songs WHERE artist_id = ?";
    if ($count_stmt = $conn->prepare($count_sql)) {
        $count_stmt->bind_param("i", $artist_id);
        $count_stmt->execute();
        $count_result = $count_stmt->get_result();
        $song_count = $count_result->fetch_assoc()['song_count'];
        $count_stmt->close();
    } else {
        die("Error preparing count statement: " . $conn->error);
    }

    $related_songs_sql = "SELECT song_id, song_name, image_path 
                          FROM songs 
                          WHERE artist_id = ? AND song_id != ? 
                          LIMIT 5";
    if ($related_stmt = $conn->prepare($related_songs_sql)) {
        $related_stmt->bind_param("ii", $artist_id, $song_id);
        $related_stmt->execute();
        $related_songs_result = $related_stmt->get_result();
        $related_songs = $related_songs_result->fetch_all(MYSQLI_ASSOC);
        $related_stmt->close();
    } else {
        die("Error preparing related songs statement: " . $conn->error);
    }
} else {
    die("Error: song_id not found in URL.");
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php
include('config.php');
$sql = "SELECT * FROM website_settings";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $siteName = $row["site_name"];
  $logoUrl = $row["logo_url"];
  $name = $row["name"];
} 
$conn->close();
?>
<meta charset="utf-8">
  <title><?php echo $song['song_name']; ?> - <?php echo $name; ?></title>
  <meta name="description" content="Music, Musician, Bootstrap">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="<?php echo $logoUrl; ?>">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="<?php echo $logoUrl; ?>">
  <link rel="stylesheet" href="css/animate.css/animate.min.css" type="text/css">
  <link rel="stylesheet" href="css/glyphicons/glyphicons.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/material-design-icons/material-design-icons.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/styles/app.min.css">
</head>
<body>
    <div class="app dk" id="app">
        <div id="aside" class="app-aside modal fade nav-dropdown">
            <?php include('sidebar.php'); ?>
        </div>
        <div id="content" class="app-content white bg box-shadow-z2" role="main">
            <div class="app-footer app-player grey bg">
                <?php include('footer.php'); ?>
            </div>
            <div class="app-body" id="view">
                <div class="pos-rlt">
                    <div class="page-bg" data-stellar-ratio="2" style="background-image: url('images/b0.jpg')"></div>
                </div>
                <div class="page-content">
                    <div class="padding b-b">
                        <?php include('trackinfo.php'); ?>
                    </div>
                    <div class="row-col">
                        <div class="col-lg-9 b-r no-border-md">
                            <div class="padding">
                                <h6 class="m-b"><span class="text-muted">By</span> <a href="artist.detail.html"
                                        data-pjax class="item-author _600"><?php echo htmlspecialchars($song['artist_name']); ?></a> <span
                                        class="text-muted text-sm">- <?php echo $song_count; ?> Songs</span></h6>
                                <div id="tracks" class="row item-list item-list-xs item-list-li m-b">
                                <?php
                                    include('artistsong.php');
                                ?>
                                </div>
                                <h5 class="m-b">Comments</h5>
                                <div class="streamline m-b m-l">
                                    <?php include('comments.php'); ?>
                                </div>
                                <h5 class="m-t-lg m-b">Leave a comment</h5>
                                <form action="submit_comment.php" method="POST">
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea name="comment" class="form-control" rows="5" placeholder="Type your comment" required></textarea>
                                    </div>
                                        <input type="hidden" name="song_id" value="<?php echo $song_id; ?>">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm white rounded">Submit comment</button>
                                        </div>
                                </form>

                            </div>
                        </div>
                        <?php include('likes.php'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="switcher">
            <?php include('switcher.php'); ?>   
        </div>
    </div>
    <script src="scripts/app.min.js"></script>
</body>
</html>