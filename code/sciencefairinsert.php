<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIENCEFAIR DATA INSERT</title>
    <link rel="stylesheet" href="../css/sciencefairinsert.css">
</head>
<body>
<div class="registration-form">
    <h2>Sports Registration Form</h2>
    <form action="#" method="POST">
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" pattern="[A-Za-z\s]+" required>

        <label for="rollNumber">Roll Number:</label>
        <input type="text" id="rollNumber" name="rollNumber" required>

        <label for="mobileNumber">Mobile Number:</label>
        <input type="number" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" required>

        <label for="projectSelect">Select Project:</label>
        <select id="projectSelect" name="projectSelect" required>
            <option value="" disabled selected>Select projects</option>
            <option value="Windenergy">Wind energy</option>
            <option value="Solaroven">Solar oven</option>
            <option value="Waterelectrolysis">Water electrolysis</option>
            <option value="PotatoBattery">Potato Battery</option>
        </select>

        <label for="classSelect">Select Class:</label>
        <select id="classSelect" name="classSelect" required>
            <option value="" disabled selected>Select Class</option>
            <option value="class7">Class 7</option>
            <option value="class8">Class 8</option>
            <option value="class9">Class 9</option>
            <option value="class10">Class 10</option>
        </select>

        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>


<?php

include ("connection.php");



// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = $_POST["studentName"];
    $rollNumber = $_POST["rollNumber"];
    $mobileNumber = $_POST["mobileNumber"];
    $projectSelect = $_POST["projectSelect"];
    $classSelect = $_POST["classSelect"];


    // Validation for student name (only characters allowed)
    if (!preg_match("/^[a-zA-Z ]*$/", $studentName)) {
        echo "<script>alert('Only letters and white space allowed for Student Name');</script>";
        exit();
    }

    // Validation for mobile number (exactly 10 digits)
    if (!preg_match("/^\d{10}$/", $mobileNumber)) {
        echo "<script>alert('Mobile Number must be 10 digits');</script>";
        exit();
    }
    

    $checkQuery = "SELECT * FROM sciencefair WHERE rollNumber = '$rollNumber' OR mobileNumber = '$mobileNumber'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
      echo "<script>alert('YOUR NAME ALREADY REGISTERED');</script>";
        exit();
    }


    $sql = "INSERT INTO sciencefair (studentName, rollNumber, mobileNumber, projectSelect, classSelect)
            VALUES ('$studentName', '$rollNumber', '$mobileNumber', '$projectSelect', '$classSelect')";

if(mysqli_query($conn,$sql))
{
    echo "<script>alert('Data Submitted');</script>";
}
else
{
echo mysqli_error($conn);
}

exit();
}

$conn->close();
?>