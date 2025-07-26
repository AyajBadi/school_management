<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "sms";


$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn){
   echo 'problem';

}
$id = $_GET['id'];

$select = "SELECT *FROM spoart WHERE id = $id";
$query = mysqli_query($conn,$select);
$row = mysqli_fetch_array($query);
$Student = $row[1];
             $id = $row[0];
             $roll = $row[2];
             $mobile = $row[3];
             $spoart = $row[4];
             $class = $row[5];
// echo $Student;
if(isset($_POST['submit']))
{
    $studentName = $_POST["studentName"];
    $rollNumber = $_POST["rollNumber"];
    $mobileNumber = $_POST["mobileNumber"];
    $sportSelect = $_POST["sportSelect"];
    $classSelect = $_POST["classSelect"];
   

   $update  = "UPDATE `spoart` SET `studentName`='$studentName',`rollNumber`='$rollNumber',`mobileNumber`='$mobileNumber',`sportSelect`=' $sportSelect',`classSelect`='$classSelect' WHERE `id` = '$id'  ";
   $q =  mysqli_query($conn,$update);
   if($q)
   {
    header("location:spoartcontrol.php");
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=form">
    <title>SPOART UPDATE</title>
    <link rel="stylesheet" href="../css/spoartupdate.css">
</head>
<body>
    <form  method="POST">
        <h2><center>UPDATE DATA HEARE</center></h2>
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" value="<?php echo $Student; ?>">

        <label for="rollNumber">Roll Number:</label>
        <input type="text" id="rollNumber" name="rollNumber" value="<?php echo $roll; ?>">

        <label for="mobileNumber">Mobile Number:</label>
        <input type="tel" id="mobileNumber" name="mobileNumber"  value="<?php echo $mobile; ?>">

        <label for="sportSelect">Select Sport:</label>
        <select id="sportSelect" name="sportSelect" value="<?php echo $spoart; ?>">
            <!-- <option value="" disabled selected>Select Sport</option> -->
            <option >Cricket</option>
            <option >Kabaddi</option>
            <option >Badminton</option>
        </select>

        <label for="classSelect">Select Class:</label>
        <select id="classSelect" name="classSelect" value="<?php echo $class; ?>">
            <!-- <option value="" disabled selected>Select Class</option> -->
           <option>Class 1</option>
           <option>Class 2</option>
           <option>Class 3</option>
           <option>Class 4</option>
           <option>Class 5</option>
           <option>Class 6</option>
           <option>Class 7</option>
           <option>Class 8</option>
           <option>Class 9</option>
           <option>Class 10</option>
           <option>Class 11 Commerce</option>
           <option>Class 12 Commerce</option>
        </select>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>