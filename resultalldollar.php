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
        .searchresult{
            display: none;
        }
        .goback{
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
            <p class="searchresult" >Searched Results</p>
        </div>
        <?php

if(isset($_GET['from_date']) && isset($_GET['to_date']))
{
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    $query = "SELECT * FROM `dollarrecievedtable` WHERE Recieved_Date BETWEEN '$from_date' AND '$to_date' ";
    $result = mysqli_query($conn, $query);
$output = "";
if(mysqli_num_rows($result) > 0){
    $output = '<table id="example" class="table table-bordered align-middle border-dark">
                <thead class="table-dark">
                    <tr >
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">S.No.</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Name</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">dollar recieved</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">remark</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">dollar recieved date</th>
                        <th class="align-middle" style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">amount in inr</th>
                    </tr>
                </thead>
                <tbody>
    '; 
            $number = 1;
    while($row = mysqli_fetch_assoc($result)){
        $output.="
      <tr >
                                <th style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$number}</th>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['Name']}     </td>
                                <td class='dollarrec' style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['Dollar_Recieved']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['Remark']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['Recieved_Date']}     </td>
                                <td class='total' style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['Total_INR']}     </td>
                            </tr>
                        </tbody>
        ";
        $number++;
    }
    
    $output .="
            <tfoot>
                    <td class='fw-bold'>Total</td>
                    <td class='fw-bold'></td>
                    <td id='val1' class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val2' class='fw-bold'></td>
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

$sql = "SELECT *  FROM `dollarrecievedtable` WHERE Name LIKE '%{$search_value}%'";

$result = mysqli_query($conn, $sql) or die("SQL Query failed");
$output = "";
if(mysqli_num_rows($result) > 0){
    $output = '<table id="myTable" class="table table-bordered align-middle border border-dark ">
                <thead class="table-dark">
                    <tr>
                        <th class="align-middle" scope="col ">S.NO.</th>
                        <th class="align-middle" scope="col ">CLIENT NAME</th>
                        <th class="align-middle" scope="col ">DOLLAR RECIEVED</th>
                        <th class="align-middle" scope="col ">REMARK</th>
                        <th class="align-middle" scope="col ">DOLLAR RECIEVED DATE</th>
                        <th class="align-middle" scope="col ">AMOUNT IN INR</th>
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
                                <td>{$row['Name']}     </td>
                                <td class='dollarrec'>{$row['Dollar_Recieved']}     </td>
                                <td>{$row['Remark']}     </td>
                                <td >{$row['Recieved_Date']}     </td>
                                <td class='total'>{$row['Total_INR']}     </td>
                            </tr>
                            </tbody> 
                           
                            ";
                            $number++;
        
    }
    $output .=" 
                <tfoot>
                    <td class='fw-bold'>Total</td>
                    <td class='fw-bold'></td>
                    <td id='val1' class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val2' class='fw-bold'></td>
                </tfoot>
            </table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found</h2>";
}
}elseif (isset($_POST['print'])) {
    $allsql = "SELECT * FROM `dollarrecievedtable`";
    $allresult = mysqli_query($conn, $allsql);

    $output = "";
if(mysqli_num_rows($allresult) > 0){
    $output = '<table id="myTable" class="table table-bordered align-middle border border-dark ">
                <thead class="table-dark">
                    <tr>
                        <th class="align-middle" scope="col ">S.NO.</th>
                        <th class="align-middle" scope="col ">CLIENT NAME</th>
                        <th class="align-middle" scope="col ">DOLLAR RECIEVED</th>
                        <th class="align-middle" scope="col ">REMARK</th>
                        <th class="align-middle" scope="col ">DOLLAR RECIEVED DATE</th>
                        <th class="align-middle" scope="col ">AMOUNT IN INR</th>
                    </tr>
                </thead>
                <tbody>
    '; 
    $number=1;
    while($row = mysqli_fetch_assoc($allresult)){

        // $sumsql = "SELECT sum(SentDollar) AS sumdollar FROM `transectionrecord` WHERE FullName LIKE 
        // '%{$search_value}%' OR ClientName LIKE '%{$search_value}%' OR ClientID LIKE '%{$search_value}%'";
        // $sumresult = mysqli_query($conn, $sumsql);
        // while ($row3 = mysqli_fetch_assoc($sumresult)) {}
            
        

        $output.="<tr>
                                <th scope='row'>{$number}</th>
                                <td>{$row['Name']}     </td>
                                <td class='dollarrec'>{$row['Dollar_Recieved']}     </td>
                                <td >{$row['Remark']}     </td>
                                <td >{$row['Recieved_Date']}     </td>
                                <td class='total'>{$row['Total_INR']}     </td>
                            </tr>
                            </tbody> 
                           
                            ";
                            $number++;
        
    }
    $output .=" 
                <tfoot>
                    <td class='fw-bold'>Total</td>
                    <td class='fw-bold'></td>
                    <td id='val1' class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td class='fw-bold'></td>
                    <td id='val2' class='fw-bold'></td>
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

    let cell = document.getElementsByClassName("dollarrec");
    let val1 = 0;
    let i = 0;
    while (cell[i] != undefined) {
        val1 += parseFloat(cell[i].innerHTML);
        i++;
    } //end while
    document.getElementById("val1").innerHTML = parseFloat(val1).toFixed(2);
    console.log(parseFloat(val1).toFixed(2));


    let cell2 = document.getElementsByClassName("total");
    let val2 = 0;
    let j = 0;
    while (cell2[j] != undefined) {
        val2 += parseFloat(cell2[j].innerHTML);
        j++;
    } //end while
    document.getElementById("val2").innerHTML = parseFloat(val2).toFixed(2);
    console.log(parseFloat(val2).toFixed(2));
    </script>
</body>

</html>