<?php
include('../include/db.php');
if(isset($_GET['deleteid'])){
    $student_id=$_GET['deleteid'];

   // echo "$id";
    $sql="delete from `student` where student_id='$student_id'";
    $result=mysqli_query($db,$sql);
    if($result){
       // echo "deleted succesfully";
       header('location:display.php');
    }
    else{
        die(mysqli_error($db)); 
    }
}
?>