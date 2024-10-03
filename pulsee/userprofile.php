<?php
include('config.php'); 

$user_id = $_SESSION['user_id'];

$query = "SELECT id, name, email, profile_pic, description FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("User not found.");
}

$stmt->close();
?>
                                        <form method="POST" action="update_profile.php" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Name</div>
                                                <div class="col-sm-9"><input name="name" value="<?php echo htmlspecialchars($user['name']); ?>" class="form-control" required></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Description</div>
                                                <div class="col-sm-9"><textarea name="description" class="form-control" rows="3"><?php echo htmlspecialchars($user['description']); ?></textarea></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Profile Picture</div>
                                                <div class="col-sm-9">
                                                    <input type="file" name="profile_pic" class="form-control" accept="image/*">
                                                    <?php if (!empty($user['profile_pic'])): ?>
                                                        <img src="<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Picture" style="width: 100px; height: auto; margin-top: 10px;">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted"></div>
                                                <div class="col-sm-9"><button type="submit" class="btn btn-primary">Update Profile</button></div>
                                            </div>
                                        </form>
                                        <hr>
                        
