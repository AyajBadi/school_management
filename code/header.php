<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header file</title>
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <header>
        <h1>SAURASHTRA INTERNATIONAL SCHOOL</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="teacher.php">Teacher</a></li>
            <li>
                <a href="syllabus.php">Syllabus</a>
                <div class="dropdown-content">
                    <a href="syllabus.php" class="dropdown-option">STD 1 To 8</a>
                    <a href="syllabus2.php" class="dropdown-option">STD 9 and 10</a>
                    <a href="syllabus3.php" class="dropdown-option">STD 11 and 12</a>
                </div>
            </li>
            <li><a href="aboutus.php" style="text-align: center; margin-top: 20px;">About Us</a></li>
            <li><a href="studentlogin.php">Login</a></li>
        </ul>
        <!-- <div class="search-container">
            <form action="search.php">
                <input type="text" placeholder="Search..." name="search">
                <button type="submit">Search</button>
            </form>
        </div> -->
    </nav>
    
</body>

</html>