<?php
 include 'config.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute the query
    if ($stmt->execute()) {
        header('Location: signin.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
// Fetch website settings
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
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="app dk" id="app">
        <div class="padding">
            <div class="navbar">
                <div class="pull-center"><a href="index.html" class="navbar-brand md"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
                            <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)" />
                            <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color" />
                            <circle cx="24" cy="24" r="10" fill="#ffffff" />
                            <circle cx="13" cy="13" r="2" fill="#ffffff" class="brand-animate" />
                            <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
                            <circle cx="24" cy="24" r="3" fill="#000000" />
                        </svg> <img src="<?php echo $logoUrl; ?>" alt="." class="hide"> <span
                            class="hidden-folded inline"><?php echo $name; ?></span></a></div>
            </div>
        </div>
        <div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
        <div class="p-a-md">
            <div>
                <a href="#" class="btn btn-block indigo text-white m-b-sm"><i class="fa fa-facebook pull-left"></i> Sign up with Facebook</a>
                <a href="#" class="btn btn-block red text-white"><i class="fa fa-google-plus pull-left"></i> Sign up with Google+</a>
            </div>
            <div class="m-y text-sm">OR</div>
            <form name="form" action="signup.php" method="POST">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="m-b-md text-sm">
                    <span class="text-muted">By clicking Sign Up, I agree to the</span>
                    <a href="#">Terms of service</a>
                    <span class="text-muted">and</span>
                    <a href="#">Policy Privacy.</a>
                </div>
                <button type="submit" class="btn btn-lg black p-x-lg">Sign Up</button>
            </form>
            <div class="p-y-lg text-center">
                <div>Already have an account? <a href="signin.html" class="text-primary _600">Sign in</a></div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src="scripts/app.min.js"></script>
</body>
</html>