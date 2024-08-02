<?php
$conn = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");
$limit_per_page = 3;

$page = "";
if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
}else{
$page = 1;
}

$offset = ($page - 1) * $limit_per_page;

$sql = "SELECT * FROM `students` LIMIT {$offset}, {$limit_per_page} ";
$resutl = mysqli_query($conn, $sql) or die("Query Unsuccessfull.");
$output = "";
if(mysqli_num_rows($resutl)>0){
    $output .= '
    <table border="1px" width="40%" cellspacing="0" cellpadding="10px">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>';

                while($row = mysqli_fetch_assoc($resutl)){
              $output .= "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['f_name']} {$row['l_name']}</td>
                </tr>";
                }
          $output .= "</table>";

          $sql_total = "SELECT * FROM `students`";
          $records = mysqli_query($conn, $sql_total) or die("Query Unsuccessful");
          $total_record = mysqli_num_rows($records);
          $total_pages = ceil($total_record/$limit_per_page);

          $output .= ' <div style="margin-top:1rem;" id="pagination">';
          for($i=1; $i<=$total_pages; $i++){
            if($i == $page){
                $class_name = "active";
            }else{
                $class_name = "";
            }
                $output .= "<a style='cusror:pointer; padding:0.5rem 0.5rem' class='{$class_name}' id='{$i}' href=''>{$i}</a>";
          }
          $output .= '</div>';
            echo $output;
}else{
    echo "<h2>No Record Found</h2>";
}


?>