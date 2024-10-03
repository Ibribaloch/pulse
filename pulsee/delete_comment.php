<?php
include('config.php'); 
include('usercheck.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment_id = $_POST['comment_id'] ?? '';

    if (!empty($comment_id) && isset($user_id)) {
        $stmt = $conn->prepare("SELECT user_id FROM comments WHERE comment_id = ?");
        $stmt->bind_param("i", $comment_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $comment = $result->fetch_assoc();

        if ($comment && $comment['user_id'] == $user_id) {
            $delete_stmt = $conn->prepare("DELETE FROM comments WHERE comment_id = ?");
            $delete_stmt->bind_param("i", $comment_id);
            if ($delete_stmt->execute()) {
                header("Location: track.detail.php?song_id=" . $comment['song_id']);
                exit();
            }
            $delete_stmt->close();
        } else {
            echo "You do not have permission to delete this comment.";
        }
        $stmt->close();
    }
}
$conn->close();
?>
