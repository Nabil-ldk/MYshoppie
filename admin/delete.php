

<?php

   $Id = $_GET['ID'];
    $con = mysqli_connect('localhost', 'root', '19332360nAbil@.com', 'ecommerce');

    // Optional: check for connection errors
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
   
   mysqli_query($con, "DELETE FROM `tbluser` WHERE Id = $Id ");

   header("location:user.php");
    
    ?>