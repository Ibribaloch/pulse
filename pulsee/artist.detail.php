<?php include('usercheck.php'); ?>
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
                <?php include ('footer.php'); ?>
            </div>
            <div class="app-body" id="view">
                <div class="pos-rlt">
                    <div class="page-bg" data-stellar-ratio="2" style="background-image: url('images/b5.jpg')"></div>
                </div>
                <div class="page-content">
                    <div class="padding b-b">
                        <?php include('singerdetail.php'); ?>
                    </div>
                    <div class="row-col">
                        <div class="col-lg-9 b-r no-border-md">
                            <div class="padding">
                                <div class="nav-active-border b-primary bottom m-b-md">
                                    <ul class="nav l-h-2x">
                                        <li class="nav-item m-r inline"><a class="nav-link active" href="#"
                                                data-toggle="tab" data-target="#tab_1">Overview</a></li>
                                        <li class="nav-item m-r inline"><a class="nav-link" href="#" data-toggle="tab"
                                                data-target="#tab_2">Tracks</a></li>
                                        <li class="nav-item m-r inline"><a class="nav-link" href="#" data-toggle="tab"
                                                data-target="#tab_4">Profile</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <h5 class="m-b">Popular</h5>
                                        <div class="row item-list item-list-md item-list-li m-b" id="tracks">
                                            <?php include('popular.php'); ?>
                                        </div>
                                        <h5 class="m-b">Albums</h5>
                                        <div class="row m-b">
                                            <?php include('album.php'); ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <div class="row m-b">
                                            <?php include('track.php'); ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_4">
                                        <?php include('artistprofile.php'); ?>
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