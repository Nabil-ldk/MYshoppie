<?php
$con = mysqli_connect('localhost', 'root', '19332360nAbil@.com', 'ecommerce');

// Optional: check for connection errors
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$A_name = $_POST['username'];
$A_password = $_POST['userpassword'];

$result = mysqli_query($con,"SELECT * FROM `admin` WHERE username = '$A_name' AND userpassword = '$A_password'");

session_start();

if (mysqli_num_rows($result)){
    $_SESSION['admin'] = $A_name;
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


