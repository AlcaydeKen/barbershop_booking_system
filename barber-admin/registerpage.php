<?php
session_start();

// IF THE USER HAS ALREADY LOGGED IN
if (isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4'])) {
    header('Location: index.php');
    exit();
}

// ELSE
$pageTitle = 'Barber Admin Registration';
include 'connect.php';
include 'Includes/functions/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barber Admin Registration</title>
    <!-- FONTS FILE -->
    <link href="Design/fonts/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Nunito FONT FAMILY FILE -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- CSS FILES -->
    <link href="Design/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="Design/css/main.css" rel="stylesheet">
    
    <script>
        function validateRegistrationForm() {
            var fullname = document.forms["registration-form"]["full_name"].value;
            var email = document.forms["registration-form"]["email"].value;
            var username = document.forms["registration-form"]["username"].value;
            var password = document.forms["registration-form"]["password"].value;
            var confirmPassword = document.forms["registration-form"]["confirm_password"].value;

            // Check for empty fields
            if (fullname === "") {
                document.getElementById('required_fullname').style.display = 'block';
                return false;
            }

            if (email === "") {
                document.getElementById('required_email').style.display = 'block';
                return false;
            }

            if (username === "") {
                document.getElementById('required_username').style.display = 'block';
                return false;
            }

            if (password === "") {
                document.getElementById('required_password').style.display = 'block';
                return false;
            }

            if (confirmPassword === "") {
                document.getElementById('required_confirm_password').style.display = 'block';
                return false;
            }

            // Check if passwords match
            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="login">
        <form class="login-container validate-form" name="registration-form" method="POST" action="register.php"
              onsubmit="return validateRegistrationForm()">
            <span class="login100-form-title p-b-32">
                Barber Admin Registration
            </span>

            <!-- PHP SCRIPT WHEN SUBMIT -->

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register-button'])) {
                $username = test_input($_POST['username']);
                $email = test_input($_POST['email']);
                $fullname = test_input($_POST['full_name']);
                $password = test_input($_POST['password']);
                $confirm_password = test_input($_POST['confirm_password']);

                // Validate the password match
                if ($password != $confirm_password) {
                    ?>
                    <div class="alert alert-danger">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="messages">
                            <div>Passwords do not match!</div>
                        </div>
                    </div>
                    <?php
                } else {
                    $hashedPass = sha1($password);

                    // Insert data into the database
                    $stmt = $con->prepare("INSERT INTO barber_admin (username, email, fullname, password) VALUES (?, ?, ?, ?)");
                    $stmt->execute(array($username, $email, $fullname, $hashedPass));

                    $_SESSION['username_barbershop_Xw211qAAsq4'] = $username;
                    $_SESSION['password_barbershop_Xw211qAAsq4'] = $password;
                    $_SESSION['admin_id_barbershop_Xw211qAAsq4'] = $con->lastInsertId();
                    header('Location: index.php');
                    die();
                }
            }
            ?>

            <!-- FULLNAME INPUT -->
            <div class="form-input">
                <span class="txt1">Full Name</span>
                <input type="text" name="full_name" class="form-control" oninput="document.getElementById('required_fullname').style.display = 'none'" autocomplete="off">
                <span class="invalid-feedback" id="required_fullname" style="display: none;">Full Name is required!</span>
            </div>

            <!-- EMAIL INPUT -->
            <div class="form-input">
                <span class="txt1">Email</span>
                <input type="text" name="email" class="form-control" oninput="document.getElementById('required_email').style.display = 'none'" autocomplete="off">
                <span class="invalid-feedback" id="required_email" style="display: none;">Email is required!</span>
            </div>

            <!-- USERNAME INPUT -->
            <div class="form-input">
                <span class="txt1">Username</span>
                <input type="text" name="username" class="form-control" oninput="document.getElementById('required_username').style.display = 'none'" autocomplete="off">
                <span class="invalid-feedback" id="required_username" style="display: none;">Username is required!</span>
            </div>

            <!-- PASSWORD INPUT -->
            <div class="form-input">
                <span class="txt1">Password</span>
                <input type="password" name="password" class="form-control" oninput="document.getElementById('required_password').style.display = 'none'" autocomplete="new-password">
                <span class="invalid-feedback" id="required_password" style="display: none;">Password is required!</span>
            </div>

            <!-- CONFIRM PASSWORD INPUT -->
            <div class="form-input">
                <span class="txt1">Confirm Password</span>
                <input type="password" name="confirm_password" class="form-control" oninput="document.getElementById('required_confirm_password').style.display = 'none'" autocomplete="new-password">
                <span class="invalid-feedback" id="required_confirm_password" style="display: none;">Confirm Password is required!</span>
            </div>

            <!-- REGISTER BUTTON -->
            <p>
                <button type="submit" name="register-button">Register</button>
            </p>

            <!-- LOGIN LINK -->
            <span class="forgotPW">Already Have an Admin Account? <a href="login.php">Login Here.</a></span>
        </form>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Alcayde, Cruz, Dantis, Gabriel, Pacuan, Ronquillo</span><br>
                <span>BSIT 3D</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- INCLUDE JS SCRIPTS -->
    <script src="Design/js/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="Design/js/bootstrap.bundle.min.js"></script>
    <script src="Design/js/sb-admin-2.min.js"></script>
    <script src="Design/js/main.js"></script>
</body>
</html>
