<?php
include('config.php');
$sql = "SELECT label, link, icon FROM navbar_items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<li>';
        echo '<a href="' . $row['link'] . '">';
        echo '<span class="nav-icon">';
        echo '<i class="material-icons">' . $row['icon'] . '</i>';
        echo '</span>';
        echo '<span class="nav-text">' . $row['label'] . '</span>';
        echo '</a>';
        echo '</li>';
    }
} else {
    echo "No navbar items found.";
}

$conn->close();
?>