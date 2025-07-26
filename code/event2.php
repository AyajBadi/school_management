<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIENCE FAIR EVENT</title>
    <link rel="stylesheet" href="../css/event2.css">
</head>
<body>
    
    <!-- header section -->
    <?php include ("header.php"); ?>

    <!-- event information -->
    <div class="heading">
    <h1>Science Fair Event</h1>
    <p>Event Date: January 1, 2024 | Location: School Campus</p>
</div>

<section>
    <div class="event-details">
        <div class="event-description">
            <h2>About the Event</h2>
            <p>The Science Fair event unfolded as a captivating showcase of innovation and discovery, where budding
                scientists and inventors presented their projects with passion and ingenuity. The venue buzzed with
                excitement as participants demonstrated experiments, prototypes, and research findings that ranged from
                environmental solutions to cutting-edge technology. Judges and attendees alike marveled at the
                creativity and scientific rigor displayed by the students, reinforcing the importance of STEM education.
            </p>

            <p>The fair featured an array of projects spanning diverse fields such as biology, physics, chemistry, and
                engineering. Engaging discussions and Q&A sessions allowed participants to articulate their
                methodologies and findings, fostering a spirit of intellectual exchange. The Science Fair not only
                celebrated the accomplishments of young minds but also inspired a collective fascination with the
                wonders of science, leaving a lasting impact on both participants and the community. As a testament to
                the power of curiosity and exploration, the event underscored the significance of nurturing the next
                generation of scientific thinkers and problem solvers.</p>

            <h2>Project Name</h2>
            <div class="participants-list">
                <b>Wind energy</b></br>
                <b>Solar oven</b></br>
                <b>Water electrolysis</b></br>
                <b>Potato Battery</b></br>
            </div>

            <h2>Winner</h2>
            <p><b>Event Winner:</b> Not Declare</p>
            <p><b>Winner's Prize:</b> $1000</p>
        </div>

        <div class="event-image">
            <img src="../img/science.avif" alt="Event Image">
        </div>
    </div>
</section>
<div class="form-registration">
    <h2>Registration Hear</h2>
</div>

<div class="registration-form">
    <h2>Science Fair Registration Form</h2>
    <form action="#" method="POST">
        <label for="studentName">Student Name:</label>
        <input type="textbox" id="studentName" name="studentName" pattern="[A-Za-z\s]+" required>

        <label for="rollNumber">Roll Number:</label>
        <input type="textbox" id="rollNumber" name="rollNumber" required>

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