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
                <div class="padding">
                    <form action="" method="GET" class="m-b-md">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" name="query" 
                                   placeholder="Type keyword" value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>">
                            <span class="input-group-btn">
                                <button class="btn b-a no-shadow white" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                    
                    <?php
                    if (isset($_GET['query']) && !empty($_GET['query'])) {
                        $search = $_GET['query'];
                        echo '<p class="m-b-md"><strong>Search Results for: </strong>' . htmlspecialchars($search) . '</p>';
                        
                        include('config.php');

                        if (!$conn || $conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $limit = 10; 
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $offset = ($page - 1) * $limit; 
                        $countQuery = "
                            SELECT COUNT(*) as total 
                            FROM songs
                            JOIN artists ON songs.artist_id = artists.artist_id
                            JOIN genres ON songs.genre_id = genres.genre_id
                            JOIN albums ON songs.album_id = albums.album_id
                            WHERE songs.song_name LIKE '%$search%' 
                            OR artists.artist_name LIKE '%$search%' 
                            OR genres.genre_name LIKE '%$search%' 
                            OR albums.album_name LIKE '%$search%'
                        ";

                        $countResult = $conn->query($countQuery);
                        $totalResults = $countResult->fetch_assoc()['total'];
                        $totalPages = ceil($totalResults / $limit);

                        $searchQuery = "
                            SELECT songs.song_id, songs.song_name, songs.image_path, songs.audio_path, songs.views, songs.likes, 
                                   artists.artist_name, genres.genre_name, albums.album_name
                            FROM songs
                            JOIN artists ON songs.artist_id = artists.artist_id
                            JOIN genres ON songs.genre_id = genres.genre_id
                            JOIN albums ON songs.album_id = albums.album_id
                            WHERE songs.song_name LIKE '%$search%' 
                            OR artists.artist_name LIKE '%$search%' 
                            OR genres.genre_name LIKE '%$search%' 
                            OR albums.album_name LIKE '%$search%'
                            LIMIT $limit OFFSET $offset
                        ";

                        if ($result = $conn->query($searchQuery)) {
                            if ($result->num_rows > 0) {
                                echo '<div class="m-y"><div class="row item-list item-list-lg item-list-by m-b">';
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="col-xs-12">
                                            <div class="item r" data-id="item-'.$row['song_id'].'"
                                                data-src="'.$row['audio_path'].'">
                                                <div class="item-media">
                                                    <a href="track.detail.html" class="item-media-content"
                                                        style="background-image: url(\''.$row['image_path'].'\');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a> 
                                                        <a href="#" class="btn-more" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">'.$row['song_name'].'</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis">
                                                        <a href="artist.detail.html" class="text-muted">'.$row['artist_name'].'</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        Album: '.$row['album_name'].' | Genre: '.$row['genre_name'].' | Views: '.$row['views'].' | Likes: '.$row['likes'].'
                                                    </div>
                                                </div>
                                            </div>
                                          </div>';
                                }
                                echo '</div></div>';

                                echo '<nav aria-label="Page navigation">';
                                echo '<ul class="pagination">';
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo '<li class="page-item '.($i == $page ? 'active' : '').'">
                                            <a class="page-link" href="?query='.urlencode($search).'&page='.$i.'">'.$i.'</a>
                                          </li>';
                                }
                                echo '</ul>';
                                echo '</nav>';
                            } else {
                                echo '<p>No results found for "<strong>' . htmlspecialchars($search) . '</strong>"</p>';
                                ?>
                                <div class="row item-list item-list-md m-b">
                                    <?php include 'recommand.php';?>
                                </div>
                                <?php
                            }                      
                        } else {
                            echo 'Error executing query: ' . $conn->error;
                        }

                        $result->close();

                    } else {;?>
                        <div class="row item-list item-list-md m-b">
                            <?php include 'recommand.php' ?>
                    </div><?php 
                    }
                    ?>
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
