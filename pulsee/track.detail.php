<?php
session_start();
include('config.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

// Fetch user info
$user_id = $_SESSION['user_id'];
$sql = "SELECT name, profile_pic FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_name = $row['name'];
    $user_profile_pic = $row['profile_pic'];
} else {
    $user_name = 'Guest';
    $user_profile_pic = 'images/default_profile_pic.jpg';
}

$stmt->close();

// Get the song_id from the query string
$song_id = $_GET['song_id'];

// Check if the song has already been viewed by this user
$check_query = "SELECT * FROM viewed_songs WHERE user_id = ? AND song_id = ?";
$check_stmt = $conn->prepare($check_query);
$check_stmt->bind_param("ii", $user_id, $song_id);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows == 0) {
    // If not viewed yet, insert into the viewed_songs table
    $insert_query = "INSERT INTO viewed_songs (user_id, song_id) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("ii", $user_id, $song_id);
    $insert_stmt->execute();
    $insert_stmt->close();
}

// // Fetch the song details and display
// $song_query = "SELECT * FROM songs WHERE song_id = ?";
// $song_stmt = $conn->prepare($song_query);
// $song_stmt->bind_param("i", $song_id);
// $song_stmt->execute();
// $song_result = $song_stmt->get_result();
// $song = $song_result->fetch_assoc();

// echo "<h1>" . htmlspecialchars($song['song_name']) . "</h1>";
// // Add more details about the song as needed

// $song_stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('header.php'); ?>
</head>
<body>
    <div class="app dk" id="app">
        <div id="aside" class="app-aside modal fade nav-dropdown">
            <?php include('sidebar.php'); ?>
        </div>
        <div id="content" class="app-content white bg box-shadow-z2" role="main">
            <div class="app-header hidden-lg-up white lt box-shadow-z1">
                <div class="navbar"><a href="index.html" class="navbar-brand md"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48" width="32" height="32">
                            <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)" />
                            <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color" />
                            <circle cx="24" cy="24" r="10" fill="#ffffff" />
                            <circle cx="13" cy="13" r="2" fill="#ffffff" class="brand-animate" />
                            <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
                            <circle cx="24" cy="24" r="3" fill="#000000" />
                        </svg> <img src="images/logo.png" alt="." class="hide"> <span
                            class="hidden-folded inline">pulse</span></a>
                    <ul class="nav navbar-nav pull-right">
                        <li class="nav-item"><a data-toggle="modal" data-target="#aside" class="nav-link"><i
                                    class="material-icons">menu</i></a></li>
                    </ul>
                </div>
            </div>
            <div class="app-footer app-player grey bg">
                <?php include('footer.php'); ?>
            </div>
            <div class="app-body" id="view">
                <div class="pos-rlt">
                    <div class="page-bg" data-stellar-ratio="2" style="background-image: url('images/b0.jpg')"></div>
                </div>
                <div class="page-content">
                    <div class="padding b-b">
                        <div class="row-col">
                            <div class="col-sm w w-auto-xs m-b">
                                <div class="item w r">
                                    <div class="item-media">
                                        <div class="item-media-content" style="background-image: url('images/b0.jpg')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="p-l-md no-padding-xs">
                                    <div class="page-title">
                                        <h1 class="inline">Simple Place To Be</h1>
                                    </div>
                                    <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quamquam tu hanc
                                        copiosiorem etiam soles dicere. Nihil illinc huc pervenit. Verum hoc idem saepe
                                        faciamus. Quid ad utilitatem tantae pecuniae? Utram tandem linguam nescio? Sed
                                        hoc sane concedamus.</p>
                                    <div class="item-action m-b"><a
                                            class="btn btn-icon white rounded btn-share pull-right" data-toggle="modal"
                                            data-target="#share-modal"><i class="fa fa-share-alt"></i></a> <button
                                            class="btn-playpause text-primary m-r-sm"></button> <span
                                            class="text-muted">2356</span> <a
                                            class="btn btn-icon rounded btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <span class="text-muted">232</span>
                                        <div class="inline dropdown m-l-xs"><a class="btn btn-icon rounded btn-more"
                                                data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu pull-right black lt"></div>
                                        </div>
                                    </div>
                                    <div class="item-meta"><a class="btn btn-xs rounded white">Pop</a> <a
                                            class="btn btn-xs rounded white">Happy</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-col">
                        <div class="col-lg-9 b-r no-border-md">
                            <div class="padding">
                                <h6 class="m-b"><span class="text-muted">by</span> <a href="artist.detail.html"
                                        data-pjax class="item-author _600">Rachel Platten</a> <span
                                        class="text-muted text-sm">- 10 song, 50 min 32 sec</span></h6>
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
                                    <div class="sl-item">
                                        <div class="sl-left"><img src="images/a0.jpg" alt="." class="img-circle"></div>
                                        <div class="sl-content">
                                            <div class="sl-author m-b-0"><a href="#">Peter Joo</a> <span
                                                    class="sl-date text-muted">2 minutes ago</span></div>
                                            <div>
                                                <p>Check your Internet connection</p>
                                            </div>
                                            <div class="sl-footer"><a href="#" data-toggle="collapse"
                                                    data-target="#reply-1"><i
                                                        class="fa fa-fw fa-mail-reply text-muted"></i> Reply</a></div>
                                            <div class="box collapse m-a-0 b-a" id="reply-1">
                                                <form><textarea class="form-control no-border" rows="3"
                                                        placeholder="Type something..."></textarea></form>
                                                <div class="box-footer clearfix"><button
                                                        class="btn btn-info pull-right btn-sm">Post</button>
                                                    <ul class="nav nav-pills nav-sm">
                                                        <li class="nav-item"><a class="nav-link" href="#"><i
                                                                    class="fa fa-camera text-muted"></i></a></li>
                                                        <li class="nav-item"><a class="nav-link" href="#"><i
                                                                    class="fa fa-video-camera text-muted"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left"><img src="images/a2.jpg" alt="." class="img-circle"></div>
                                        <div class="sl-content">
                                            <div class="sl-author m-b-0"><a href="#">Moke</a> <span
                                                    class="sl-date text-muted">8:30</span></div>
                                            <div>
                                                <p>Call to customer <a href="#" class="text-primary">Jacob</a> and
                                                    discuss the detail.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left"><img src="images/a3.jpg" alt="." class="img-circle"></div>
                                        <div class="sl-content">
                                            <div class="sl-author m-b-0"><a href="#">Moke</a> <span
                                                    class="sl-date text-muted">Sat, 5 Mar</span></div>
                                            <blockquote>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                                    posuere erat a ante soe aiea ose dos soois.</p><small>Someone famous
                                                    in <cite title="Source Title">Source Title</cite></small>
                                            </blockquote>
                                            <div class="sl-item">
                                                <div class="sl-left"><img src="images/a2.jpg" alt="."
                                                        class="img-circle"></div>
                                                <div class="sl-content">
                                                    <div class="sl-date text-muted">Sun, 11 Feb</div>
                                                    <p><a href="#" class="text-primary">Jessi</a> assign you a task <a
                                                            href="#" class="text-primary">Mockup Design</a>.</p>
                                                </div>
                                            </div>
                                            <div class="sl-item">
                                                <div class="sl-left"><img src="images/a5.jpg" alt="."
                                                        class="img-circle"></div>
                                                <div class="sl-content">
                                                    <div class="sl-date text-muted">Thu, 17 Jan</div>
                                                    <p>Follow up to close deal</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        <?php include('search.php'); ?>
    </div>
    <script src="scripts/app.min.js"></script>
</body>
</html>