<?php
// Include database connection code
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "sihh4"; // Replace with your database name

// Create a connection to the database
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $complaintNumber = $_POST['complaintNumber'];
    $newStatus = $_POST['status'];

    // Update status in the database
    $updateSql = "UPDATE facultycomplain SET status = '$newStatus' WHERE complaintNumber = '$complaintNumber'";
    $updateResult = mysqli_query($con, $updateSql);

    if ($updateResult) {
        // Successfully updated the status
        // Redirect back to the facultyGrievance.php page or display a success message
        header("Location: facultyGrievance.php");
        exit();
    } else {
        // Handle the case where the update failed
        // Display an error message or redirect back with an error flag
        header("Location: facultyGrievance.php?error=1");
        exit();
    }
}
?>