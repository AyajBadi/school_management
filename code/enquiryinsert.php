<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENQUIRY INSERT DATA</title>
    <link rel="stylesheet" href="../css/enquiryinsert.css">
</head>
<body>
<div class="enquiry">
    <form action="#" method="POST">
        <h1>ENQUIRY DATA INSERT</h1>
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" pattern="[A-Za-z]+" title="Only letters allowed" required>

        <label for="fatherName">Father Name:</label>
        <input type="text" id="fatherName" name="fatherName" pattern="[A-Za-z]+" title="Only letters allowed" required>

        <label for="mobileNumber">Mobile Number:</label>
        <input type="number" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="enquiryClass">Enquiry Class:</label>
        <select id="enquiryClass" name="enquiryClass" required>
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
            <option value="class11Commerce">Class 11 Commerce</option>
            <option value="class12Commerce">Class 12 Commerce</option>
        </select>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="pincode">Pincode:</label>
        <input type="number" id="pincode" name="pincode" pattern="[0-9]{6}" title="Pincode must be 6 digits" required><br>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>


<!-- php code -->
<?php
include ("connection.php");

 
function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = cleanInput($_POST["studentName"]);
    $fatherName = cleanInput($_POST["fatherName"]);
    $mobileNumber = cleanInput($_POST["mobileNumber"]);
    $email = cleanInput($_POST["email"]);
    $dob = cleanInput($_POST["dob"]);
    $gender = cleanInput($_POST["gender"]);
    $address = cleanInput($_POST["address"]);
    $pincode = cleanInput($_POST["pincode"]);
    $enquiryClass = cleanInput($_POST["enquiryClass"]);

    // Validate Student Name and Father Name
    if (!preg_match("/^[a-zA-Z ]*$/", $studentName)) {
        echo "<script>alert('Only letters and white space allowed for Student Name');</script>";
        exit();
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $fatherName)) {
        echo "<script>alert('Only letters and white space allowed for Father Name');</script>";
        exit();
    }

    // Validate Mobile Number
    if (!preg_match("/^[0-9]{10}$/", $mobileNumber)) {
        echo "<script>alert('Mobile Number must be 10 digits');</script>";
        exit();
    }

    if (!preg_match("/^[0-9]{6}$/", $pincode)) {
        echo "<script>alert('Pincode must be 6 digits');</script>";
        exit();
    }
    
    // Calculate Age based on Date of Birth
    $dobDate = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $dobDate->diff($currentDate)->y;

    // Validate Age based on Enquiry Class
    switch ($enquiryClass) {
        case "class1":
            if ($age < 6) {
                echo "<script>alert('Age must be at least 6 years for Class 1');</script>";
                exit();
            }
            break;
        case "class2":
            if ($age < 7) {
                echo "<script>alert('Age must be at least 7 years for Class 2');</script>";
                exit();
            }
            break;
        case "class3":
            if ($age < 8) {
                echo "<script>alert('Age must be at least 8 years for Class 3');</script>";
                exit();
            }
            break;
        case "class4":
            if ($age < 9) {
                echo "<script>alert('Age must be at least 9 years for Class 4');</script>";
                exit();
            }
            break;
        case "class5":
            if ($age < 10) {
                echo "<script>alert('Age must be at least 10 years for Class 5');</script>";
                exit();
            }
            break;
        case "class6":
            if ($age < 11) {
                echo "<script>alert('Age must be at least 11 years for Class 6');</script>";
                exit();
            }
            break;
        case "class7":
            if ($age < 12) {
                echo "<script>alert('Age must be at least 12 years for Class 7');</script>";
                exit();
            }
            break;
        case "class8":
            if ($age < 13) {
                echo "<script>alert('Age must be at least 13 years for Class 8');</script>";
                exit();
            }
            break;
        case "class9":
            if ($age < 14) {
                echo "<script>alert('Age must be at least 14 years for Class 9');</script>";
                exit();
            }
            break;
        case "class10":
            if ($age < 15) {
                echo "<script>alert('Age must be at least 10 years for Class 10');</script>";
                exit();
            }
            break;
        case "class11Commerce":
            if ($age < 16) {
                echo "<script>alert('Age must be at least 16 years for Class 11 commerce');</script>";
                exit();
            }
            break;
        case "class12Commerce":
            if ($age < 17) {
                echo "<script>alert('Age must be at least 17 years for Class 12 commerce');</script>";
                exit();
            }
            break;
            
        // Add cases for other classes as needed
        default:
            // No specific validation for other classes
            break;
    }

    // Check if email or mobile number already exists
    $checkQuery = "SELECT * FROM enquiry WHERE email = '$email' OR mobileNumber = '$mobileNumber'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email Or Phone Number Already Present');</script>";
        exit();
    }

    // Insert data into database
    $sql = "INSERT INTO enquiry (studentName, fatherName, mobileNumber, email, dob, gender, address, pincode, enquiryClass, age)
            VALUES ('$studentName', '$fatherName', '$mobileNumber', '$email', '$dob', '$gender', '$address', '$pincode', '$enquiryClass', '$age')";

    if ($conn->query($sql) === TRUE) {
        $to = $email;
        $subject = "Thank you for your enquiry!";
        $message = "Hello [$studentName],

Thank you for expressing interest in our school. Your enquiry has been received. A member of our team will contact you shortly to provide you with all the necessary information.
                
If you have any further questions or suggestions, please let us know. We are here to assist you.
                
Thank you.
        
Regards,        
[Saurashtra International School]";

        mail($to, $subject, $message, $headers);

        echo "Data stored successfully and email sent.";
    } else {
        echo mysqli_error($conn);
    }

    exit();
}

$conn->close();
?>
