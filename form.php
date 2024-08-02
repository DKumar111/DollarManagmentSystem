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

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Playwrite+BE+VLG:wght@100..400&display=swap');
    </style>
    <style>
        body{
            background-image: url(https://static.vecteezy.com/system/resources/previews/000/570/746/non_2x/abstract-financial-chart-with-uptrend-line-graph-and-numbers-in-stock-market-on-gradient-white-color-background-vector.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .form-section{
            background: rgba(255, 255, 255, 0.6)
        }
    </style>

</head>

<body >

    <?php  include ('header_footer/header.php')   ?>

    <!-- form section -->
    <div class="container-fluid" style="padding-top: 1rem;">
        <div class="text-center pt-5 fs-1 fw-semibold">
            <p style="font-family: Playwrite België Vlaams Gewest;" class="jssheading text-black fw-semibold text-uppercase">JSS Dollar
                Tracking System</p>
        </div>
        <div class="container text-center  py-5">
            <form class="row form-section g-3 border rounded bg-white  shadow p-3" action="" method="POST">

                <?php

                    if(isset($_SESSION['user_id'])){
                        $uid = $_POST['user_id'];
                        $sql = "SELECT * FROM adminuser WHERE user_id = $uid";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $fname = $row['FirstName'];
                            $lname = $row['LastName'];
                            $ReceivedDate = $row['ReceivedDate'];
                            $TotalAmount = $row['TotalAmount'];
                        }
                    }
                    $sumsql = "SELECT SUM(SentDollar) AS count FROM transectionrecord";
                    $sumresult = mysqli_query($conn, $sumsql);
                    if($sumresult) {
                        $row = mysqli_fetch_assoc($sumresult);
                        $totalsum = $row['count'];
                        $lastBalance = $TotalAmount - $totalsum;
                    }
                    }
                ?>
                <div class="col-md-4">
                    <label for="inputName4" class="form-label">Choose One Option <span class="text-danger fw-bold">*</span></label>
                    <select class="form-select" name="name" id="selectName"
                        aria-label="Default select example">
                        <option selected>Select Option</option>
                        <?php
                            $getuser = "SELECT * FROM `team_member`";
                            $result_query = mysqli_query($conn, $getuser);
                            while( $row = mysqli_fetch_assoc($result_query)){
                                $team_id = $row['team_ID'];
                                $member_name = $row['member_Name'];
                                echo " <option onclick='getmember(this.value)' value='$member_name'>$member_name</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputRecievedAmount4" class="form-label">Opening Dollar <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="opdollar" class="form-control "  id="openingBalance">
                </div>
                <div class="col-md-4">
                    <label for="inputAddFunds" class="form-label">Add Funds</label>
                    <input type="text" name="addfunds" class="form-control"  id="addfunds">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Leader Name <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="clientname" class="form-control" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">ROBO ID <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="clientid" class="form-control" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Dollar Sent <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="dollarsent" class="form-control" onkeyup="minus(this.value)"
                        id="inputDollarSent">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Date <span class="text-danger fw-bold">*</span></label>
                    <input type="date" name="dsdate" class="form-control" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Total INR. <span class="text-danger fw-bold">*</span></label>
                    <input type="number" name="tainINR" class="form-control" id="amountininr">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Total Cash <span class="text-danger fw-bold">*</span></label>
                    <input type="number" name="crfclient" class="form-control" id="receivedcash">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Cash Revciever <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="clientncrf" class="form-control" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Account Transfer <span class="text-danger fw-bold">*</span> </label>
                    <input type="number" name="amounttrf" class="form-control" onkeyup="TransfAmt(this.value)"
                        id="transferamount">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Account Transfer Name <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="amounttrftoname" class="form-control" id="amountTransfer">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Remark <span class="text-danger fw-bold">*</span> </label>
                    <input type="text" name="description" class="form-control" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Total Balance INR. <span class="text-danger fw-bold">*</span> </label>
                    <input type="number" name="balanceinINR" class="form-control" id="inrbalance">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Dollar Balance <span class="text-danger fw-bold">*</span> </label>
                    <input type="number" name="totalbalance" class="form-control" value="" id="TotalBalance">
                </div>
                <div class="col-3">
                    <input type="reset" class="btn btn-primary shadow px-4" id="refreshpage" value="Reset">
                </div>
                <div class="col-12">
                    <button type="submit" name="save shadow" class="btn btn-primary px-4">Save</button>
                </div>
            </form>
            <!-- <div class="col-md-4 ms-auto pt-5">
                <label for="" class="form-label">Dollar Closing Balance </label>
                <input type="number" class="form-control" value="<?php echo $lastBalance ?>" id="ClosingDollar">
            </div> -->
        </div>
    </div>
    <!-- /form section -->

    <?php  include ('header_footer/footer.php')   ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script>
    $(document).ready(function() {
        $("#selectName").on('change', function() {
            let countryid = $(this).val();

            $.ajax({
                url: "phpScript/response.php",
                method: "POST",
                data: {
                    id: countryid
                },
                success: function(data) {
                    $("#openingBalance").val(data);

                }
            });
        });
    })
    </script>
</body>

</html>

<?php

    
if(isset($_POST['save'])){
    if(!isset($_SESSION['login'])){
        echo "<script>alert('Please login first to insert data')</script>";
    }else{
         
    $name           = $_POST['name'];
    $opdollar        = $_POST['opdollar'];
    $addfunds        = $_POST['addfunds'];
    $clientname      = $_POST['clientname'];
    $clientid        = $_POST['clientid'];
    $dollarsent      = $_POST['dollarsent'];
    $dsdate         = $_POST['dsdate'];
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
        $sql = "INSERT INTO `transectionrecord`( `FullName`, `OpeningBalance`, `AddFunds`, `ClientName`, `ClientID`, 
        `SentDollar`, `SentDollarDate`, `TotalINR`, `RecCash`, `CashClientName`, `AmountTransfer`, `TransferTo`, 
        `Descrip`, `BalanceinINR`, `ClosingBalance`) VALUES('$name', '$opdollar', '$addfunds', '$clientname', '$clientid', 
        '$dollarsent', '$dsdate', '$tainINR', '$crfclient', '$clientncrf', '$amounttrf', '$amounttrftoname', '$description',
        '$balanceinINR', '$totalbalance')";
            $result_query = mysqli_query($conn, $sql);
            if($result_query){
                echo "<script>alert('Successfully Saved')</script>";
            }else{
                echo "<script>alert('Something went wrong')</script>";
            }
        }
    }
}
    



?>