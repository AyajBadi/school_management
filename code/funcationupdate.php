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

$select = "SELECT *FROM annualfunction WHERE id = $id";
$query = mysqli_query($conn,$select);
$row = mysqli_fetch_array($query);
$Student = $row[1];
             $id = $row[0];
             $roll = $row[2];
             $mobile = $row[3];
             $dance = $row[4];
             $class = $row[5];
// echo $Student;
if(isset($_POST['submit']))
{
    $studentName = $_POST["studentName"];
    $rollNumber = $_POST["rollNumber"];
    $mobileNumber = $_POST["mobileNumber"];
    $Selectdance = $_POST["Selectdance"];
    $classSelect = $_POST["classSelect"];
   

   $update  = "UPDATE `annualfunction` SET `studentName`='$studentName',`rollNumber`='$rollNumber',`mobileNumber`='$mobileNumber',`Selectdance`=' $Selectdance',`classSelect`='$classSelect' WHERE `id` = '$id'  ";
   $q =  mysqli_query($conn,$update);
   if($q)
   {
    header("location:funcationcontrol.php");
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=form">
    <title>FUNCATION UPDATE</title>
    <link rel="stylesheet" href="../css/funcationupdate.css">
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

        <label for="Selectdance">Select dance:</label>
        <select id="Selectdance" name="Selectdance" value="<?php echo $spoart; ?>">
            <!-- <option value="" disabled selected>Select Sport</option> -->
            <option >Kathak</option>
            <option >Kathakali</option>
            <option >Kuchipudi</option>
        </select>

        <label for="classSelect">Select Class:</label>
        <select id="classSelect" name="classSelect" value="<?php echo $class; ?>">
            <!-- <option value="" disabled selected>Select Class</option> -->
           <option >Class 1</option>
           <option >Class 2</option>
           <option >Class 3</option>
           <option>Class 4</option>
           <option >Class 5</option>
           <option >Class 6</option>
           <option >Class 7</option>
           <option >Class 8</option>
           <option >Class 9</option>
           <option >Class 10</option>
           <option >Class 11 Commerce</option>
           <option >Class 12 Commerce</option>
        </select>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>