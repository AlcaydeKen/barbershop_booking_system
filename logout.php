<?php
session_start();
include 'connect.php';
include 'Includes/functions/functions.php'; 
logUserActivity($_SESSION['user_id'], 'Logged Out');
session_unset();
session_destroy();
header('Location: index.php'); // Redirect to the home page after logout
exit();
?>
