<?php
// Database connection
$host = 'localhost';
$dbname = 'sms'; // Replace 'your_database_name' with your actual database name
$username = 'root'; // Replace 'your_username' with your actual username
$password = ''; // Replace 'your_password' with your actual password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Fetching email from URL parameter
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Query to fetch student information based on email
    $stmt = $conn->prepare("SELECT * FROM apply WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $student = $stmt->fetch();

    // Display student information
    if ($student) {
        echo "<div style='margin: 20px; padding: 10px; border: 1px solid #ccc;'>";
        echo "<h2 style='color: blue;'>Welcome, " . $student['fullname'] . "!</h2>";
        echo "<p><b style='color: red;'>Email:</b> " . $student['email'] . "</p>";
        echo "<p><b style='color: red;'>Phone Number:</b> " . $student['phonenumber'] . "</p>";
        echo "<p><b style='color: red;'>Address:</b> " . $student['address'] . "</p>";
        echo "<p><b style='color: red;'>Date of Birth:</b> " . $student['dob'] . "</p>";
        echo "<p><b style='color: red;'>Password:</b> " . $student['password'] . "</p>";
        echo "<p><b style='color: red;'>Attendace:</b> " . $student['attendace'] . "</p>";
        echo "<p><b style='color: red;'>Student Class:</b> " . $student['selectclass'] . "</p>";
        echo "<p><b style='color: red;'>Gender:</b> " . $student['gender'] . "</p>";

        echo "<form action='studentlogin.php' method='post'>";
    echo "<input type='submit' value='Logout' style='margin-top: 10px; padding: 5px 10px; background-color: #ff0000; color: #ffffff; border: none; cursor: pointer;'>";
    echo "</form>";

        echo "</div>";

        
    } else {
        echo "Student not found!";
    }
} else {
    echo "Email parameter not provided!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
</head>
<body>
    
</body>
</html>
