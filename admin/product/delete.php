<?php

   $Id = $_GET['ID'];
   include 'config.php';
   mysqli_query($con, "DELETE FROM `tblproduct` WHERE Id = $Id ");

   header("location:index.php");
    

    ?>