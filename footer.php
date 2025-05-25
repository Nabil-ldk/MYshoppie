<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin home-page</title>

 </head>
<body>

  </body>
</html>






 <!-- fetch data -->
    <table class="table table-hover">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>
    </table>

header("Location: index.php");

<?php
$con = mysqli_connect('localhost', 'root', '19332360nAbil@.com', 'ecommerce');

// Optional: check for connection errors
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$A_name = $_POST['username'];
$A_password = $_POST['userpassword'];

$result = mysqli_query($con,"SELECT * FROM `admin` WHERE username = '$A_name' AND userpassword = '$A_password'");
if (mysqli_num_rows($result)){
    echo"
       <script>
               alert('Login successfully');
               window.location.href='../mystore.php';
       </script>
    ";
}
else {
    echo"
       <script>
               alert('Invalid username/password');
               window.location.href='login.php';
       </script>
    ";
}
?>
