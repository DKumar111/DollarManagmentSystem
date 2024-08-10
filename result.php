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
    @media print {
        #download_Btn {
            display: none;
        }

        .searchresult {
            display: none;
        }

        .goback {
            display: none;
        }
    }
    </style>
</head>

<body>
    <button class="btn btn-white fw-semibold m-1 goback" onclick="history.back()">Go Back</button>
    <button class="btn btn-white fw-semibold" id="download_Btn">Print</button>
    <div id="content" class="container-fluid text-center">
        <div class="fs-2 fw-semibold ">
            <p class="searchresult">Searched Results</p>
        </div>
        <?php

if(isset($_GET['from_date']) && isset($_GET['to_date']))
{
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    $query = "SELECT * FROM `transectionrecord` WHERE SentDollarDate BETWEEN '$from_date' AND '$to_date' ";
    $result = mysqli_query($conn, $query);
$output = "";
if(mysqli_num_rows($result) > 0){
    $output = '<table id="example" class="table table-bordered align-middle border-dark">
                <thead class="table-dark">
                    <tr >
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">S.No.</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Client Name</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Client ID</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Dollar Sent</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Dollar Sent Date</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Amount in INR</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Cash</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Name</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Account</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Name</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Description</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Balamce in INR</th>
                    </tr>
                </thead>
                <tbody>
    '; 
            $number = 1;
    while($row = mysqli_fetch_assoc($result)){
        $output.="
      <tr >
                                <th style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$number}</th>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['ClientName']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['ClientID']}     </td>
                                <td class='senddollar' style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['SentDollar']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['SentDollarDate']}     </td>
                                <td class='totalinr' style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['TotalINR']}     </td>
                                <td class='cash' style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['RecCash']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['CashClientName']}     </td>
                                <td class='accountfr' style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['AmountTransfer']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['TransferTo']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['Descrip']}     </td>
                                <td class='balanceinr' style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['BalanceinINR']}     </td>
                            </tr>
                        </tbody>
        ";
        $number++;
    }
    
    $output .="
            <tfoot>
                    <tfoot>
                    <td class='fw-bold'>Total</td>
                    <td class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val2' class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val4' class='fw-bold'></td>
                    <td id='val5' class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val6' class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val3' class='fw-bold'></td>
                </tfoot>
                </tfoot>  
            </table>";

    mysqli_close($conn);

    echo $output;

}else{
    echo "<h2>No Record Found</h2>";
}
}elseif (isset($_GET['searchText'])) {
    $search = $_GET['searchText'];
    $search_value = trim($search);

$sql = "SELECT *  FROM `transectionrecord` WHERE ClientName LIKE '%{$search_value}%' OR ClientID LIKE '%{$search_value}%'";

$result = mysqli_query($conn, $sql) or die("SQL Query failed");
$output = "";
if(mysqli_num_rows($result) > 0){
    $output = '<table id="myTable" class="table table-bordered align-middle border border-dark ">
                <thead class="table-dark">
                    <tr>
                        <th class="align-middle" scope="col ">S.NO.</th>
                        <th class="align-middle" scope="col ">CLIENT NAME</th>
                        <th class="align-middle" scope="col ">CLIENT ID</th>
                        <th class="align-middle" scope="col ">DOLLAR SENT</th>
                        <th class="align-middle" scope="col ">DOLLAR SENT DATE</th>
                        <th class="align-middle" scope="col ">AMOUNT IN INR</th>
                        <th class="align-middle" scope="col ">CASH</th>
                        <th class="align-middle" scope="col ">NAME</th>
                        <th class="align-middle" scope="col ">ACCOUNT</th>
                        <th class="align-middle" scope="col ">NAME</th>
                        <th class="align-middle" scope="col ">DESCRIPTION</th>
                        <th class="align-middle" scope="col ">BALANCE IN INR</th>
                    </tr>
                </thead>
                <tbody>
    '; 
    $number=1;
    while($row = mysqli_fetch_assoc($result)){

        // $sumsql = "SELECT sum(SentDollar) AS sumdollar FROM `transectionrecord` WHERE FullName LIKE 
        // '%{$search_value}%' OR ClientName LIKE '%{$search_value}%' OR ClientID LIKE '%{$search_value}%'";
        // $sumresult = mysqli_query($conn, $sumsql);
        // while ($row3 = mysqli_fetch_assoc($sumresult)) {}
            
        

        $output.="<tr>
                                <th scope='row'>{$number}</th>
                                <td>{$row['ClientName']}     </td>
                                <td>{$row['ClientID']}     </td>
                                <td class='senddollar'>{$row['SentDollar']}     </td>
                                <td>{$row['SentDollarDate']}     </td>
                                <td class='totalinr'>{$row['TotalINR']}     </td>
                                <td class='cash'>{$row['RecCash']}     </td>
                                <td>{$row['CashClientName']}     </td>
                                <td class='accountfr'>{$row['AmountTransfer']}     </td>
                                <td>{$row['TransferTo']}     </td>
                                <td>{$row['Descrip']}     </td>
                                <td class='balanceinr'>{$row['BalanceinINR']}     </td>
                            </tr>
                            </tbody> 
                           
                            ";
                            $number++;
        
    }
    $output .=" 
                <tfoot>
                    <td class='fw-bold'>Total</td>
                    <td class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val2' class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val4' class='fw-bold'></td>
                    <td id='val5' class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val6' class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val3' class='fw-bold'></td>
                </tfoot>
            </table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found</h2>";
}
}

