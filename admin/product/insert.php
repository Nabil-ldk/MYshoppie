





<?php

if (isset($_POST['submit'])) {
    include 'config.php';
    $product_name = $_POST['Pname'];
    $product_price = $_POST['Pprice'];
    $product_image = $_FILES['Pimage'];
    $image_loc = $_FILES['Pimage']['tmp_name'];
    $image_name = $_FILES['Pimage']['name'];
    $image_des = "Uploadimage/" . $image_name;
    move_uploaded_file($image_loc, "Uploadimage/" . $image_name);
    $product_category = $_POST['Pages'];

    // insert product

   mysqli_query($con,"INSERT INTO `tblproduct` (`Pname`, `Pprice`, `Pimage`, `PCategory`) 
   VALUES ('$product_name', '$product_price', '$image_des', '$product_category')");

   header("Location: index.php");
   

}
?>
 

