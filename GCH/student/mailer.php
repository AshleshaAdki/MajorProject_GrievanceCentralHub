<?php
require 'PHPMailerAutoload.php';

if (isset($_POST['submit'])) {
    // Retrieve user's email from session
    $userEmail = $_SESSION['login'];

    // Retrieve user's name from the session if needed
    $userName = $_SESSION['name'];

    // Retrieve the user's ID from the session if needed
    $userId = $_SESSION['id'];

    // Get recipient email based on the user's email
    $query = mysqli_query($db, "SELECT email FROM student WHERE email='$userEmail'");
    $row = mysqli_fetch_assoc($query);
    $to = $row['email'];

    if (empty($to)) {
        echo "Error: Recipient email not found.";
        exit();
    }

    $subject = "New Grievance Filed by $userName (User ID: $userId)";

    $message = "Dear $userName,\n\n";
    $message .= "A new grievance has been filed:\n\n";
    $message .= "Grievance Type: " . $_POST['grievance'] . "\n";
    $message .= "Complaint Details: " . $_POST['complain'] . "\n";
    $message .= "Is Anonymous: " . (isset($_POST['anonymoususer']) ? "Yes" : "No") . "\n";

    // Create a new PHPMailer instance
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tsamanwith@gmail.com'; // your Gmail account username
    $mail->Password = 'afijeeqiblhbzheb'; // your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; // Gmail SMTP port

    // Sender and recipient
    $mail->setFrom('tsamanwith@gmail.com', 'Matrusri-ConnectX');
    $mail->addAddress($to, $userEmail);

    // Email content
    $mail->Subject = $subject;
    $mail->Body = $message;

    try {
        if ($mail->send()) {
            echo "Email sent successfully!";
        } else {
            echo "Error sending email: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
}
?>
