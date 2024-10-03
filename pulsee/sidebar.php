<?php 
include('config.php');

if (isset($_SESSION['user_id'])) {
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
} else {
    $user_name = 'Guest';
    $user_profile_pic = 'images/default_profile_pic.jpg';
}

$sql = "SELECT * FROM website_settings";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $siteName = $row["site_name"];
    $logoUrl = $row["logo_url"];
    $name = $row["name"];
}

$conn->close();
?>

<div id="aside" class="app-aside modal fade nav-dropdown">
    <div class="left navside grey dk" data-layout="column">
        <div class="navbar no-radius">
            <a href="player.php" class="navbar-brand md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
                    <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)" />
                    <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color" />
                    <circle cx="24" cy="24" r="10" fill="#ffffff" />
                    <circle cx="13" cy="13" r="2" fill="#ffffff" class="brand-animate" />
                    <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
                    <circle cx="24" cy="24" r="3" fill="#000000" />
                </svg>
                <img src="<?php echo $logoUrl; ?>" alt="." class="hide">
                <span class="hidden-folded inline"><?php echo $name; ?></span>
            </a>
        </div>

        <div data-flex class="hide-scroll">
            <nav class="scroll nav-stacked nav-active-primary">
                <ul class="nav" data-ui-nav>
                    <li class="nav-header hidden-folded">
                        <span class="text-xs text-muted">Main</span>
                    </li>
                    <?php include('fetchnavbar.php'); ?>
                    <li class="nav-header hidden-folded m-t">
                        <span class="text-xs text-muted">Your collection</span>
                    </li>
                    <li>
                        <a href="profile.php#playlists">
                            <span class="nav-icon"><i class="material-icons">queue_music</i></span>
                            <span class="nav-text">Playlists</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php#likes">
                            <span class="nav-icon"><i class="material-icons">favorite_border</i></span>
                            <span class="nav-text">Likes</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div data-flex-no-shrink>
            <div class="nav-fold dropup">
                <a data-toggle="dropdown">
                    <span class="pull-left">
                        <img src="<?php echo $user_profile_pic; ?>" alt="Profile Picture" class="w-32 img-circle">
                    </span>
                    <span class="clear hidden-folded p-x p-y-xs">
                        <span class="block _500 text-ellipsis"><?php echo $user_name; ?></span>
                    </span>
                </a>
                <div class="dropdown-menu w dropdown-menu-scale">
                    <a class="dropdown-item" href="profile.php#profile">Profile</a>
                    <a class="dropdown-item" href="profile.php#playlists">Playlists</a>
                    <a class="dropdown-item" href="profile.php#likes">Likes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="signout.php">Sign out</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="app-header hidden-lg-up white lt box-shadow-z1">
                <div class="navbar"><a href="index.html" class="navbar-brand md"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48" width="32" height="32">
                            <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)" />
                            <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color" />
                            <circle cx="24" cy="24" r="10" fill="#ffffff" />
                            <circle cx="13" cy="13" r="2" fill="#ffffff" class="brand-animate" />
                            <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
                            <circle cx="24" cy="24" r="3" fill="#000000" />
                        </svg> <img src="images/logo.png" alt="." class="hide"> <span
                            class="hidden-folded inline">pulse</span></a>
                    <ul class="nav navbar-nav pull-right">
                        <li class="nav-item"><a data-toggle="modal" data-target="#aside" class="nav-link"><i
                                    class="material-icons">menu</i></a></li>
                    </ul>
                </div>
            </div>
            
