<?php
include('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php"); 
    exit();
}

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
$sql = "SELECT * FROM playlists WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$playlists = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>
    <div class="container">
        <div class="row">
            <?php if ($playlists): ?>
                <?php foreach ($playlists as $playlist): ?>
                    <div class="col-xs-4 col-sm-4 col-md-3">
                        <div class="item r">
                            <div class="item-media">
                                <a href="playlist_detail.php?id=<?= $playlist['id'] ?>" class="item-media-content"
                                   style="background-image: url('<?= htmlspecialchars($playlist['cover_image']) ?>')">
                                </a>
                            </div>
                            <div class="item-info">
                                <div class="item-title text-ellipsis">
                                    <a href="playlist_detail.php?id=<?= $playlist['id'] ?>"><?= htmlspecialchars($playlist['name']) ?></a>
                                </div>
                                <div class="item-meta text-sm text-muted">
                                    <span>Created on: <?= date('Y-m-d', strtotime($playlist['created_at'])) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No playlists found for this user.</p>
            <?php endif; ?>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-3">
            <div class="item r">
                <div class="item-media">
                    <a href="#" id="add-playlist-button" class="item-media-content" 
                       style="background-image: url('images/plus_icon.png'); background-size: cover;">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-playlist-button').addEventListener('click', function() {
            var playlistName = prompt("Enter playlist name:");
            if (playlistName) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "add_playlist.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert('Playlist created successfully');
                            location.reload(); 
                        } else {
                            alert(response.message);
                        }
                    }
                };
                xhr.send("name=" + encodeURIComponent(playlistName));
            }
        });
    </script>

