<!-- registration.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="registration.css">
	<title>Registration</title>
</head>
<body>
<header class="showcase">    
    <div class="logo">
        <img src="nit-logo.png">
    </div>
    <div class="showcase-content">
        <div class="formm">
            <h1>Registration</h1>
            <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <p><?php echo $_GET['error']; ?></p>
                </div>
            <?php } ?>
            <form method="POST" action="submit_reg.php">
    <div class="info">
    <input class="email" type="text" name="name" placeholder="Username" required><br>
<input class="email" type="number" maxlength="2" name="age" placeholder="Age" required><br>
<input class="email" type="email" name="email" placeholder="Email" required><br>
<input class="email" type="tel" maxlength="10" name="number" placeholder="Mobile Number" required><br>
<input class="email" type="text" name="farmingtype" placeholder="Farming Type" required><br>
<input class="email" type="text" name="ownlease" placeholder="Own/Lease" required><br>
<input class="email" type="text" name="address" placeholder="Address" required><br>
<input class="email" type="text" name="experience" placeholder="Experience in field" required><br>
<input class="email" type="password" name="password" placeholder="Password" required><br>

       </div>
    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</header>
</body>
</html>