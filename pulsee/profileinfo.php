<?php
// Include your database connection
include 'config.php'; 

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Fetch the logged-in user's ID from the session
$user_id = $_SESSION['user_id'] ?? null;

// Initialize variables for user information
$user_name = '';
$user_description = '';
$profile_pic = '';

// Fetch the user details if the user is logged in
if ($user_id) {
    // Query to fetch user details
    $query = "SELECT name, description, profile_pic FROM users WHERE id = ?";
    
    // Prepare the query
    if ($stmt = $conn->prepare($query)) {
        // Bind parameters and execute
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($user_name, $user_description, $profile_pic);
        $stmt->fetch();
        $stmt->close();
    } else {
        // Output the error if prepare() fails
        die("Prepare failed: " . $conn->error);
    }
}

// Close the database connection
$conn->close();
?>

<!-- HTML Structure to display user information -->
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

