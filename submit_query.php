<!-- submit_query.php -->
<?php
  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $query = $_POST['query'];

  // Connect to the MySQL database
  $servername = "localhost";
  $username = "root";
  $password = "#ramcharan183";
  $dbname = "demo";
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert the query into the database
  $sql = "INSERT INTO query (name, email, query) VALUES ('$name', '$email', '$query')";
  if ($conn->query($sql) === TRUE) {
    echo "Query submitted successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
?>
