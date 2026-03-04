<?php
require('tcpdf/tcpdf.php');

// Include your database connection file
include 'connect.php';

// Create a new PDF instance with landscape orientation
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Creator');
$pdf->SetAuthor('Your Author');
$pdf->SetTitle('Appointments Report');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Add a title
$pdf->Cell(0, 10, 'Appointments Report', 0, 1, 'C'); // Full-width cell with centered text

// Fetch data from the appointments table including the new "status" column
$query = "SELECT a.appointment_id, a.date_created, 
                 CONCAT(c.first_name, ' ', c.last_name) AS client_name, 
                 CONCAT(e.first_name, ' ', e.last_name) AS employee_name, 
                 a.start_time, a.end_time_expected, 
                 CASE 
                    WHEN a.canceled = 1 THEN 'N/A' 
                    WHEN NOW() < a.start_time THEN 'Upcoming' 
                    WHEN NOW() BETWEEN a.start_time AND a.end_time_expected THEN 'Ongoing' 
                    ELSE 'Finished' 
                 END AS status 
          FROM appointments a
          LEFT JOIN clients c ON a.client_id = c.client_id
          LEFT JOIN employees e ON a.employee_id = e.employee_id";

$result = $con->query($query);

if ($result->rowCount() > 0) {
    // Get column names from the database result, including the new "status" column
    $columns = array('appointment_id', 'date_created', 'client_name', 'employee_name', 'start_time', 'end_time_expected', 'status');

    // Add table header
    foreach ($columns as $column) {
        $pdf->Cell(40, 8, ucwords(str_replace('_', ' ', $column)), 1); // Format the column name
    }
    $pdf->Ln(); // Move to the next line

    // Add data rows including the new "status" column
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        foreach ($columns as $column) {
            $pdf->Cell(40, 8, $row[$column], 1);
        }
        $pdf->Ln(); // Move to the next line
    }
} else {
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'No appointments found.', 0, 1, 'C');
}

// Output PDF to the browser
$pdf->Output('appointments_report.pdf', 'I');
?>
