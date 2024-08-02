<?php

include ('phpScript/dbconnect.php') ;
session_start();
if(isset($_POST['login'])){
    $useremail = $_POST['email'];
    $password = $_POST['password'];

    $loginQuery = "SELECT * FROM `useradmin` WHERE email = '$useremail' AND password = '$password'";
    $result = mysqli_query($conn, $loginQuery);
    $rowCount = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_id = $row_data['AdminID'];
    $user_name = $row_data['FullName'];
    $user_email = $row_data['Email'];
    // $rowData = mysqli_fetch_assoc($rowCount);


    if($rowCount>0){
        $_SESSION['username'] = $user_name;
        $_SESSION['email'] = $useremail;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['login'] = true;
        echo $_SESSION['user_id'];
        if($rowCount==1){
            // echo "<script>alert('Login successful')</script>";
            // echo "<script>window.open('form.php','_self')</script>";
            if(isset($_SESSION['login'])){
                header("Location: form.php");
            }else{
                echo "<script>alert('Please login first')</script>";
            }
        }else{
            echo "<script>alert('Invalid password')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}


?>