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



<?php
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  // Redirect to the login page if not logged in
  header("Location: login.php");
  exit();
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "#ramcharan183";
$dbname = "agridb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Get the user's ID from the session
$user_id = $_SESSION['username'];


$sql = "SELECT onemonthback,twomonthsback, threemonthsback, fourmonthsback FROM statbase WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if the query returned any rows
if ($result->num_rows > 0) {
  // Extract the data from the query result
  $row = $result->fetch_assoc();
  $data = array(
    'One Month Back' => $row['onemonthback'],
    'Two Months Back' => $row['twomonthsback'],
    'Three Months Back' => $row['threemonthsback'],
    'Four Months Back' => $row['fourmonthsback']
  );

  // Generate the pie chart using Google Charts API
  echo "<div id='piechart'></div>";
  echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>";
  echo "<script type='text/javascript'>";
  echo "google.charts.load('current', {'packages':['corechart']});";
  echo "google.charts.setOnLoadCallback(drawChart);";
  echo "function drawChart() {";
  echo "var data = google.visualization.arrayToDataTable([";
  echo "['Month', 'Amount'],";
  foreach ($data as $month => $amount) {
    echo "['" . $month . "', " . $amount . "],";
  }
  echo "]);";
  echo "var options = {title: 'Quantity Sold in last four months (in Kg)'};";
  echo "var chart = new google.visualization.PieChart(document.getElementById('piechart'));";
  echo "chart.draw(data, options);";
  echo "}";
  echo "</script>";
} else {
  echo "No statistics found.";
}

// Close the database connection
$conn->close();
?>
