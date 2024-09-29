<?php
include('config.php');
include('usercheck.php');

include('trackview.php');

// Fetch the song details and display
$song_query = "SELECT * FROM songs WHERE song_id = ?";
$song_stmt = $conn->prepare($song_query);
$song_stmt->bind_param("i", $song_id);
$song_stmt->execute();
$song_result = $song_stmt->get_result();
$song = $song_result->fetch_assoc();

// Get the song_id from the URL
if (isset($_GET['song_id'])) {
    $song_id = $_GET['song_id'];

    // Query to get the song details and artist's name
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

            // Query to count the number of songs by the artist
            $count_sql = "SELECT COUNT(*) as song_count FROM songs WHERE artist_id = ?";
            $count_stmt = $conn->prepare($count_sql);
            $count_stmt->bind_param("i", $artist_id);
            $count_stmt->execute();
            $count_result = $count_stmt->get_result();
            $song_count = $count_result->fetch_assoc()['song_count'];
        }
    }
}

$song_stmt->close();
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
} 
$conn->close();
?>
<meta charset="utf-8">
  <title><?php echo $song['song_name']; ?> - Pulse</title>
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
                                <h6 class="m-b"><span class="text-muted">by</span> <a href="artist.detail.html"
                                        data-pjax class="item-author _600"><?php echo htmlspecialchars($song['artist_name']); ?></a> <span
                                        class="text-muted text-sm">- <?php echo $song_count; ?> Songs</span></h6>
                                <div id="tracks" class="row item-list item-list-xs item-list-li m-b">
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-10"
                                            data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b9.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">The
                                                        Open Road</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Postiljonen</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-right">5:20</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-8"
                                            data-src="http://api.soundcloud.com/tracks/236288744/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b7.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">Simple
                                                        Place To Be</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">RYD</a></div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-right">4:20</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-7"
                                            data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b6.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a
                                                        href="track.detail.html">Reflection (Deluxe)</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Fifth Harmony</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-right">5:05</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-3"
                                            data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b2.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">I
                                                        Wanna Be In the Cavalry</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Jeremy Scott</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-right">2:50</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-11"
                                            data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b10.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a
                                                        href="track.detail.html">Spring</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Pablo Nouvelle</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-right">3:10</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-6"
                                            data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b5.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">Body
                                                        on me</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Rita Ora</a></div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-right">3:55</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-1"
                                            data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b0.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">Pull
                                                        Up</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Summerella</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-right">2:50</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-12"
                                            data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b11.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">Happy
                                                        ending</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Postiljonen</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-right">5:20</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-5"
                                            data-src="http://streaming.radionomy.com/JamendoLounge">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b4.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">Live
                                                        Radio</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Radionomy</a></div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-right">3:35</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-4"
                                            data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b3.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">What A
                                                        Time To Be Alive</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Judith Garcia</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-right">6:00</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="m-b">From Rachel</h5>
                                <div class="row m-b">
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <div class="item r" data-id="item-2"
                                            data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b1.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a
                                                        href="track.detail.html">Fireworks</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Kygo</a></div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-stats text-xs"><i
                                                            class="fa fa-play text-muted"></i> 30 <i
                                                            class="fa fa-heart m-l-sm text-muted"></i> 10</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <div class="item r" data-id="item-8"
                                            data-src="http://api.soundcloud.com/tracks/236288744/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b7.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">Simple
                                                        Place To Be</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">RYD</a></div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-stats text-xs"><i
                                                            class="fa fa-play text-muted"></i> 400 <i
                                                            class="fa fa-heart m-l-sm text-muted"></i> 220</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <div class="item r" data-id="item-12"
                                            data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b11.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">Happy
                                                        ending</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Postiljonen</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-stats text-xs"><i
                                                            class="fa fa-play text-muted"></i> 860 <i
                                                            class="fa fa-heart m-l-sm text-muted"></i> 240</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <div class="item r" data-id="item-4"
                                            data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media"><a href="track.detail.html"
                                                    class="item-media-content"
                                                    style="background-image: url('images/b3.jpg')"></a>
                                                <div class="item-overlay center"><button
                                                        class="btn-playpause">Play</button></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right"><a href="#"
                                                        class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a
                                                        href="#" class="btn-more" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis"><a href="track.detail.html">What A
                                                        Time To Be Alive</a></div>
                                                <div class="item-author text-sm text-ellipsis hide"><a
                                                        href="artist.detail.html" class="text-muted">Judith Garcia</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted"><span
                                                        class="item-meta-stats text-xs"><i
                                                            class="fa fa-play text-muted"></i> 320 <i
                                                            class="fa fa-heart m-l-sm text-muted"></i> 20</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="m-b">Comments</h5>
                                <div class="streamline m-b m-l">
                                    <?php include('comments.php'); ?>
                                </div>
                                <h5 class="m-t-lg m-b">Leave a comment</h5>
                                <form>
                                    <div class="form-group row">
                                        <div class="col-sm-6"><label>Your name</label><input type="text"
                                                class="form-control" placeholder="Name"></div>
                                        <div class="col-sm-6"><label>Email</label><input type="email"
                                                class="form-control" placeholder="Enter email"></div>
                                    </div>
                                    <div class="form-group"><label>Comment</label><textarea class="form-control"
                                            rows="5" placeholder="Type your comment"></textarea></div>
                                    <div class="form-group"><button type="submit"
                                            class="btn btn-sm white rounded">Submit comment</button></div>
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