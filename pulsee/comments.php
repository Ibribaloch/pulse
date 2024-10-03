<?php
include('config.php'); 

$song_id = $_GET['song_id']; 

$sql = "SELECT c.comment, c.created_at, u.name AS username, u.profile_pic 
        FROM comments c 
        JOIN users u ON c.user_id = u.id 
        WHERE c.song_id = ? 
        ORDER BY c.created_at DESC";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $song_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $comments = []; 
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row; 
    }

    $stmt->close();
}
$conn->close();
?>
<div class="comment-section">
    <?php if (!empty($comments)): ?>
        <?php foreach ($comments as $index => $comment): ?>
            <div class="sl-item">
                <div class="sl-left">
                    <img src="<?php echo !empty($comment['profile_pic']) ? htmlspecialchars($comment['profile_pic']) : 'images/default.jpg'; ?>" alt="User Profile Picture" class="img-circle">
                </div>
                <div class="sl-content">
                    <div class="sl-author m-b-0">
                        <a href="#"><?php echo htmlspecialchars($comment['username']); ?></a>
                        <span class="sl-date text-muted"><?php echo htmlspecialchars(date('F j, Y, g:i a', strtotime($comment['created_at']))); ?></span>
                    </div>
                    <div>
                        <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                    </div>
                    <div class="box collapse m-a-0 b-a" id="reply-<?php echo $index; ?>">
                        <form>
                            <textarea class="form-control no-border" rows="3" placeholder="Type something..."></textarea>
                        </form>
                        <div class="box-footer clearfix">
                            <button class="btn btn-info pull-right btn-sm">Post</button>
                            <ul class="nav nav-pills nav-sm">
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-camera text-muted"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-video-camera text-muted"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No comments available for this song.</p>
    <?php endif; ?>
</div>
