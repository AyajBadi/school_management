<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "sms"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT COUNT(*) AS class2 FROM apply WHERE selectclass = 'class2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    echo "<b>Total students in Class-2: </b><br><br>" . $row["class2"];
} else {
    echo "0 results";
}

$conn->close();
?>
