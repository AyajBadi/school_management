<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPLY CONTROL</title>
    <link rel="stylesheet" href="../css/applycontrol.css">
</head>
<body>
    <h1>APPLY DATA</h1>
    <div class="button-container">
        <a href="applyinsert.php">INSERT DATA</a>
    </div>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Class Admission</th>
            <th>Gender</th>
            <th>Previous School Name</th>
            <th>Admission Form_Photo</th>
            <th>Date of Certificate_Photo</th>
            <th>Identification Proof_Photo</th>
            <th>Student_Photo</th>
            <th>Previous Year Result</th>
            <th>Attendace</th>
            <th>Password</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
            include("connection.php");
            $select = "SELECT * FROM apply";
            $query = mysqli_query($conn, $select);
            while ($row = mysqli_fetch_array($query)) {
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

                echo '
                <tr>
                    <td>'.$sn.'</td>
                    <td>'.$email.'</td>
                    <td>'.$phone.'</td>
                    <td>'.$add.'</td>
                    <td>'.$dob.'</td>
                    <td>'.$ca.'</td>
                    <td>'.$gender.'</td>
                    <td>'.$psn.'</td>
                    <td><img src="'.$ap.'"></td>
                    <td><img src="'.$cp.'"></td>
                    <td><img src="'.$ip.'"></td>
                    <td><img src="'.$sp.'"></td>
                    <td><img src="'.$pr.'"></td>
                    <td>'.$att.'</td>
                    <td>'.$pss.'</td>
                    <td><a href="applydelete.php?id='.$id.'">Delete</a></td>
                    <td><a href="applyupdate.php?id='.$id.'">Update</a></td>
                </tr>
                ';
            }
        ?>
    </table>
</body>
</html>
