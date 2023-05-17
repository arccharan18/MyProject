<?php
// Start session
session_start();

// Check if user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: profilestat.php");
    exit();
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to database
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "#ramcharan183";
    $dbname = "demo";
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the user exists in the database
    $sql = "SELECT * FROM regdemo2 WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful, set session variable and redirect to profile page
        $_SESSION['username'] = $username;
        mysqli_close($conn);
        echo "<meta http-equiv='refresh' content='0;url=profilestat.php'>";
        exit();
    } else {
        // Login failed, show error message
        $error = "Invalid username or password";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="login.css">
    <title>Sign up</title>
</head>
<body scroll="no" style="overflow:hidden">
    <header class="showcase">
        <div class="logo">
            <img src="nit-logo.png">
        </div>
        <div class="showcase-content">
            <div class="formm">
                <form method="POST" action="login.php">
                    <h1>Sign In</h1>
                    <div class="info">
                        <input class="email" type="text" name="username" placeholder="Username"> <br>
                        <input class="email" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="btn">
                        <button class="btn-primary" type="submit">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="signup">
                <p>Not yet Registered?</p>
                <a href="registration.php">Sign up now</a>
            </div>

        </div>
    </header>
</body>
</html>