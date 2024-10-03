<?php
include 'config.php';
$sql = "SELECT genre_id, genre_name FROM genres";
$result = $conn->query($sql);
?>
<div class="dropdown inline">
    <button class="btn btn-sm no-bg h4 m-y-0 v-b dropdown-toggle text-primary" data-toggle="dropdown">All</button>
    <div class="dropdown-menu" id="genreDropdown">
        <a href="#" class="dropdown-item active" data-genre="all">All</a>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<a href="#" class="dropdown-item" data-genre="' . htmlspecialchars($row['genre_name']) . '">' . htmlspecialchars($row['genre_name']) . '</a>';
            }
        } else {
            echo '<p>No genres available.</p>';
        }
        ?>
    </div>
</div>
