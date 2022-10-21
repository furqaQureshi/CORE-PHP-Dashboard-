<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
include 'db.php';
$userid = $_GET['id'];
$sql = "delete from product where id = {$userid}";
if (mysqli_query($con, $sql)) {
    header('location: basic_table.php');
}
?>