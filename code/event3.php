<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANNUAL FUNCATION EVENT</title>
    <link rel="stylesheet" href="../css/event3.css">
</head>
<body>
    
     <!-- header section -->
     <?php include ("header.php"); ?>

     <!-- event information -->
     <div class="heading">
    <h1>Annual Function Event</h1>
    <p>Event Date: January 1, 2024 | Location: School Hall</p>
</div>

<section>
    <div class="event-details">
        <div class="event-description">
            <h2>About the Event</h2>
            <p>Indian dance is a captivating tapestry woven with diverse cultural threads, each style reflecting
                centuries-old traditions and stories. Classical dances, like Bharatanatyam, Kathak, Odissi, Kathakali,
                and Manipuri, are deeply rooted in history, showcasing intricate footwork, expressive gestures, and
                elaborate costumes. These dances often narrate mythological tales or depict cultural motifs, preserving
                the rich heritage of India.</p>

            <p>Folk dances, such as Bhangra, Garba, and Dandiya, celebrate the vibrancy of regional cultures, marked by
                energetic movements and colorful attire. Bollywood dance, a modern fusion, combines traditional and
                contemporary elements, gaining popularity globally for its dynamic choreography and infectious energy.
            </p>

            <h2>Dance Name</h2>
            <div class="participants-list">
                <b>Kathak</b><br>
                <b>Kathakali</b><br>
                <b>Kuchipudi</b><br>
            </div>

            <h2>Winner</h2>
            <p><b>Event Winner:</b> Not Declare</p>
            <p><b>Winner's Prize:</b> $1000</p>
        </div>

        <div class="event-image">
            <img src="../img/dance.jpg" alt="Event Image">
        </div>
    </div>
</section>
<div class="form-registration">
    <h2>Registration Hear</h2>
</div>

<div class="registration-form">
    <h2>Dance Registration Form</h2>
    <form action="#" method="post">
        <label for="studentName">Student Name:</label>
        <input type="textbox" id="studentName" name="studentName" pattern="[A-Za-z\s]+" required>

        <label for="rollNumber">Roll Number:</label>
        <input type="textbox" id="rollNumber" name="rollNumber" required>

        <label for="mobileNumber">Mobile Number:</label>
        <input type="number" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" required>

        <label for="Selectdance">Select Dance:</label>
        <select id="Selecdancet" name="Selectdance" required>
            <option value="" disabled selected>Select Dance</option>
            <option value="Kathak">Kathak</option>
            <option value="Kathakali">Kathakali</option>
            <option value="Kuchipudi">Kuchipudi</option>
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
     <?php include("footer.php"); ?>

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
    $Selectdance = $_POST["Selectdance"];
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



    $checkQuery = "SELECT * FROM annualfunction WHERE rollNumber = '$rollNumber' OR mobileNumber = '$mobileNumber'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
      echo "<script>alert('YOUR NAME ALREADY REGISTERED');</script>";
        exit();
    }


    $sql = "INSERT INTO annualfunction (studentName, rollNumber, mobileNumber, Selectdance, classSelect)
            VALUES ('$studentName', '$rollNumber', '$mobileNumber', '$Selectdance', '$classSelect')";

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