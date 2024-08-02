<!-- SELECT * FROM transectionrecord WHERE sentDollarDate BETWEEN '2024-07-27' AND '2024-07-28' -->


<?php
include ('dbconnect.php');


if(isset($_GET['from_date']) && isset($_GET['to_date']))
{
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    $query = "SELECT * FROM `transectionrecord` WHERE SentDollarDate BETWEEN '$from_date' AND '$to_date' ";
    $result = mysqli_query($conn, $query);
$output = "";
if(mysqli_num_rows($result) > 0){
    $output = '<button onclick="printFunction(){window.print();}">Download</button>
    <table style="border: 1px solid black; padding: 0.5rem; border-collapse:collapse" >
                <thead >
                    <tr >
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">S.No.</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Name</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Opening Balance</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Client Name</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Client ID</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Dollar Sent</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Dollar Sent Date</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Amount in INR</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Cash</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Name</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Account</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Name</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Description</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Balamce in INR</th>
                        <th style="border:1px solid black; padding: 0.5rem; background-color:gray; border-collapse:collapse; color:white; text-align:center;" scope="col">Closing Balance</th>
                    </tr>
                </thead>
                <tbody>
    '; 
            $number = 1;
    while($row = mysqli_fetch_assoc($result)){
        $output.="
      <tr >
                                <th style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$number}</th>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['FullName']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['OpeningBalance']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['ClientName']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['ClientID']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['SentDollar']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['SentDollarDate']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['TotalINR']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['RecCash']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['CashClientName']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['AmountTransfer']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['TransferTo']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['Descrip']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['BalanceinINR']}     </td>
                                <td style='border:1px solid black; padding: 0.5rem; border-collapse:collapse; text-align:center;'>{$row['ClosingBalance']}     </td>
                            </tr>
        ";
        $number++;
    }
    
    $output .="  </tbody>
            </table>";

    mysqli_close($conn);

    echo $output;

}else{
    echo "<h2>No Record Found</h2>";
}
}

?>