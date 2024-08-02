<?php
include_once("dbconnect.php");


if (!empty($_POST["id"])) {
    $id = $_POST["id"];
    // echo $id;
    // $query = "SELECT last(OpeningBalance) AS minvalue FROM `transectionrecord` WHERE tm_ID = $id ";
    $query = "SELECT ClosingBalance FROM `transectionrecord` WHERE FullName = '$id' ORDER BY trid  DESC LIMIT 1  ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['ClosingBalance'];
    }
} 