<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dollar Managment System</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column align-items-center justify-content-center">

    <div class="pt-5 fs-2 fw-semibold">
        <p>LOGIN</p>
    </div>

    <div class="container-fluid m-auto d-flex justify-content-center align-items-center  mt-5">
        <div class="container d-flex justify-content-center align-items-center ">
            <form action="" method="POST" class="w-sm-100 w-md-25 w-lg-25  p-4 border rounded shadow">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" title="Enter your email"  required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" title="Enter your password" required class="form-control" id="exampleInputPassword1">
                </div>
                <a style="font-size: 0.8rem;" class="" href="forgotPassword.php">Forgot Password ?</a> <br><br>
                <button type="submit" name="login" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>


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
    $user_id = $row_data['user_id'];
    $user_name = $row_data['username'];
    $user_email = $row_data['email'];
    // $rowData = mysqli_fetch_assoc($rowCount);


    if($rowCount>0){
        $_SESSION['username'] = $user_name;
        $_SESSION['email'] = $useremail;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['login'] = true;
        // echo $_SESSION['user_id'];
        if($rowCount==1){
            // echo "<script>alert('Login successful')</script>";
            // echo "<script>window.open('form.php','_self')</script>";
            if(isset($_SESSION['login'])){
                echo "<script>alert('Login successful')</script>";
                header("Location: form.php");
            } 
        }else{
            echo "<script>alert('Invalid password')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
        header("Location: index.php");

    }
}


?>