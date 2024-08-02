<?php  include ('phpScript/dbconnect.php')  ?>

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
                    $edit_sql = "SELECT * FROM `transectionrecord` WHERE trid = $eid";
                    $result = mysqli_query($conn, $edit_sql);
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['trid'];
                    $fullname = $row['FullName'];
                    $OpeningBalance = $row['OpeningBalance'];
                    $ClientName = $row['ClientName'];
                    $ClientID = $row['ClientID'];
                    $SentDollar = $row['SentDollar'];
                    $SentDollarDate = $row['SentDollarDate'];
                    $TotalINR = $row['TotalINR'];
                    $RecCash = $row['RecCash'];
                    $CashClientName = $row['CashClientName'];
                    $AmountTransfer = $row['AmountTransfer'];
                    $TransferTo = $row['TransferTo'];
                    $Descrip = $row['Descrip'];
                    $BalanceinINR = $row['BalanceinINR'];
                    $ClosingBalance = $row['ClosingBalance'];
                    }
                ?>
                <div class="col-md-4">
                    <label for="inputName4" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $fullname ?>"
                        id="inputName4">
                </div>
                <div class="col-md-4">
                    <label for="inputRecievedAmount4" class="form-label">Opening Dollar</label>
                    <input type="text" name="opdollar" class="form-control" value="<?php echo $OpeningBalance ?>"
                        id="openingBalance">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Client Name</label>
                    <input type="text" name="clientname" class="form-control" value="<?php echo $ClientName ?>" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Client ID No.</label>
                    <input type="text" name="clientid" class="form-control" value="<?php echo $ClientID ?>" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Dollar Sent</label>
                    <input type="text" name="dollarsent" class="form-control"
                        onkeyup="minus(this.value)" value="<?php echo $SentDollar ?>" id="inputDollarSent">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Dollar Sent Date</label>
                    <input type="date" name="dsdate" class="form-control" value="<?php echo $row['SentDollarDate'] ?>" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Total Amount in INR</label>
                    <input type="number" name="tainINR" class="form-control" value="<?php echo $TotalINR ?>" id="amountininr">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Cash Received From Client</label>
                    <input type="number" name="crfclient" class="form-control" value="<?php echo $RecCash ?>" id="receivedcash">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Client Name Cash Received From </label>
                    <input type="text" name="clientncrf" class="form-control" value="<?php echo $CashClientName ?>" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Amount Transferred </label>
                    <input type="number" name="amounttrf" class="form-control" value="<?php echo $AmountTransfer ?>" 
                        id="transferamount">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Amount Transferred to </label>
                    <input type="text" name="amounttrftoname" class="form-control" value="<?php echo $TransferTo ?>" id="amountTransfer">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Description </label>
                    <input type="text" name="description" class="form-control" value="<?php echo $Descrip ?>" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">INR. Balance From Client </label>
                    <input type="number" name="balanceinINR" class="form-control" value="<?php echo $BalanceinINR ?>" id="inrbalance">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Dollar Total Balance </label>
                    <input type="number" name="totalbalance" class="form-control" value="<?php echo $ClosingBalance ?>" 
                        id="TotalBalance">
                </div>
                <div class="col-12">
                    <button type="submit" name="update" class="btn btn-primary px-4">Update</button>
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

if(isset($_POST['update'])){
    if(!isset($_SESSION['login'])){
        echo "<script>alert('Login frist to update the record.')</script>";
    }else {
$name            = $_POST['name'];
$opdollar        = $_POST['opdollar'];
$clientname      = $_POST['clientname'];
$clientid        = $_POST['clientid'];
$dollarsent      = $_POST['dollarsent'];
$dsdate          = $_POST['dsdate'];
$tainINR         = $_POST['tainINR'];
$crfclient       = $_POST['crfclient'];
$clientncrf      = $_POST['clientncrf'];
$amounttrf       = $_POST['amounttrf'];
$amounttrftoname = $_POST['amounttrftoname'];
$description     = $_POST['description'];
$balanceinINR    = $_POST['balanceinINR'];
$totalbalance    = $_POST['totalbalance'];

 if( $name == '' || $opdollar  == '' || $clientname  == '' || $clientid     == '' ||
  $dollarsent    == ''|| $dsdate    == ''|| $tainINR    == '' || $crfclient   == '' || $clientncrf  == '' || 
  $amounttrf   == '' || $amounttrftoname == ''|| $description   == ''|| $balanceinINR   == ''|| 
  $totalbalance  == ''  ){
    echo "<script>alert('All Fields are required')</script>";
 }else{
        $sql = "UPDATE `transectionrecord` SET FullName = '$name', OpeningBalance = '$opdollar', ClientName = '$clientname', ClientID='$clientid', 
        SentDollar='$dollarsent', SentDollarDate='$dsdate', TotalINR=$tainINR, RecCash='$crfclient', CashClientName='$clientncrf', AmountTransfer='$amounttrf', TransferTo='$amounttrftoname', 
        Descrip='$description', BalanceinINR='$balanceinINR', ClosingBalance='$totalbalance' WHERE TRID = $eid";

            $result_query = mysqli_query($conn, $sql);
            if($result_query){
                echo "<script>alert('Data Updated Successfully')</script>";
                echo "<script>window.open('allrecords.php','_self')</script>";
            }else{
                echo "<script>alert('Something went wrong')</script>";
            }
        }
    }
}



?>