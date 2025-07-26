<?php
// Database connection
$host = 'localhost';
$dbname = 'sms'; 
$username = 'root'; 
$password = ''; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Fetching user input
$email = $_POST['email'];
$password = $_POST['password'];

// Query to check credentials
$stmt = $conn->prepare("SELECT * FROM apply WHERE email = :email AND password = :password");
$stmt->execute(['email' => $email, 'password' => $password]);
$user = $stmt->fetch();

if ($user) {
    // Authentication successful, redirect to dashboard
    header("Location: studentprofile.php?email=$email");
    exit;
} else {
    // Authentication failed, redirect back to login page
    header("Location: studentlogin.php");
    exit;
}
?>
