<?php
session_start();
include 'connect.php';  // Assuming you want to use the same database connection
include 'Includes/templates/loginheader.php';
include 'Includes/templates/loginnavbar.php';
include 'Includes/functions/functions.php';

// Initialize error message
$error_message = '';

// Check if the form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Retrieve user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Your authentication logic here
    $query = "SELECT * FROM users WHERE email = :email AND password = :password";

    try {
        // Prepare the query
        $stmt = $con->prepare($query);

        // Bind parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Execute the query
        $stmt->execute();

        // Check if there is a matching user
        if ($stmt->rowCount() > 0) {
            // User is authenticated, set session variables and redirect
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if account is verified
            if (empty($user['code'])) {
                logUserActivity($_SESSION['user_id'], 'Logged In');

                // Set session variables
                $_SESSION["user_id"] = $user["id"]; // Use "Id" as the session variable
                $_SESSION["user_name"] = $user["name"];

                // Redirect based on user type
                if ($user['user_type'] === 'user') {
                    header("Location: index.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                $error_message= "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        } else {
            // Authentication failed, set error message
            $error_message = "Invalid email or password";
        }
    } catch (PDOException $ex) {
        // Handle query execution error
        $error_message = "Error executing the query: " . $ex->getMessage();
    }
}

// Check if verification code is present in the URL
if (isset($_GET['verification'])) {
    $verificationCode = $_GET['verification'];

    // Check if the verification code exists in the database
    $verificationQuery = "SELECT * FROM users WHERE code=:code";
    $verificationStmt = $con->prepare($verificationQuery);

    try {
        // Bind parameters
        $verificationStmt->bindParam(':code', $verificationCode);

        // Execute the query
        $verificationStmt->execute();

        // Check if a matching user is found
        if ($verificationStmt->rowCount() > 0) {
            // Update the user record to mark verification as completed
            $updateQuery = "UPDATE users SET code='' WHERE code=:code";
            $updateStmt = $con->prepare($updateQuery);

            // Bind parameters
            $updateStmt->bindParam(':code', $verificationCode);

            // Execute the update query
            $updateStmt->execute();

            $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
        } else {
            // Redirect to the homepage if verification code is not valid
            header("Location: index.php");
            exit();
        }
    } catch (PDOException $ex) {
        // Handle query execution error
        $error_message = "Error executing the verification query: " . $ex->getMessage();
    }
}
?>


<!-- LOGIN SECTION -->

<section class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="login_form">
                    <h2>Login</h2>
                    <?php
                    // Display error message if authentication failed
                    if (!empty($error_message)) {
                        echo '<p class="error-message">' . $error_message . '</p>';
                    }
                    ?>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="submit" name="login">Login</button>
                        </div>
                    </form>
                    <p>Don't have an account yet? <a href="register.php">Register Here</a></p>
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

    input {
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
