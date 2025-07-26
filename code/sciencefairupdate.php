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

$select = "SELECT *FROM sciencefair WHERE id = $id";
$query = mysqli_query($conn,$select);
$row = mysqli_fetch_array($query);
$Student = $row[1];
             $id = $row[0];
             $roll = $row[2];
             $mobile = $row[3];
             $project = $row[4];
             $class = $row[5];
// echo $Student;
if(isset($_POST['submit']))
{
    $studentName = $_POST["studentName"];
    $rollNumber = $_POST["rollNumber"];
    $mobileNumber = $_POST["mobileNumber"];
    $projectSelect = $_POST["projectSelect"];
    $classSelect = $_POST["classSelect"];
   

   $update  = "UPDATE `sciencefair` SET `studentName`='$studentName',`rollNumber`='$rollNumber',`mobileNumber`='$mobileNumber',`projectSelect`=' $projectSelect',`classSelect`='$classSelect' WHERE `id` = '$id'  ";
   $q =  mysqli_query($conn,$update);
   if($q)
   {
    header("location:sciencefaircontrol.php");
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=form">
    <title>SCIENCEFAIR UPDATE</title>
    <link rel="stylesheet" href="../css/sciencefairupdate.css">
</head>
<body>
    <form  method="POST">
        <h2><center>Update Your Data Heare</center></h2>
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" value="<?php echo $Student; ?>">

        <label for="rollNumber">Roll Number:</label>
        <input type="text" id="rollNumber" name="rollNumber" value="<?php echo $roll; ?>">

        <label for="mobileNumber">Mobile Number:</label>
        <input type="tel" id="mobileNumber" name="mobileNumber"  value="<?php echo $mobile; ?>">

        <label for="projectSelect">Select Project:</label>
        <select id="projectSelect" name="projectSelect" value="<?php echo $project; ?>">
            <!-- <option value="" disabled selected>Select Sport</option> -->
            <option >Wind energy</option>
            <option >Solar oven</option>
            <option >Water electrolysis</option>
            <option >Potato Battery</option>
        </select>

        <label for="classSelect">Select Class:</label>
        <select id="classSelect" name="classSelect" value="<?php echo $class; ?>">
            <!-- <option value="" disabled selected>Select Class</option> -->
           <option >Class 7</option>
           <option >Class 8</option>
           <option >Class 9</option>
           <option >Class 10</option>
        </select>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>