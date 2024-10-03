<?php
include 'config.php'; 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user_id = $_SESSION['user_id'] ?? null;

$user_name = '';
$user_description = '';
$profile_pic = '';

if ($user_id) {
    $query = "SELECT name, description, profile_pic FROM users WHERE id = ?";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($user_name, $user_description, $profile_pic);
        $stmt->fetch();
        $stmt->close();
    } else {
        die("Prepare failed: " . $conn->error);
    }
}

$conn->close();
?>

<div class="col-sm w w-auto-xs m-b">
                                <div class="item w rounded">
                                    <div class="item-media">
                                        <div class="item-media-content" style="background-image: url('<?php echo htmlspecialchars($profile_pic); ?>')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="p-l-md no-padding-xs">
                                    <h1 class="page-title"><span class="h1 _800">
                                        <?php echo htmlspecialchars($user_name); ?>
                                    </span></h1>
    <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">
        <?php echo htmlspecialchars($user_description); ?>
    </p>
</div>
                            </div>

