<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="profilestyle.css">
</head>
<body>
	<div class="header">
		<h2>User Profile</h2>
	</div>
	<div class="content">


<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve user's details from database
$username = $_SESSION['username'];
$servername = "localhost";
$dbusername = "root";
$dbpassword = "#ramcharan183";
$dbname = "demo";
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM regdemo WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // User found, display profile details
    $row = mysqli_fetch_assoc($result);
    echo "Welcome, " . $row['username'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Number: " . $row['number'] . "<br>";
    
    // Add logout button
    echo '<form action="logout.php"><input type="submit" value="Logout"></form>';
} else {
    // User not found, show error message
    echo "User not found";
}

mysqli_close($conn);
?>
</div>
</body>
</html>
