<?php

include('../include/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MECS - CONNECTX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #007bff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }

        .btn {
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .table {
            margin-top: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-primary,
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary.disabled,
        .btn-primary:disabled {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:not(:disabled):not(.disabled):active,
        .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus,
        .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>FACULTY DETAILS</h1>
        <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add Faculty</a></button>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
$sql="Select * from `academy`";
$result=mysqli_query($db,$sql);
if($result){
    
    while($row=mysqli_fetch_assoc($result)){
    $student_id= $row['student_id'];
    $name=$row['name'];
    $email=$row['email'];
    // $designation=$row['designation'];
    // $mobile=$row['mobile'];
    $password=$row['password'];
    // $role=$row['role'];
    echo '<tr>
    <th scope="row">'.$student_id.'</th>
    <td>'.$name.'</td>
    <td>'.$email.'</td>
    <td>'.$password.'</td>
    <td>
                <button class="btn btn-primary"><a href="update.php? updateid='.$student_id.'"
                class="text-light">update</a></button>
                </td>
  </tr>';
}
}

?>
            </tbody>
        </table>
    </div>
</body>
</html>
