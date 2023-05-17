<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="profilestyle2.css">
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
$dbname = "agridb";
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM regdata WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // User found, display profile details
    $row = mysqli_fetch_assoc($result);
    echo "Welcome, " . $row['username'] . "<br>";
    echo "Crop you cultivate is " . $row['Cropname'] . "<br>";
    echo "Type of soil : " . $row['Soiltype'] . "<br>";
    echo "No of Acres you have : " . $row['Acres'] . "<br>";
    echo "You have started the harvesting on: " . $row['Harvestdate'] . "<br>";
    echo "Quantity you have sold(in Kg): " . $row['Quantitysold'] . "<br>";


    // Add logout button
    echo '<form action="logout.php"><input type="submit" value="Logout"></form>';
} else {
    // User not found, show error message
    echo "User not found";
    echo '<form action="logout.php"><input type="submit" value="Logout"></form>';
}

mysqli_close($conn);
?>
</div>
</body>
</html>
