<?php
include('config.php');
$sql = "SELECT * FROM website_settings";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $siteName = $row["site_name"];
  $logoUrl = $row["logo_url"];
} 
$conn->close();
?>

<meta charset="utf-8">
  <title><?php echo $siteName; ?></title>
  <meta name="description" content="Music, Musician, Bootstrap">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="<?php echo $logoUrl; ?>">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="<?php echo $logoUrl; ?>">
  <link rel="stylesheet" href="css/animate.css/animate.min.css" type="text/css">
  <link rel="stylesheet" href="css/glyphicons/glyphicons.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/material-design-icons/material-design-icons.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/styles/app.min.css">