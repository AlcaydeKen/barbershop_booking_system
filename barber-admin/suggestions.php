<?php
    session_start();

    // Page Title
    $pageTitle = 'Messages';

    // Includes
    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

    // Check if the user is already logged in
    if (isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4'])) {
        logAdminActivity($_SESSION['admin_id_barbershop_Xw211qAAsq4'], 'Opened Messages Dashboard');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Messages</h1>
            </div>

            <!-- Messages Table -->
            <?php
                $stmt = $con->prepare("SELECT * FROM messages");
                $stmt->execute();
                $rows_messages = $stmt->fetchAll(); 
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Messages</h6>
                </div>
                <div class="card-body">
                    
                    <!-- Messages Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID#</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($rows_messages as $message)
                                    {
                                        echo "<tr>";
                                            echo "<td>";
                                                echo $message['id'];
                                            echo "</td>";
                                            echo "<td>";
                                                echo $message['name']; // Replace with the actual column name in your 'messages' table
                                            echo "</td>";
                                            echo "<td>";
                                                echo $message['message'];
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  
<?php 
        // Include Footer
        include 'Includes/templates/footer.php';
    }
    else {
        header('Location: login.php');
        exit();
    }
?>
