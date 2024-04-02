<?php
include('../include/db.php');
if(isset($_POST['submit'])){
    $student_id=$_POST['student_id'];
    $name=$_POST['name'];
    // $designation=$_POST['designation'];
    // $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    // $encpass=password_hash($password,PASSWORD_BCRYPT);
    // $role=$_POST['role'];

    $sql=" insert into `student`(student_id,name,password)   values('$student_id','$name','$password')";   
    $result=mysqli_query($db,$sql);
    if($result){
       // echo "data inserted succesfully";
       header('location:display.php'); 
    }
    else{
        die(mysqli_error($db));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
    <title>MECS - CONNECTX</title>
</head>

<body>
    <div class="container my-5">
        <h1>ADD STUDENT</h1>
        <form method="post">
            <div class="form-group">
                <label>Student ID</label>
                <input type="text" class="form-control" placeholder="Enter your ID" name="student_id">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" placeholder="Enter your password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
