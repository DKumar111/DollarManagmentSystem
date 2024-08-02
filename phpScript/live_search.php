<?php

include 'dbconnect.php';

$search_value = $_GET['searchText'];

$sql = "SELECT * FROM `transectionrecord` WHERE FullName LIKE '%{$search_value}%' OR ClientName LIKE '%{$search_value}%' OR ClientID LIKE '%{$search_value}%'";

$result = mysqli_query($conn, $sql) or die("SQL Query failed");
$output = "";
if(mysqli_num_rows($result) > 0){
    $output = '<table class="table table-bordered align-middle border-primary ">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Opening Balance</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Client ID</th>
                        <th scope="col">Dollar Sent</th>
                        <th scope="col">Dollar Sent Date</th>
                        <th scope="col">Amount in INR</th>
                        <th scope="col">Cash</th>
                        <th scope="col">Name</th>
                        <th scope="col">Account</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Balamce in INR</th>
                        <th scope="col">Closing Balance</th>
                    </tr>
                </thead>
                <tbody>
    '; 
    $number=1;
    while($row = mysqli_fetch_assoc($result)){
        $output.="<tr>
                                <th scope='row'>{$number}</th>
                                <td>{$row['FullName']}     </td>
                                <td>{$row['OpeningBalance']}     </td>
                                <td>{$row['ClientName']}     </td>
                                <td>{$row['ClientID']}     </td>
                                <td>{$row['SentDollar']}     </td>
                                <td>{$row['SentDollarDate']}     </td>
                                <td>{$row['TotalINR']}     </td>
                                <td>{$row['RecCash']}     </td>
                                <td>{$row['CashClientName']}     </td>
                                <td>{$row['AmountTransfer']}     </td>
                                <td>{$row['TransferTo']}     </td>
                                <td>{$row['Descrip']}     </td>
                                <td>{$row['BalanceinINR']}     </td>
                                <td>{$row['ClosingBalance']}     </td>
                            </tr>";
                            $number++;
    }
    $output .=" </tbody>
            </table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found</h2>";
}

?>