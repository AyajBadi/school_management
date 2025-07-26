<!-- php code -->
<?php
include ("connection.php");

$id = $_GET['id'];
$select = "SELECT * FROM enquiry WHERE id = $id";
$query = mysqli_query($conn, $select);
$row = mysqli_fetch_array($query);

$student = $row['studentName'];
$father = $row['fatherName'];
$mobile = $row['mobileNumber'];
$email = $row['email'];
$dob = $row['dob'];
$gender = $row['gender'];
$add = $row['address'];
$pin = $row['pincode'];
$ec = $row['enquiryClass'];

if(isset($_POST['submit'])) {
    $studentName = $_POST["studentName"];
    $fatherName = $_POST["fatherName"];
    $mobileNumber = $_POST["mobileNumber"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $pincode = $_POST["pincode"];
    $enquiryClass = $_POST["enquiryClass"];

    // Calculate Age based on Date of Birth
    $dobDate = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $dobDate->diff($currentDate)->y;


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



       function cleanInput($data)
   {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
   }

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


    $update = "UPDATE `enquiry` SET `studentName`='$studentName',`fatherName`='$fatherName',`mobileNumber`='$mobileNumber',`email`='$email',`dob`='$dob',`gender`='$gender',`address`='$address',`pincode`='$pincode',`enquiryClass`='$enquiryClass', `age`='$age' WHERE id = $id";
    $q = mysqli_query($conn, $update);
    if($q) {
        header("location:enquirycontrol.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=form">
    <title>ENQUIRY UPDATE</title>
    <link rel="stylesheet" href="../css/enquiryupdate.css">
</head>

<body>
    <h1>ENQUIRY DATA</h1>
    <div class="enquiry">
        <form action="#" method="POST">
            <h1>
                <center>UPDATE DATA HEARE</center>
            </h1>
            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="studentName" value="<?php echo $student; ?>">

            <label for="fatherName">Father Name:</label>
            <input type="text" id="fatherName" name="fatherName" value="<?php echo $father; ?>">

            <label for="mobileNumber">Mobile Number:</label>
            <input type="number" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" value="<?php echo $mobile; ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>">

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>">

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="Male" <?php if($gender == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if($gender == 'Female') echo 'selected'; ?>>Female</option>
                <option value="Other" <?php if($gender == 'Other') echo 'selected'; ?>>Other</option>
            </select>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $add; ?>">

            <label for="pincode">Pincode:</label>
            <input type="text" id="pincode" name="pincode" value="<?php echo $pin; ?>">

            <label for="enquiryClass">Enquiry Class:</label>
            <select id="enquiryClass" name="enquiryClass">
                <option value="Class 1" <?php if($ec == 'Class 1') echo 'selected'; ?>>Class 1</option>
                <option value="Class 2" <?php if($ec == 'Class 2') echo 'selected'; ?>>Class 2</option>
                <option value="Class 3" <?php if($ec == 'Class 3') echo 'selected'; ?>>Class 3</option>
                <option value="Class 4" <?php if($ec == 'Class 4') echo 'selected'; ?>>Class 4</option>
                <option value="Class 5" <?php if($ec == 'Class 5') echo 'selected'; ?>>Class 5</option>
                <option value="Class 6" <?php if($ec == 'Class 6') echo 'selected'; ?>>Class 6</option>
                <option value="Class 7" <?php if($ec == 'Class 7') echo 'selected'; ?>>Class 7</option>
                <option value="Class 8" <?php if($ec == 'Class 8') echo 'selected'; ?>>Class 8</option>
                <option value="Class 9" <?php if($ec == 'Class 9') echo 'selected'; ?>>Class 9</option>
                <option value="Class 10" <?php if($ec == 'Class 10') echo 'selected'; ?>>Class 10</option>
                <option value="Class 11Commerce" <?php if($ec == 'Class 11Commerce') echo 'selected'; ?>>Class 11Commerce</option>
                <option value="Class 12Commerce" <?php if($ec == 'Class 12Commerce') echo 'selected'; ?>>Class 12Commerce</option>
            </select>

            <button type="submit" name="submit">Submit</button>

        </form>

    </div>
</body>

</html>


