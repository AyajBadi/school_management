<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "sms";


$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];
// echo $id;

 $delete = "DELETE FROM enquiry WHERE id = $id ";

 $query = mysqli_query($conn,$delete);
 if($query)
 {
    header("location:enquirycontrol.php");
 }

?>