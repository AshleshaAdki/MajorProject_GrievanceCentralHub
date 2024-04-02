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

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        
        /* Add the following styles for table borders */
        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>STUDENT DETAILS</h1>
        <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add User</a></button>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "Select * from `student`";
                $result = mysqli_query($db, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $student_id = $row['student_id'];
                        $name = $row['name'];
                        $password = $row['password'];
                        echo '<tr>
                        <th scope="row">' . $student_id . '</th>
                        <td>' . $name . '</td>
                        <td>' . $password . '</td>
                        <td>
                        <button class="btn btn-primary"><a href="update.php?updateid=' . $student_id . '"
                        class="text-light">Update</a></button>
                        <button class="btn btn-danger"><a href="delete.php?deleteid=' . $student_id . '"
                        class="text-light">Delete</a></button>
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
