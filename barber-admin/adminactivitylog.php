<?php
session_start();

// Includes
include 'connect.php';
include 'Includes/functions/functions.php'; 
include 'Includes/templates/header.php';

// Check if the user is already logged in
if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
{

    $pageTitle = 'Activity Logs';

    logAdminActivity($_SESSION['admin_id_barbershop_Xw211qAAsq4'], 'Opened Admin Activity Log Dashboard');
    // Get the admin_id from the session
    $adminId = $_SESSION['admin_id_barbershop_Xw211qAAsq4'];

    // Fetch the admin's information based on admin_id
    $query = "SELECT * FROM barber_admin WHERE admin_id = :adminId";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if admin information is found
    if ($admin) {
        $adminUsername = $admin['username'];

        // Check if the clear button is clicked
        if (isset($_POST['clearLogs'])) {
            // Clear all logs from the admin_logs table
            $clearQuery = "DELETE FROM admin_logs";
            $con->query($clearQuery);
            
            // Log the activity for clearing logs
            logAdminActivity($adminId, 'Cleared Activity Logs');
        }

        // Display the page content
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Activity Logs</h1> <!-- Include the HTML title tag -->
                <form method="post">
                    <button type="submit" name="clearLogs" class="btn btn-danger btn-sm">Clear Logs</button>
                </form>
                <a href="generate.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Appointments
                </a>
            </div>

            <!-- Display Admin Logs Table -->
            <div class="table-responsive">
                <table class="table table-bordered" id="adminLogsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Admin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Retrieve admin logs using PDO with ordering by date in descending order
                        $query = "SELECT admin_logs.date, barber_admin.username AS admin_username, admin_logs.action 
                                  FROM admin_logs 
                                  JOIN barber_admin ON admin_logs.admin_id = barber_admin.admin_id 
                                  ORDER BY admin_logs.date DESC";
                        $stmt = $con->query($query);

                        // Loop through the results and display in the table
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>{$row['date']}</td>";
                            echo "<td>{$row['admin_username']}</td>"; // Display the admin's username
                            echo "<td>{$row['action']}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Include Footer -->
            <?php include 'Includes/templates/footer.php'; ?>
        </div>

        <!-- Include DataTables CSS and JS files -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                // Initialize DataTable with order option to display latest entries first
                $('#adminLogsTable').DataTable({
                    "order": [[0, "desc"]] // Column index 0 (Date) in descending order
                });
            });
        </script>
        <?php
    } else {
        // Handle the case where the admin information is not found
        echo "Admin information not found.";
    }
} else {
    // Log Unauthorized Access
    logActivity(null, null, 'Unauthorized Access', 'Tried to access Clients Page without logging in');
    header('Location: login.php');
    exit();
}
?>
