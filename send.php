<?php
include "connect.php";

// Assuming you have a way to identify the current user, e.g., using a session
session_start();

// Check if the user is authenticated
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Insert data into the messages table with the current user's user_id
        $stmt = $con->prepare("INSERT INTO messages (user_id, name, email, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $name, $email, $message]);

        // Fetch the number of the current user from the number table
        
            header("Location: index.php?status=success");
            exit();
        
            // Redirect to the home page or display an error message if the user's number is not foun
        }
    } else {
        // Redirect to the home page or display an error message if the form is not submitted via POST
        header("Location: index.php?status=error");
        exit();
    }
?>
