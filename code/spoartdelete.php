<?php

include ("connection.php");
$id = $_GET['id'];



$delete = "DELETE FROM `spoart` WHERE id = '$id'";
$query = mysqli_query($conn, $delete);
if($query)
{
    header("location:spoartcontrol.php");
}

?>