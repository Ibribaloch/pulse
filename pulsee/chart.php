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
            <div class="app-header hidden-lg-up white lt box-shadow-z1">
            </div>
            <div class="app-footer app-player grey bg">
                <?php include('footer.php'); ?>
            </div>
            <div class="app-body" id="view">
                <div class="page-content">
                    <div class="row-col">
                        <div class="col-lg-9 b-r no-border-md">
                            <div class="padding">
                                <div class="page-title m-b">
                                    <h1 class="inline m-a-0">Trending</h1>
                                </div>
                                <div class="row item-list item-list-md item-list-li m-b">
                                    <?php include('trend.php'); ?>
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