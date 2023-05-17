<?php
// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '#ramcharan183';
$dbname = 'demo';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the input data from the form
$username = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$number = $_POST['number'];
$farmingtype = $_POST['farmingtype'];
$ownlease = $_POST['ownlease'];
$address = $_POST['address'];
$experience = $_POST['experience'];
$password = $_POST['password'];

// Prepare the SQL statement to insert the data into the table
$sql = "INSERT INTO regdemo2 (username, age, email, number, farmingtype, ownlease, address, experience, password)
VALUES ('$username', '$age', '$email', '$number', '$farmingtype', '$ownlease', '$address', '$experience', '$password')";

// Execute the SQL statement and check for errors
if (mysqli_query($conn, $sql)) {
    // Registration successful, display success message
    echo '<div style="background-color: skyblue; color: white; padding: 10px;">';
    echo 'You are successfully registered!';
    echo '<br><br><a href="demo2.php">Back to Home</a>';
    echo '</div>';
} else {
    // Registration unsuccessful, display error message
    echo '<div style="background-color: red; color: white; padding: 10px;">';
    echo 'Error: ' . mysqli_error($conn);
    echo '</div>';
}



// Close database connection
mysqli_close($conn);
?>

