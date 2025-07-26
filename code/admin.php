<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        .logout-btn {
    background-color: #f44336; /* Red background color */
    color: white; /* White text color */
    padding: 10px 20px; /* Padding */
    border: none; /* No border */
    cursor: pointer; /* Cursor on hover */
    border-radius: 5px; /* Rounded corners */
    margin-top: 20px; /* Margin from top */
    display: block; /* Make the button a block element */
    width: 100%; /* Full width */
    text-align: center; /* Center text */
    margin-top: 120px;
}

.logout-btn:hover {
    background-color: #d32f2f; /* Darker red on hover */
}

.count{
    display: flex;
}
.total-records {
    margin-top: 20px; /* Adjust margin from the top */
    padding: 10px; /* Add padding */
    background-color: #00ffd0; /* Background color */
    border-radius: 5px; /* Add rounded corners */
    text-align: center; /* Center align text */
    width: 15%;
    height: 110px;
    margin-left: 20px;
}


.totalteacher{
    margin-top: 20px; /* Adjust margin from the top */
    padding: 10px; /* Add padding */
    background-color: #00ffd0; /* Background color */
    border-radius: 5px; /* Add rounded corners */
    text-align: center; /* Center align text */
    width: 15%;
    height: 110px;
    margin-left: 10px;
}


.container {
    display: flex;
}

.class{
    margin-top: 20px; /* Adjust margin from the top */
    padding: 10px; /* Add padding */
    background-color: #00ffd0; /* Background color */
    border-radius: 5px; /* Add rounded corners */
    text-align: center; /* Center align text */
    width: 15%;
    height: 110px;
    margin-left: 10px;
}


    </style>
    
</head>
<body>
    <div class="header">
        <h2>Welcome to Admin Panel</h2>
    </div>
    <div class="sidebar">
        <div class="admin-info">
            <img src="../image/admin1233.jpeg" alt="Admin Photo" class="admin-photo">
            <p>Admin Name</p>
        </div>
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="enquirycontrol.php">Enquiry</a></li>
            <li><a href="applycontrol.php">Apply</a></li>
            <li><a href="eventcontrol.php">Event</a></li>
        </ul>
        <form action="adminlogin.php" method="POST">
            <button type="submit" name="logout" class="logout-btn">Logout</button>
        </form>
    </div>
    <div class="count">
    <div class="total-records">
    <?php include ("totalstudent.php"); ?>
    </div>
    <div class="totalteacher">
        <h2>Total Teacher: 80</h2>
    </div>
    </div>


    <div class="heading">
        <h3>Student Record</h3>
    </div>
    <div class="container">
        <!-- class-1 student -->
        <div class="class">
            <?php include ("class1.php"); ?>
        </div>
       <!-- class-2 student -->
        <div class="class">
            <?php include ("class2.php"); ?>
        </div>
        <!-- class-3 student -->
        <div class="class">
        <?php include ("class3.php"); ?>
        </div>
        <!-- class-4 student -->
        <div class="class">
        <?php include ("class4.php"); ?>
        </div>
        <!-- class-5 student -->
        <div class="class">
        <?php include ("class5.php"); ?>
        </div>
    </div>

      <!-- step-2 -->
    <div class="container">
        <!-- class-6 student -->
        <div class="class">
        <?php include ("class6.php"); ?>
        </div>
       <!-- class-7 student -->
        <div class="class">
        <?php include ("class7.php"); ?>
        </div>
        <!-- class-8 student -->
        <div class="class">
        <?php include ("class8.php"); ?>
        </div>
        <!-- class-9 student -->
        <div class="class">
        <?php include ("class9.php"); ?>
        </div>
        <!-- class-10 student -->
        <div class="class">
        <?php include ("class10.php"); ?>
        </div>
    </div>
     <!-- step-3 -->

     <div class="container">
        <!-- class-11 student -->
        <div class="class">
        <?php include ("class11.php"); ?>
        </div>
       <!-- class-12 student -->
        <div class="class">
        <?php include ("class12.php"); ?>
        </div>
    </div>
</body>
</html>


