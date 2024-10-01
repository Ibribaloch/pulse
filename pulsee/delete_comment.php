<?php
include('config.php'); // Include your database connection
include('usercheck.php'); // Include user authentication to get $user_id

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment_id = $_POST['comment_id'] ?? '';

    if (!empty($comment_id) && isset($user_id)) {
        // First, check if the comment belongs to the user
        $stmt = $conn->prepare("SELECT user_id FROM comments WHERE comment_id = ?");
        $stmt->bind_param("i", $comment_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $comment = $result->fetch_assoc();

        if ($comment && $comment['user_id'] == $user_id) {
            // Delete the comment
            $delete_stmt = $conn->prepare("DELETE FROM comments WHERE comment_id = ?");
            $delete_stmt->bind_param("i", $comment_id);
            if ($delete_stmt->execute()) {
                header("Location: track.detail.php?song_id=" . $comment['song_id']); // Redirect back
                exit();
            }
            $delete_stmt->close();
        } else {
            echo "You do not have permission to delete this comment.";
        }
        $stmt->close();
    }
}
$conn->close(); // Close connection here
?>
