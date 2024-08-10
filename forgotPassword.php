<?php
include ('phpScript/dbconnect.php') ;
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column align-items-center justify-content-center">

    <div class="pt-5 fs-2 fw-semibold">
        <p>RESET PASSWORD</p>
    </div>
    <div class="container-fluid m-auto d-flex justify-content-center align-items-center  mt-5">
        <div class="container d-flex justify-content-center align-items-center ">
            <form action="" method="POST" class="w-sm-100 w-md-25 w-lg-25  p-4 border rounded shadow">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Enter your email</label>
                    <input type="email" name="email" required class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <input type="password" name="password" title="Must contain one uppercase and one lowercase one number between 0-9" required class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" title="Must contain one uppercase and one lowercase one number between 0-9" required class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

<?php

if(isset($_POST['reset'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password != $confirm_password){
        echo "<script>alert('Password does not match')</script>";
    }else {
        $sql = "SELECT * FROM `useradmin` ";
        $resul_sql = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($resul_sql)) {
            $useremail = $row['email'];

            if($useremail != $email){
                echo "<script>alert('Provided email not registered')</script>";
            }else {
                $updat_pwd = "UPDATE `useradmin` SET `password`='$password'  WHERE email = '$email'";
            $result = mysqli_query($conn, $updat_pwd);
            if($result){
                echo "<script>alert('Password Reset Successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }else {
                echo "<script>alert('Email not registered )</script>";
            }
            }
        }
    }
}

?>