<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Songs</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Artist</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trending</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Views</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to database
                include 'config.php';

                // Fetch top 10 trending songs
                $query = "
                    SELECT songs.song_name, artists.artist_name, songs.image_path, songs.views, COUNT(liked_songs.song_id) AS like_count
                    FROM songs
                    JOIN artists ON songs.artist_id = artists.artist_id
                    LEFT JOIN liked_songs ON songs.song_id = liked_songs.song_id
                    GROUP BY songs.song_id
                    ORDER BY songs.views DESC
                    LIMIT 10"; 

                $result = mysqli_query($conn, $query);

                // Display songs in the table
                $index = 1; // To display trending ranking (e.g., #1, #2)
                while ($song = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php echo $song['song_name']; ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0"><?php echo $song['artist_name']; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">#<?php echo $index; ?></span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"><?php echo $song['views']; ?></span>
                        </td>
                    </tr>
                    <?php
                    $index++; // Increment ranking
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
