<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Mipht...your_hash" crossorigin="anonymous">

    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-TGmP9bZZrFQMWN2u2l1klY..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .navbar-brand img {
      width: 200px;         /* ছবির প্রস্থ ছোট করা */
      height: auto;        /* উচ্চতা স্বয়ংক্রিয় */
      margin-left: 10px;   /* সামান্য বাম সীমানা */
    }

    .navbar {
      padding: 0.3rem 1rem; /* উপরের প্যাডিং কমানো যাতে লোগো উপরে ওঠে */
    }
  </style>

</head>

<body>
     
    <?php 
    session_start();
    $count = 0;
    if(isset($_SESSION['cart'])){
      $count = count($_SESSION['cart']);
    }
    ?>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid font-monospace">
            <a class="navbar-brand pv-2"><img src="logo.png" alt=""></a>
         
        <div class="d-flex">
            <a href="index.php" class="text-warning text-decoration-none pe-2">| <i class="fa-solid fa-house-user"></i> Home |</a>
            <a href="viewCart.php" class="text-warning text-decoration-none pe-2"><i class="fa-solid fa-cart-shopping"></i> Cart(<?php echo $count ?>) |</a>
            <span class="text-warning pe-2">
                <i class="fa-solid fa-user-tie"></i> Hello,
                <?php 
                if(isset($_SESSION['user'])){ 
                  echo $_SESSION['user']; 
                  echo " | <a href='form/logout.php' class='text-warning text-decoration-none pe-2'><i class='fa-solid fa-right-from-bracket'></i> Logout</a>| ";
                }
                else {
                  echo "
                   | <a href='form/login.php' class='text-warning text-decoration-none pe-2'><i class='fa-solid fa-right-to-bracket'></i> Login</a>|
                  ";
                  
                }
                  ?>
                
                <a href="../admin/mystore.php" class="text-warning text-decoration-none pe-2"><i class="fa-solid fa-screwdriver-wrench"></i> Admin</a>|
            </span>
        
    </nav>
    </div>
    <div class="bg-danger sticky-top font-monospace">
        <ul class="list-unstyled d-flex justify-content-center">
            <li><a href="T-Shirt.php" class="text-decoration-none text-white fw-bold fs-4 px-5">T-SHIRT</a></li>
            <li><a href="Hoodie.php" class="text-decoration-none text-white fw-bold fs-4 px-5">HOODIE</a></li>
            <li><a href="Mug.php" class="text-decoration-none text-white fw-bold fs-4 px-5">MUG</a></li>
        </ul>
    </div>
</body>

</html>