<?php  
include ('phpScript/dbconnect.php');  
session_start();
?>

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

<body>

    <?php  include ('header_footer/header.php')   ?>

    <!-- form section -->
    <div class="container-fluid">
        <div class="text-center pt-5 fs-1 fw-semibold">
            <p>JSS Dollar Tracking System</p>
        </div>
        <div class="container text-center py-5">
            <form class="row g-3 border rounded shadow p-3" action="" method="POST">
                
                <?php
                    if(isset($_GET['edtrid'])){
                    $eid = $_GET['edtrid'];
                    $edit_sql = "SELECT * FROM `dollarrecievedtable` WHERE Dollar_R_id = $eid";
                    $result = mysqli_query($conn, $edit_sql);
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['Dollar_R_id'];
                    $Name = $row['Name'];
                    $Dollar_Recieved = $row['Dollar_Recieved'];
                    $Recieved_Date = $row['Recieved_Date'];
                    $Total_INR = $row['Total_INR'];
                    }
                ?>
                <div class="col-md-4">
                    <label for="" class="form-label">Name <span class="text-danger fw-bold">*</span></label>
                    <input type="text"  name="clientname" value="<?php echo $Name ?>" class="form-control" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Dollar Recieved <span class="text-danger fw-bold">*</span></label>
                    <input type="text"  name="dollarrec" value="<?php echo $Dollar_Recieved ?>" class="form-control" onkeyup="minus(this.value)"
                        id="inputDollarSent">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Date <span class="text-danger fw-bold">*</span></label>
                    <input type="date"  name="dsdate" value="<?php echo $Recieved_Date ?>" class="form-control" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Total INR. <span class="text-danger fw-bold">*</span></label>
                    <input type="number"  name="tainINR" value="<?php echo $Total_INR ?>" class="form-control" id="amountininr">
                </div>
                <div class="col-12">
                    <button type="submit" name="updateDollar" class="btn btn-primary px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /form section -->

    <?php  include ('header_footer/footer.php')   ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
</body>

</html>

<?php

if(isset($_POST['updateDollar'])){
    if(!isset($_SESSION['login'])){
        echo "<script>alert('Login frist to update the record.')</script>";
    }else {
$clientname      = $_POST['clientname'];
$dollarrec       = $_POST['dollarrec'];
$dsdate          = $_POST['dsdate'];
$tainINR         = $_POST['tainINR'];

 if($clientname == '' || $dollarrec == ''|| $dsdate == ''|| $tainINR == ''){
    echo "<script>alert('All Fields are required')</script>";
 }else{
        $sql = "UPDATE `dollarrecievedtable` SET `Name`='$clientname',
        `Dollar_Recieved`='$dollarrec',`Recieved_Date`='$dsdate',`Total_INR`='$tainINR'  WHERE Dollar_R_id = $eid";

            $result_query = mysqli_query($conn, $sql);
            if($result_query){
                echo "<script>alert('Data Updated Successfully')</script>";
                echo "<script>window.open('AlldollarRecieved.php','_self')</script>";
            }else{
                echo "<script>alert('Something went wrong')</script>";
            }
        }
    }
}



?>