?>
    </div>
    </div>

    <?php  //include ('header_footer/footer.php')   ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    document.getElementById('download_Btn').
    addEventListener('click', function() {
        window.print();
    });


    // JAVASCRIPT CODE TO FOOTER SUM OF TABLE



    let cell2 = document.getElementsByClassName("senddollar");
    let val2 = 0;
    let j = 0;
    while (cell2[j] != undefined) {
        val2 += parseFloat(cell2[j].innerHTML);
        j++;
    } //end while
    document.getElementById("val2").innerHTML = parseFloat(val2).toFixed(2);
    console.log(parseFloat(val2).toFixed(2));


    let cell3 = document.getElementsByClassName("balanceinr");
    let val3 = 0;
    let k = 0;
    while (cell3[k] != undefined) {
        val3 += parseFloat(cell3[k].innerHTML);
        k++;
    } //end while
    document.getElementById("val3").innerHTML = parseFloat(val3).toFixed(2);
    console.log(parseFloat(val3).toFixed(2));


    let cell4 = document.getElementsByClassName("totalinr");
    let val4 = 0;
    let l = 0;
    while (cell4[l] != undefined) {
        val4 += parseFloat(cell4[l].innerHTML);
        l++;
    } //end while
    document.getElementById("val4").innerHTML = parseFloat(val4).toFixed(2);
    console.log(parseFloat(val4).toFixed(2));


    let cell5 = document.getElementsByClassName("cash");
    let val5 = 0;
    let m = 0;
    while (cell5[m] != undefined) {
        val5 += parseFloat(cell5[m].innerHTML);
        m++;
    } //end while
    document.getElementById("val5").innerHTML = parseFloat(val5).toFixed(2);
    console.log(parseFloat(val5).toFixed(2));


    let cell6 = document.getElementsByClassName("accountfr");
    let val6 = 0;
    let n = 0;
    while (cell6[n] != undefined) {
        val6 += parseFloat(cell6[n].innerHTML);
        n++;
    } //end while
    document.getElementById("val6").innerHTML = parseFloat(val6).toFixed(2);
    console.log(parseFloat(val6).toFixed(2));




    let cell7 = document.getElementsByClassName("AddFunds");
    let val7 = 0;
    let o = 0;
    while (cell7[o] != undefined) {
        val7 += parseFloat(cell7[o].innerHTML);
        o++;
    }
    document.getElementById("val7").innerHTML = parseFloat(val7).toFixed(2);
    console.log(parseFloat(val7).toFixed(2));
    </script>
</body>

</html>