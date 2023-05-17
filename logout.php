<?php
// Start session
session_start();

// Unset session variables
session_unset();

// Destroy session
session_destroy();

// Redirect to home page
header("Location: demo2.php?msg=logout_success");
exit();
?>
