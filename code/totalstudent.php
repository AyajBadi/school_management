<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sms";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get total number of records from your table
$sql = "SELECT COUNT(*) AS total FROM apply";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_records = $row['total'];

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Records</title>
    <!-- Add your CSS link here -->
</head>
<body>
    <h2>Total Student: <?php echo $total_records; ?></h2>
</body>
</html>