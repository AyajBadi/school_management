<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "sms"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT COUNT(*) AS class12 FROM apply WHERE selectclass = 'class12'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    echo "<b>Total students in Class-12: </b><br><br>" . $row["class12"];
} else {
    echo "0 results";
}

$conn->close();
?>
