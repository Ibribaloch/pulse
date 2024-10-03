<?php
session_start();
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
$conn->close();
?>
