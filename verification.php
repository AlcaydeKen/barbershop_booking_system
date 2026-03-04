<?php

include 'connect.php'; // Include your database connection file

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Update the 'code' column to NULL in the database
    $stmt_update_code = $con->prepare("UPDATE users SET code = NULL WHERE code = :code");
    $stmt_update_code->bindParam(':code', $code);
    $stmt_update_code->execute();

    if ($stmt_update_code->rowCount() > 0) {
        echo 'Verification successful. Your account is now verified.';
        // Redirect the user to the login page with the specified anchor
        header("Location: http://localhost/barber/login.php#home-section");
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo 'Invalid verification code.';
        // You can handle the case where the verification code is invalid.
    }
} else {
    echo 'Invalid request.';
    // Handle the case where the code parameter is not present in the URL.
}
?>

