<?php
// Fetch artist details from the database
$artistQuery = "SELECT artist_id, artist_name, image_path, description, website, facebook_link, twitter_link, google_plus_link FROM artists WHERE artist_id = ?";
$artistStmt = $conn->prepare($artistQuery);
$artistStmt->bind_param("i", $artist_id);
$artistStmt->execute();
$artistResult = $artistStmt->get_result();

if ($artistResult->num_rows > 0) {
    $artist = $artistResult->fetch_assoc();
} else {
    // Handle the case where no artist was found
}
?>
<div class="row-col m-b">
    <div class="col-xs w-xs text-muted">Website</div>
    <div class="col-xs">
        <?php if (isset($artist['website']) && !empty($artist['website'])): ?>
            <a href="<?php echo htmlspecialchars($artist['website']); ?>">
                <?php echo htmlspecialchars($artist['website']); ?>
            </a>
        <?php else: ?>
            <span>No website available</span>
        <?php endif; ?>
    </div>
</div>

<div class="row-col m-b">
    <div class="col-xs w-xs text-muted">Social Links</div>
    <div class="col-xs">
        <?php if (isset($artist['facebook_link'])): ?>
            <a href="<?php echo htmlspecialchars($artist['facebook_link']); ?>" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-facebook"></i>
            </a>
        <?php endif; ?>
        
        <?php if (isset($artist['twitter_link'])): ?>
            <a href="<?php echo htmlspecialchars($artist['twitter_link']); ?>" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-twitter"></i>
            </a>
        <?php endif; ?>
        
        <?php if (isset($artist['google_plus_link'])): ?>
            <a href="<?php echo htmlspecialchars($artist['google_plus_link']); ?>" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-google-plus"></i>
            </a>
        <?php endif; ?>
    </div>
</div>

