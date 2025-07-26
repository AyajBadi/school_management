<?php
    // Define the links you want to search for
    $links = array("apply.php", "enquiry.php", "studentlogin.php", "anotherlink.php");

    // Check if the form is submitted
    if(isset($_GET['submit'])) {
        // Get the search term from the form
        $searchTerm = $_GET['search'];

        // Loop through the links array to search for the term
        foreach($links as $link) {
            // Check if the search term is found in the link
            if(strpos($link, $searchTerm) !== false) {
                echo "<p>Found link: <a href='$apply.php'>$link</a></p>";
            }
        }
    }
    ?>