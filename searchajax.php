<?php
include("config/dbcon.php");

$query = $_POST['query'];

// Modify the SQL query to search in the existing columns only
$sql = "SELECT * FROM users WHERE date LIKE '%$query%' OR round_no LIKE '%$query%'";

$result = mysqli_query($conn, $sql);
$data = '';

if (mysqli_num_rows($result) > 0) {
    // Results found, generate table rows
    while ($row = mysqli_fetch_assoc($result)) {
        $data .= "<tr><td>".$row['date']."</td>
        <td>".$row['round_no']."</td>
        <td><a href='project_leader01_tags01.php'><i class='bx bx-show' style='font-size: 24px; color: gray;'></i></a></td>
        <td><a href='project_leader01.php'><i class='bx bx-show' style='font-size: 24px; color: gray;'></i></a></td>
        <td><a href='project_leader01.php'><i class='bx bx-show' style='font-size: 24px; color: gray;'></i></a></td>
        <td><a href='project_leader01.php'><i class='bx bx-show' style='font-size: 24px; color: gray;'></i></a></td>
        </tr>";
    }
    
} else {
    // ไม่พบข้อมูล
    $data .= "<tr><td colspan='6' style='text-align:center;'>ไม่มีข้อมูล</td></tr>";
}

echo $data;
?>
