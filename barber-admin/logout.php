<?php
// Start Session
session_start();

// Include necessary files
include 'connect.php';
include 'Includes/functions/functions.php'; 

// Log admin logout activity
logAdminActivity($_SESSION['admin_id_barbershop_Xw211qAAsq4'], 'Logged Out');

// Unset variables of session
session_unset();

// Destroy Session
session_destroy();

// Redirect to the login page
header('Location: login.php');
exit();
?>
