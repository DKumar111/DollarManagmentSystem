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
        <!-- header -->
            <!-- header -->
   <div class="container-fluid  position-sticky top-0">
       <div class="container bg-primary bg-gradient rounded-4 mt-3 shadow">
           <nav class="navbar navbar-expand-lg ">
               <div class="container-fluid">
                   <a style="width:70px; height:70px;"
                       class="navbar-brand shadow border border-primary bg-gradient d-flex justify-content-center rounded-circle" href="form.php">
                       <img src="img/logo.png" class="img-fluid" alt="">
                   </a>
                   <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                       data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                       aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                           <li class="nav-item">
                               <a class="nav-link text-uppercase text-white fw-semibold active" aria-current="page" href="form.php">Home</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link text-uppercase text-white fw-semibold active" aria-current="page" href="AlldollarRecieved.php">All Records</a>
                           </li>
                       </ul>
                       <!-- <a class="text-white text-decoration-none fw-semibold pe-4" href="dollarRecieved.php">DOLLAR RECIEVED</a> -->
                       <!-- Button trigger modal -->
                       <?php
                            if(!isset($_SESSION['login'])){
                                echo '
                                 <a href="index.php" class="btn text-primary rounded-pill text-uppercase fw-semibold bg-white">
                                    LogIn
                                </a>
                                ';
                            }else{
                                echo '
                                <a href="logout.php" class="btn text-primary rounded-pill text-uppercase fw-semibold bg-white">
                                  logout
                                </a>
                                ';
                            }
                       ?>
                   </div>
               </div>
           </nav>
       </div>
   </div>
   <!-- /header -->
        <!-- /header -->
    <?php  //include ('header_footer/header.php')   ?>

    <!-- form section -->
    <div class="container-fluid" style="padding-top: 1rem;">
        <div class="text-center pt-5 fs-1 fw-semibold">
            <!-- <p style="font-family: Playwrite België Vlaams Gewest;" class="jssheading text-black fw-semibold text-uppercase">JSS Dollar
                Tracking System</p> -->
                <p>DOLLAR RECIEVED</p>
        </div>
        <!-- <div class=" container "><a class="text-decoration-none fw-semibold" href="AlldollarRecieved.php">See ALL Records for dollar recieved</a></div> -->
        <div class="container text-center  py-5">
            <form class="row form-section g-3 border rounded bg-white  shadow p-3" action="" method="POST">

                <?php

                    if(isset($_SESSION['user_id'])){
                        $uid = $_SESSION['user_id'];
                        $sql = "SELECT * FROM `team_member` WHERE team_ID = $uid";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $fname = $row['member_Name'];
                            // $ReceivedDate = $row['ReceivedDate'];
                            // $TotalAmount = $row['TotalAmount'];
                        }
                    }
                    $sumsql = "SELECT SUM(SentDollar) AS count FROM transectionrecord";
                    $sumresult = mysqli_query($conn, $sumsql);
                    if($sumresult) {
                        $row = mysqli_fetch_assoc($sumresult);
                        $totalsum = $row['count'];
                        // $lastBalance = $TotalAmount - $totalsum;
                    }
                    }
                ?>
                
                <div class="col-md-4">
                    <label for="" class="form-label text-uppercase">Name <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="clientname" class="form-control" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label text-uppercase">Dollar Recieved <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="dollarsent" class="form-control" onkeyup="minus(this.value)"
                        id="inputDollarSent">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label text-uppercase">Remark <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="remark" class="form-control" id="inputDollarSent">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label text-uppercase">Date <span class="text-danger fw-bold">*</span></label>
                    <input type="date" name="dsdate" class="form-control" id="">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label text-uppercase">Total INR. <span class="text-danger fw-bold">*</span></label>
                    <input type="number" name="tainINR" class="form-control" id="amountininr">
                </div>
               
                <div class="col-12">
                    <button type="submit" name="save" class="btn btn-primary px-4">Save</button>
                </div>
            </form>
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
        echo "<script>window.open('index.php', '_self')</script>";
    }else{
         
    // $name           = $_POST['name'];
    // $opdollar        = $_POST['opdollar'];
    // $addfunds        = $_POST['addfunds'];
    $clientname      = $_POST['clientname'];
    // $clientid        = $_POST['clientid'];
    $dollarsent      = $_POST['dollarsent'];
    $remark      = $_POST['remark'];
    $dsdate         = $_POST['dsdate'];
    $tainINR         = $_POST['tainINR'];
    // $crfclient       = $_POST['crfclient'];
    // $clientncrf      = $_POST['clientncrf'];
    // $amounttrf       = $_POST['amounttrf'];
    // $amounttrftoname = $_POST['amounttrftoname'];
    // $description     = $_POST['description'];
    // $balanceinINR    = $_POST['balanceinINR'];
    // $totalbalance    = $_POST['totalbalance'];
    
     if( $clientname  == '' || $dollarsent    == ''|| $remark == '' || $dsdate    == '' || $tainINR    == '' ){
        echo "<script>alert('All Fields are required')</script>";
     }else{
        $sql = "INSERT INTO `dollarrecievedtable`( `Name`, `Dollar_Recieved`, `Remark`, `Recieved_Date`, 
        `Total_INR`)  VALUES ('$clientname','$dollarsent','$remark','$dsdate','$tainINR')";
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