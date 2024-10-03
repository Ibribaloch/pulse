<?php
include('config.php');

$data = json_decode(file_get_contents('php://input'), true);

$user_id = $data['user_id'];
$song_id = $data['song_id'];
$liked_at = $data['liked_at'];

$sql = "INSERT INTO liked_songs (user_id, song_id, liked_at) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $user_id, $song_id, $liked_at);

if ($stmt->execute()) {
    $response = ["success" => true];
} else {
    $response = ["success" => false, "message" => $stmt->error];
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
