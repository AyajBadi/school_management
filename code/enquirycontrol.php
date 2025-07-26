<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "sms";


$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn){
   echo 'problem';

}
$select = "SELECT *FROM enquiry";
$query = mysqli_query($conn,$select);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENQUIRY CONTROL</title>
    <link rel="stylesheet" href="../css/enquirycontrol.css">
</head>

<body>
    <h1>ENQUIRY DATA</h1>
    <div class="button-container">
        <a href="enquiryinsert.php">INSERT DATA</a>
    </div>
    <form action="#">
        <table border='3'>
            <tr>
                <td><b>Student Name</b></td>
                <td><b>Father Name</b></td>
                <td><b>Mobile Number</b></td>
                <td><b>Email</b></td>
                <td><b>Date Of bhird</b></td>
                <td><b>Gender</b></td>
                <td><b>Address</b></td>
                <td><b>Pincode</b></td>
                <td><b>Enquiry Class</b></td>
                <td><b>Update</b></td>
                <td><b>Delete</b></td>
            </tr>
            <?php
           
            while($row = mysqli_fetch_array($query))
            {
             $Student = $row[1];
             $id = $row[0];
             $father = $row[2];
             $mobile = $row[3];
             $email = $row[4];
             $dob = $row[5];
             $gender = $row[6];
             $add = $row[7];
             $pin = $row[8];
             $ec = $row[9];
             echo '
            <tr>
                <td>'.$Student.'</td>
                <td>'.$father.'</td>
                <td>'.$mobile.'</td>
                <td>'.$email.'</td>
                <td>'.$dob.'</td>
                <td>'.$gender.'</td>
                <td>'.$add.'</td>
                <td>'.$pin.'</td>
                <td>'.$ec.'</td>

                <td><button><a href="enquiryupdate.php?id='.$id.'">Update</a></button></td>
                <td><button><a href="enquirydelete.php?id='.$id.'">Delete</a></button></td>


            </tr>
             
             
             ';
            }
            ?>
        </table>
    </form>
</body>

</html>