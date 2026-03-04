<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: login.php");
    die();
}

// Load Composer's autoloader
require 'vendor/autoload.php';
include 'connect.php';
include 'Includes/templates/loginheader.php';
include 'Includes/templates/loginnavbar.php';
include 'Includes/functions/functions.php';

$msg = '';

// Check if the form is submitted for registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $code = md5(rand());
    $user_type = 'user';

    // Check if the email already exists using PDO
    $stmt_check_email = $con->prepare("SELECT * FROM users WHERE email = :email");
    $stmt_check_email->bindParam(':email', $email);
    $stmt_check_email->execute();

    if ($stmt_check_email->rowCount() > 0) {
        $msg = "<div class='alert alert-danger'>{$email} - This email address already exists.</div>";
    } else {
        $query = "INSERT INTO users (name, email, number, password, address, user_type, code) VALUES (:name, :email, :number, :password, :address, :user_type, :code)";

        try {
            // Prepare the query
            $stmt = $con->prepare($query);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':number', $number);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':user_type', $user_type);
            $stmt->bindParam(':code', $code);

            // Execute the query
            $stmt->execute();
            logUserActivity($con->lastInsertId(), 'Successfully Registered');

            // Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            // Comment out or remove the following line to disable debug output
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username ='barbershop.verify@gmail.com'; // Replace with your Gmail username
            $mail->Password = 'uwlr adrc vfaz cilv'; // Replace with your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipients
            $mail->setFrom('barbershop.verify@gmail.com'); // Replace with your Gmail username
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'no reply';
            $verificationLink = 'http://localhost/barber/verification.php?code=' . $code;
            $mail->Body = 'Here is the verification link <b><a href="' . $verificationLink . '">' . $verificationLink . '</a></b>';

            $mail->send();
     

            $error_message= "<div class='alert alert-info'>We've sent a verification link to your email address.</div>";
        } catch (Exception $e) {
            $error_message = "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
        }
    }
}
?>
<!-- REGISTRATION SECTION -->

<section class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="login_form">
                    <h2>Register</h2>
                    <?php
                    // Display error message if registration fails
                    if (!empty($error_message)) {
                        echo '<p class="error-message">' . $error_message . '</p>';
                    }
                    ?>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="number">Number:</label>
                            <input type="text" name="number" id="number" placeholder="Enter your number" maxlength="11" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" id="address" placeholder="Enter your address" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="submit" name="register">Register</button>
                        </div>
                    </form>
                    <p>Already have an account? <a href="login.php">Login Here</a></p>
                    <p><a href="forgotten.php">Forgotten Password?</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .login_section {
        text-align: center;
        margin-top: 100px;
        margin-bottom: 120px;
    }

    .login_form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input,
    textarea {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .error-message {
        color: #e74c3c;
        margin-top: 10px;
    }

    .login_form button {
        background-color: #9e8a78;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .login_form button:hover {
        background-color: #7b6a59;
    }

    .login_form .error-message {
        color: #e74c3c;
        margin-top: 10px;
    }
</style>

<!-- WIDGET SECTION / FOOTER -->

<section class="widget_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer_widget">
                    <img src="Design/images/barbershop_logo.png" alt="Brand">
                    <p>
                        Our barbershop is the created for men who appreciate premium quality, time and flawless look.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer_widget">
                    <h3>Headquarters</h3>
                    <p>
                        123 Biga, Silang, Cavite
                    </p>
                    <p>
                        contact@barbershop.com
                        <br>
                        (+63) 912 324 5555
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer_widget">
                    <h3>
                        Opening Hours
                    </h3>
                    <ul class="opening_time">
                            <li>Mon / Thurs 8:30am - 5:30pm</li>
                            <li>Tues / Fri  9:30am - 6:30pm</li>
                            <li>Wed / Sat   10:30am - 7:30pm</li>
                            <li>Sun         10:00am - 5:00pm</li>
                        </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer_widget">
                    <h3>
                     Visit us
                    </h3>
                    <ul class="opening_time">
                        <li>Crafting Confidence, One Cut at a Time – Welcome to Tholitez</li>
                        <li>Where Style Meets Precision</li>
                       <li> Every Cut, Every Time</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FOOTER  -->

<?php include "Includes/templates/footer.php"; ?>
