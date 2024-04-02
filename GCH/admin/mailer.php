<?php
require 'PHPMailerAutoload.php';

// Check if form is submitted
if(isset($_POST['update'])) {
    // Retrieve complaint number from URL parameter
    $complaintNumber = $_GET['cid'];

    // Retrieve user's email from the student table based on the relationship with the complain table
    $query = mysqli_query($db, "SELECT s.email FROM student s
                                INNER JOIN complain c ON s.student_id = c.userId
                                WHERE c.complaintNumber='$complaintNumber'");
    
    $row = mysqli_fetch_assoc($query);
    $userEmail = $row['email'];

    if(empty($userEmail)) {
        echo "Error: User email not found.";
        exit();
    }

    // Get the updated status and remark from the form
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    $subject = "Complaint Status Update - Complaint Number: $complaintNumber";

    $message = "Dear User,\n\n";
    $message .= "Your complaint with Complaint Number $complaintNumber has been updated:\n\n";
    $message .= "Status: $status\n";
    $message .= "Remark: $remark\n\n";
    $message .= "Thank you for using our system.\n";

    // Initialize PHPMailer
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tsamanwith@gmail.com'; // your Gmail account username
    $mail->Password = 'afijeeqiblhbzheb'; // your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; // Gmail SMTP port

    $mail->setFrom('tsamanwith@gmail.com', 'Matrusri-ConnectX'); // Sender's email and name
    $mail->addAddress($userEmail); // Recipient's email
    $mail->Subject = $subject;
    $mail->Body = $message;

    try {
        if($mail->send()) {
            echo "Email sent successfully!";
        } else {
            echo "Error sending email: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
}
?>
