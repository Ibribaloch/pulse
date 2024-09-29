<?php
    include('usercheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('header.php'); ?>
</head>
<body>
    <div class="app dk" id="app">
        <?php include('sidebar.php'); ?>
        <div id="content" class="app-content white bg box-shadow-z2" role="main">
            <div class="app-footer app-player grey bg">
                <?php include('footer.php'); ?>
            </div>
            <div class="app-body" id="view">
                <div class="page-bg" data-stellar-ratio="2" style="background-image: url('images/a3.jpg')"></div>
                <div class="page-content">
                    <div class="padding b-b">
                        <div class="row-col">
                            <?php include('profileinfo.php'); ?>
                        </div>
                    </div>
                    <div class="row-col">
                        <div class="col-lg-9 b-r no-border-md">
                            <div class="padding p-y-0 m-b-md">
                                <div class="nav-active-border b-primary bottom m-b-md m-t">
                                    <ul class="nav l-h-2x" data-ui-jp="taburl">
                                        <li class="nav-item m-r inline"><a class="nav-link" href="#" data-toggle="tab"
                                                data-target="#playlist">Playlists</a></li>
                                        <li class="nav-item m-r inline"><a class="nav-link" href="#" data-toggle="tab"
                                                data-target="#like">Likes</a></li>
                                        <li class="nav-item m-r inline"><a class="nav-link" href="#" data-toggle="tab"
                                                data-target="#profile">Profile</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="playlist">
                                        <div class="row m-b">
                                            <?php include('playlist.php'); ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="like">
                                        <div class="row m-b">
                                            <?php include('liked_tracks.php'); ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile">
                                        <?php include('userprofile.php'); ?>
                                    </div>
                                </div>
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