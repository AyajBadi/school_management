<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "sms";


$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn){
   echo 'problem';

}
$select = "SELECT *FROM sciencefair";
$query = mysqli_query($conn,$select);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIENCEFAIR CONTROL</title>
    <link rel="stylesheet" href="../css/sciencefaircontrol.css">
</head>
<body>
    <h1><center>Sciencefair Data</center></h1>
    <div class="button-container">
        <a href="sciencefairinsert.php">INSERT DATA</a>
    </div>
    <form action="#">
        <table border='3'>
            <tr>
                <td><b>Student Name</b></td>
                <td><b>Roll Number</b></td>
                <td><b>Mobile Number</b></td>
                <td><b>Select Project</b></td>
                <td><b>Select Class</b></td>
                <td><b>Update</b></td>
                <td><b>Delete</b></td>
            </tr>
            <?php
           
            while($row = mysqli_fetch_array($query))
            {
             $Student = $row[1];
             $id = $row[0];
             $roll = $row[2];
             $mobile = $row[3];
             $project = $row[4];
             $class = $row[5];
             echo '
            <tr>
                <td>'.$Student.'</td>
                <td>'.$roll.'</td>
                <td>'.$mobile.'</td>
                <td>'.$project.'</td>
                <td>'.$class.'</td>

                <td><button><a href="sciencefairupdate.php?id='.$id.'">Update</a></button></td>
                <td><button><a href="sciencefairdelete.php?id='.$id.'">Delete</a></button></td>


            </tr>
             
             
             ';
            }
            ?>
        </table>
    </form>
</body>
</html>
