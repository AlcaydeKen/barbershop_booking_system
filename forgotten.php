<?php
session_start();
include 'connect.php';
include 'Includes/templates/loginheader.php';
include 'Includes/templates/loginnavbar.php';
include 'Includes/functions/functions.php';

$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_password"])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the name and number match a user in the database
    $stmt_check_user = $con->prepare("SELECT * FROM users WHERE name = :name AND number = :number");
    $stmt_check_user->bindParam(':name', $name);
    $stmt_check_user->bindParam(':number', $number);
    $stmt_check_user->execute();

    if ($stmt_check_user->rowCount() > 0) {
        // User found, retrieve existing hashed password
        $user = $stmt_check_user->fetch(PDO::FETCH_ASSOC);
        $existing_hashed_password = $user['password'];

        // Check if the new password is different from the existing password
        if ($new_password !== $existing_hashed_password) {
            // Passwords do not match, update the password
            if ($new_password === $confirm_password) {
                // Passwords match, update the password in the database
                $stmt_update_password = $con->prepare("UPDATE users SET password = :password WHERE name = :name AND number = :number");
                $stmt_update_password->bindParam(':password', $new_password);
                $stmt_update_password->bindParam(':name', $name);
                $stmt_update_password->bindParam(':number', $number);
                $stmt_update_password->execute();

                

                $msg = "<div class='alert alert-success'>Password updated successfully.</div>";
            } else {
                $msg = "<div class='alert alert-danger'>New password and confirm password do not match.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>New password must be different from the old password.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Identity verification failed. Please check your name and number.</div>";
    }
}
?>

<!-- PASSWORD UPDATE SECTION -->

<section class="password_update_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="password_update_form">
                    <h2>Update Password</h2>
                    <?php
                    // Display update password message
                    if (!empty($msg)) {
                        echo '<p class="update-password-message">' . $msg . '</p>';
                    }
                    ?>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="number">Number:</label>
                            <input type="text" name="number" id="number" placeholder="Enter your number" maxlength="11" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password:</label>
                            <input type="password" name="new_password" id="new_password" placeholder="Enter new password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm new password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="submit" name="update_password">Update Password</button>
                        </div>
                    </form>
                    <p>Already have an account? <a href="login.php">Login Here</a></p>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- FOOTER  -->
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
<?php include "Includes/templates/footer.php"; ?>
