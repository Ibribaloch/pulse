<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";  // Change this if your database username is different
$password = "";      // Add your MySQL password if required
$dbname = "pulse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL query to fetch user based on email
    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $stored_password);
        $stmt->fetch();

        // Check if password matches
        if ($password == $stored_password) {
            // Correct password, set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;

            // Redirect to user profile
            header("Location: profile.php");
            exit();
        } else {
            // Incorrect password
            $error_message = "Invalid email or password.";
        }
    } else {
        // Email does not exist
        $error_message = "Invalid email or password.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .login-container { width: 300px; margin: 100px auto; padding: 20px; border: 1px solid #ccc; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; }
        .error { color: red; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <?php if (!empty($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
