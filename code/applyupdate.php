<?php
error_reporting(E_ERROR | E_PARSE);
?>

<?php
include("connection.php");

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $selectclass = $_POST['selectclass'];
    $gender = $_POST['gender'];
    $previousschool = $_POST['previousschool'];
    $attendace = $_POST['attendace'];
    $password = $_POST['password'];

    // Update the data in the database
    $update = "UPDATE `apply` SET `fullname`='$fullname', `selectclass`='$selectclass', `phonenumber`='$phonenumber', `email`='$email', `dob`='$dob', `gender`='$gender', `address`='$address', `previousschool`='$previousschool', `attendace`='$attendace', `password`='$password' WHERE id = $id";
    $q = mysqli_query($conn, $update);

    if($q)
   {
    header("location: applycontrol.php");
    exit(); // Ensure no further code is executed after redirection
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/apply.css">

    <title>Update Panel</title>
    <link rel="stylesheet" href="../css/applyupdate.css">
    <style>
        .submit{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    include ("connection.php");

    $id = $_GET['id'];
    $select = "SELECT * FROM apply WHERE id = '$id'";
    $query = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($query);
                $sn = $row[1];
                $email = $row[2];
                $phone = $row[3];
                $add = $row[4];
                $dob = $row[5];
                $ca = $row[6];
                $gender = $row[7];
                $psn = $row[8];
                $ap = $row[9];
                $cp = $row[10];
                $ip = $row[11];
                $sp = $row[12];
                $pr = $row[13];
                $att = $row[14];
                $pss = $row[15];
                $id = $row[0];
    
    ?>
        <form action="#" method="POST" enctype="multipart/form-data">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value = "<?php echo $sn?>" required>
    
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value = "<?php echo $email?>" required>
    
            <label for="phonenumber">Phone Number:</label>
            <input type="tel" id="phonenumber" name="phonenumber" value = "<?php echo $phone?>" required>
    
            <label for="address">Address:</label>
            <input id="address" type="text" name="address" rows="4" value = "<?php echo $add?>" required>
    
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value = "<?php echo $dob?>" required>
    
            <label for="selectclass">Class Admission:</label>
            <select id="selectclass" name="selectclass" value = "<?php echo $ca?>" required>
                <!-- <option disabled selected>Select Class</option> -->
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
    
            <label for="gender">Gender:</label>
            <select id="gender" name="gender"  value = "<?php echo $gender?>" required>
                <!-- <option value="" disabled selected>Select Gender</option> -->
                <option>Male</option>
                <option >Female</option>
                <option>Other</option>
            </select>
    
            <label for="previousschool">Previous School Name:</label>
            <input type="text" id="previousschool" name="previousschool"  value = "<?php echo $psn?>" required>
    
            <label for="Admission_Form">Admission Form:</label>
            <input type="file" id="admission_photo" name="admission_photo" accept=".jpg, .png" value = "<?php echo $ap?>"  >

            <label for="date_of_certificate">Date of Certificate:</label>
            <input type="file" id="birth_photo" name="birth_photo" accept=".jpg, .png" value = "<?php echo $cp?>"  >

            <label for="identification_Proof">Identification Proof:</label>
            <input type="file" id="identification_photo" name="identification_photo" accept=".jpg, .png" value = "<?php echo $ip?>" >
    
            <label for="photo">Photo (JPG or PNG):</label>
            <input type="file" id="photo" name="photo" accept=".jpg, .png" value = "<?php echo $sp?>" >
    
            <label for="previous_year_result">Previous Year Result (PDF):</label>
            <input type="file" id="result" name="result" accept=".pdf, .jpg, .png" value = "<?php echo $pr?>">

            <label for="attendace">Attendace:</label>
            <input type="number" id="attendace" name="attendace" value = "<?php echo $att?>" required>

            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value = "<?php echo $pss?>" required>


            <div class="submit">
            <button type="submit" name="submit">Submit</button>
            </div>
            
        </form>
    </div>
</body>
</html>

