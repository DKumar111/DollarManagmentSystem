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

    <div class="container-fluid text-center mb-4" style="padding-top: 2rem;">

        <div class="text-center text-uppercase pt-2 text-info-emphasis fs-1 fw-semibold">
            <p>JSS Dollar Tracking System</p>
        </div>
        <div class="fs-4 fw-semibold text-uppercase">
            <p>All Records</p>
        </div>
        <div
            class="container me-0 flex-column flex-md-row flex-lg-row d-md-flex d-lg-flex text-center justify-content-start align-items-center col-12  ">
            <form action="result.php" method="GET" class="d-flex mt-4 justify-content-center align-items-start gap-2">
                <div class="mb-0">
                    <input type="search" onkeyup="showResult(this.value)" required title="Search by Name or Client ID"
                        class="form-control" name="searchText" value="<?php if(isset($_GET['searchText']))  ?>"
                        placeholder="Search here" id="exampleInputsearch1" aria-describedby="searchHelp">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <div class="container text-center">
                <form class=" justify-content-center " action="result.php" method="GET">
                    <div class="row text-center justify-content-start ">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>From Date</label>
                                <input type="date" required name="from_date"
                                    value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>To Date</label>
                                <input type="date" required name="to_date"
                                    value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="d-flex justify-content-start align-items-center  col ">
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="container pt-5 table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xxl "
            id="tableData">
            <table style="100%" class="table table-bordered align-middle border-secondary ">
                <thead class="table-dark">
                    <tr class="border">
                        <th class="align-middle" scope="col">S.NO.</th>
                        <th class="align-middle" scope="col">NAME</th>
                        <th class="align-middle" scope="col">OPENING BALANCE</th>
                        <th class="align-middle" scope="col">FUNDS ADDED</th>
                        <th class="align-middle" scope="col">CLIENT NAME</th>
                        <th class="align-middle" scope="col">CLIENT ID</th>
                        <th class="align-middle" scope="col">DOLLAR SENT</th>
                        <th class="align-middle" scope="col">DOLLAR SENT DATE</th>
                        <th class="align-middle" scope="col">AMOUNT IN INR</th>
                        <th class="align-middle" scope="col">CASH</th>
                        <th class="align-middle" scope="col">NAME</th>
                        <th class="align-middle" scope="col">ACCOUNT</th>
                        <th class="align-middle" scope="col">NAME</th>
                        <th class="align-middle" scope="col">DESCRIPTION</th>
                        <th class="align-middle" scope="col">BALANCE IN INR</th>
                        <th class="align-middle" scope="col">CLOSING BALANCE</th>
                        <th class="align-middle" colspan="2 scope=" col ">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $selectsql = "SELECT * FROM transectionrecord";
                        $result = mysqli_query($conn, $selectsql);
                        $number = 0;

                        while($row = mysqli_fetch_assoc($result)){
                            $name            = $row['FullName'];
                            $TRID            = $row['trid'];
                            $opdollar        = $row['OpeningBalance'];
                            $addfunds        = $row['AddFunds'];
                            $clientname      = $row['ClientName'];
                            $clientid        = $row['ClientID'];
                            $dollarsent      = $row['SentDollar'];
                            $dsdate          = $row['SentDollarDate'];
                            $tainINR         = $row['TotalINR'];
                            $crfclient       = $row['RecCash'];
                            $clientncrf      = $row['CashClientName'];
                            $amounttrf       = $row['AmountTransfer'];
                            $amounttrftoname = $row['TransferTo'];
                            $description     = $row['Descrip'];
                            $balanceinINR    = $row['BalanceinINR'];
                            $totalbalance    = $row['ClosingBalance'];
                            $number++;
                            echo "
                             <tr>
                                <th scope='row'>$number</th>
                                <td >$name</td>
                                <td >$opdollar</td>
                                <td >$addfunds</td>
                                <td >$clientname</td>
                                <td >$clientid</td>
                                <td >$dollarsent</td>
                                <td >$dsdate</td>
                                <td >$tainINR</td>
                                <td >$crfclient</td>
                                <td >$clientncrf</td>
                                <td >$amounttrf</td>
                                <td >$amounttrftoname</td>
                                <td >$description</td>
                                <td >$balanceinINR</td>
                                <td >$totalbalance</td>
                                <td >
                                <a class='text-success' href='update.php?edtrid=$TRID'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                      <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                      <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                    </svg>
                                </a>
                                </td>
                                <td >
                               <a class='text-danger' href='allrecords.php?dltrid=$TRID'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                      <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                      <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                                    </svg>
                                </a>
                                </td>
                            </tr>
                            ";
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <?php  include ('header_footer/footer.php')   ?>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                            crossorigin="anonymous">
                            </script>
                            <script src="jquery/jquery.min.js"></script>
                            <script src="js/main.js"></script>
</body>

</html>

<?php

if(isset($_GET['dltrid'])){
    $delete_property = $_GET['dltrid'];

    if(!isset($_SESSION['login'])){
        echo "<script>alert('login first')</script>";
    }else{
        $delete_property_query = "DELETE FROM `transectionrecord` WHERE TRID = $delete_property";
        $result_property_delete = mysqli_query($conn, $delete_property_query);
        if($result_property_delete){
            echo "<script>confirm('deleted successfully')</script>";
        }
    }
    
   
}

?>