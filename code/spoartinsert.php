<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPOART DATA INSERT</title>
    <link rel="stylesheet" href="../css/spoartinsert.css">
</head>
<body>
<div class="registration-form">
    <h2>Sports Registration Form</h2>
    <form action="#" method="POST">
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" required>

        <label for="rollNumber">Roll Number:</label>
        <input type="text" id="rollNumber" name="rollNumber" required>

        <label for="mobileNumber">Mobile Number:</label>
        <input type="tel" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" required>

        <label for="sportSelect">Select Sport:</label>
        <select id="sportSelect" name="sportSelect" required>
            <option value="" disabled selected>Select Sport</option>
            <option value="cricket">Cricket</option>
            <option value="kabaddi">Kabaddi</option>
            <option value="badminton">Badminton</option>
        </select>

        <label for="classSelect">Select Class:</label>
        <select id="classSelect" name="classSelect" required>
            <option value="" disabled selected>Select Class</option>
           <option value="class1">Class 1</option>
           <option value="class2">Class 2</option>
           <option value="class3">Class 3</option>
           <option value="class4">Class 4</option>
           <option value="class5">Class 5</option>
           <option value="class6">Class 6</option>
           <option value="class7">Class 7</option>
           <option value="class8">Class 8</option>
           <option value="class9">Class 9</option>
           <option value="class10">Class 10</option>
           <option value="class11commerce">Class 11 Commerce</option>
           <option value="class12commerce">Class 12 Commerce</option>
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
    $sportSelect = $_POST["sportSelect"];
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
    

    
    $sql = "INSERT INTO spoart (studentName, rollNumber, mobileNumber, sportSelect, classSelect)
            VALUES ('$studentName', '$rollNumber', '$mobileNumber', '$sportSelect', '$classSelect')";

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
?>