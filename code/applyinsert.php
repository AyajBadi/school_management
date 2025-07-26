<?php
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DATA INSERT</title>
    <link rel="stylesheet" href="../css/applyinsert.css">
</head>
<body>
<div class="heading">
    <h1><center>STUDENT ADDMISION FORM</center></h1>
</div>
<div class="container">
    <form action="#" method="POST" enctype="multipart/form-data">
        <label for="fullname">Student Name:</label>
        <input type="text" id="fullname" name="fullname" pattern="[A-Za-z\s]+" title="Only letters allowed" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phonenumber">Phone Number:</label>
        <input type="number" id="phonenumber" name="phonenumber" pattern="[0-9]{10}" required>

        <label for="address">Home Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <label for="selectclass">Select Class Admission:</label>
        <select id="selectclass" name="selectclass" required>
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
            <option value="class11">Class 11 Commerce</option>
            <option value="class12">Class 12 Commerce</option>
        </select>


        <label for="dob">Date of Birth(Student):</label>
        <input type="date" id="dob" name="dob" required>

        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="previousschool">Previous School Name:</label>
        <input type="text" id="previousschool" name="previousschool" required>

        <label for="Admission_Form">Admission Form:</label>
        <input type="file" id="admission_photo" name="admission_photo" accept=".jpg, .png" required>

        <label for="date_of_certificate">Birth Certificate:</label>
        <input type="file" id="birth_photo" name="birth_photo" accept=".jpg, .png" required>

        <label for="identification_Proof">Id Proof:</label>
        <input type="file" id="identification_photo" name="identification_photo" accept=".jpg, .png" required>

        <label for="photo">Photo(Student):</label>
        <input type="file" id="photo" name="photo" accept=".jpg, .png" required>

        <label for="previous_year_result">Previous Year Result:</label>
        <input type="file" id="result" name="result" accept=".pdf, .jpg, .png" required>

        <button type="submit" name="submit">Submit</button>
    </form>
</div>

</body>
</html>




<?php


include ("connection.php");

function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$selectclass = $_POST['selectclass'];
$gender = $_POST['gender'];
$previousschool = $_POST['previousschool'];


//addmission_photo
$addmision_photo = $_FILES['admission_photo']['name'];
$addmision_p_temp = $_FILES['admission_photo']['tmp_name'];
$time = time();
$newimagename = $time . $addmision_photo;
$folder_1 = "../image/" .$newimagename;
move_uploaded_file($addmision_p_temp, $folder_1);

//birth_photo
$birth_photo = $_FILES['birth_photo']['name'];
$birth_photo_temp = $_FILES['birth_photo']['tmp_name'];
$time = time();
$newimagename = $time . $birth_photo;
$folder_2 = "../image/" .$newimagename;
move_uploaded_file($birth_photo_temp, $folder_2);

//idification_photo 
$identification_photo = $_FILES['identification_photo']['name'];
$identification_photo_temp = $_FILES['identification_photo']['tmp_name'];
$time = time();
$newimagename = $time . $identification_photo;
$folder_3 = "../image/" .$newimagename;
move_uploaded_file($identification_photo_temp, $folder_3);

//student_photo
$photo = $_FILES['photo']['name'];
$photo_temp = $_FILES['photo']['tmp_name'];
$time = time();
$newimagename = $time . $photo;
$folder_4 = "../image/" .$newimagename;
move_uploaded_file($photo_temp, $folder_4);

//result_photo
$result = $_FILES['result']['name'];
$result_temp = $_FILES['result']['tmp_name'];
$time = time();
$newimagename = $time . $result;
$folder_5 = "../image/" .$newimagename;
move_uploaded_file($result_temp, $folder_5);


$last_digits = substr($phonenumber, -4);
//Set the password as the last 4 digits of the mobile number
 $password = $last_digits;
 $attendace = $_POST['attendace'];


//full name validation

if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
  echo "<script>alert('Only letters and white space allowed for Student Name');</script>";
  exit();
}
 
//mobilenumber validation

if (!preg_match("/^[0-9]{10}$/", $phonenumber)) {
  echo "<script>alert('Mobile Number must be 10 digits');</script>";
  exit();
}



// Calculate Age based on Date of Birth
$dobDate = new DateTime($dob);
$currentDate = new DateTime();
$age = $dobDate->diff($currentDate)->y;


// Validate Age based on Addmission
switch ($selectclass) {
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
      case "class11":
          if ($age < 16) {
              echo "<script>alert('Age must be at least 16 years for Class 11 commerce');</script>";
              exit();
          }
          break;
      case "class12":
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



//check email or phone number already present
$select = "SELECT * FROM apply WHERE email = '$email' AND phonenumber = '$phonenumber'";
$query = mysqli_query($conn, $select);
if(mysqli_num_rows($query) > 0) {
  echo "<script>alert('Email Or Phone Number Already Present');</script>";

}
else
{
  if(isset($_POST["submit"]))
  {
    $sql = "INSERT INTO apply (fullname, email, phonenumber, address, dob, selectclass, gender, previousschool, admission_photo, birth_photo, identification_photo, photo, result, attendace, password )
            VALUES ('$fullname', '$email', '$phonenumber', '$address', '$dob', '$selectclass', '$gender', '$previousschool', '$folder_1', '$folder_2', '$folder_3', '$folder_4', '$folder_5', '$attendace', '$password')";

if ($conn->query($sql) === TRUE) {
  // Email bhejein
  $to = $email;
  $subject = "Addmission Information!";
  $message = "Subject: Admission Form Submission Confirmation

  Dear $fullname,
  
  We are pleased to inform you that your admission form has been successfully submitted. Below are your login details for accessing our system:
  
  Name: $fullname
  Standard: $selectclass
  ID: $email
  Password: $password

  Please keep these details confidential and ensure their safekeeping. You will require them to access various services provided by our institution.
  
  Should you have any questions or require further assistance, please don't hesitate to contact us.
  
  Best regards,
  
  Saurashtra International School";
  $headers = "From: badiayaj2004@gmail.com"; // Apna email address yahan dalein


  // Send email
  mail($to, $subject, $message, $headers);
  
  echo "<script>alert('Data Submitted and send E-mail');</script>";
} 
else
{
echo mysqli_error($conn);
}

  }
}

exit();


$conn->close();         

?>
