<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['register-button'])) {
    header('Location: register.php');
    exit();
}

include 'connect.php'; // Include your database connection file

// Function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Retrieve user input
$username = test_input($_POST['username']);
$email = test_input($_POST['email']);
$full_name = test_input($_POST['full_name']);
$password = test_input($_POST['password']);
$confirm_password = test_input($_POST['confirm_password']);

// Validate the password match
if ($password != $confirm_password) {
    $_SESSION['registration_error'] = 'Passwords do not match!';
    header('Location: register.php');
    exit();
}

// Hash the password
$hashedPass = sha1($password);

// Insert data into the database
$stmt = $con->prepare("INSERT INTO barber_admin (username, email, full_name, password) VALUES (?, ?, ?, ?)");
$stmt->execute(array($username, $email, $full_name, $hashedPass));

// Set session variables
$_SESSION['username_barbershop_Xw211qAAsq4'] = $username;
$_SESSION['password_barbershop_Xw211qAAsq4'] = $password;
$_SESSION['admin_id_barbershop_Xw211qAAsq4'] = $con->lastInsertId();

header('Location: login.php');
exit();
?>
