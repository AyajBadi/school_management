<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPOART EVENT</title>
    <link rel="stylesheet" href="../css/event1.css">
</head>
<body>
      
    <!-- header section -->
    <?php include ("header.php"); ?>

    <!-- event information -->
    <div class="heading">
    <h1>Sport Event</h1>
    <p>Event Date: January 1, 2024 | Location: School Campus</p>
</div>

<section>
    <div class="event-details">
        <div class="event-description">
            <h2>About the Event</h2>
            <p>The adrenaline-charged sports event unfolded on the grand stage, where athletes from around the world
                converged to showcase their prowess. The air buzzed with anticipation as competitors engaged in a
                breathtaking display of skill, determination, and sportsmanship. The crowd, a sea of fervent supporters,
                roared with enthusiasm, creating an electric ambiance that fueled the athletes' performances.</p>

            <p>From heart-stopping moments of suspense to awe-inspiring feats of athleticism, the event was a tapestry
                of triumphs and challenges. Whether it was a photo-finish race, a gravity-defying dunk, or a
                precision-driven goal, each moment resonated with the spirit of competition. The camaraderie among
                athletes, regardless of nationality, underscored the unifying power of sports.</p>

            <h2>Sport Name</h2>
            <div class="participants-list">
                <b>Cricket</b></br>
                <b>Badminton</b></br>
                <b>Kabaddi</b></br>
            </div>

            <h2>Winner</h2>
            <p><b>Event Winner:</b> Not Declare</p>
            <p><b>Winner's Prize:</b> $1000</p>
        </div>

        <div class="event-image">
            <img src="../img/spoart.jpg" alt="Event Image">
        </div>
    </div>
</section>
<div class="form-registration">
    <h2>Registration Hear</h2>
</div>

<div class="registration-form">
    <h2>Sports Registration Form</h2>
    <form action="#" method="POST">
        <label for="studentName">Student Name:</label>
        <input type="textbox" id="studentName" name="studentName" pattern="[A-Za-z\s]+" required>

        <label for="rollNumber">Roll Number:</label>
        <input type="textbox" id="rollNumber" name="rollNumber" required>

        <label for="mobileNumber">Mobile Number:</label>
        <input type="number" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" required>

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

    <!-- footer section -->
    <?php include ("footer.php"); ?>

</body>
</html>


<!-- data connection and data insert -->
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
    
    
    $checkQuery = "SELECT * FROM sciencefair WHERE rollNumber = '$rollNumber' OR mobileNumber = '$mobileNumber'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
      echo "<script>alert('YOUR NAME ALREADY REGISTERED');</script>";
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

