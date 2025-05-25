<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin home-page</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Mipht...your_hash" crossorigin="anonymous">

  <!-- Fontawesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-TGmP9bZZrFQMWN2u2l1klY..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
 session_start();
 if(!$_SESSION['admin']){
  header("location:form/login.php");
 }
?>
<body>

  <nav class="navbar bg-dark">
    <div class="container-fluid text-white">
      <a class="navbar-brand text-white"><h1>Mystore</h1></a>
      <span class="d-flex align-items-center gap-2">
        <i class="fa-brands fa-vaadin"></i>
        Hello,<?php echo $_SESSION['admin']; ?> |
        <i class="fa-solid fa-right-from-bracket"></i>
        <a href="form/logout.php" class="text-decoration-none text-white">Logout</a> |
        <a href="../user/index.php" class="text-decoration-none text-white">Userpanel</a>
      </span>
    </div>
  </nav>
             <div>
                  <h2 class="text-center">Dashboard</h2>
             </div>
             <div class="col-md-6 bg-danger text-center m-auto">
                <a href="product/index.php" class="text-decoration-none text-white fs-4 fw-bold px-5">Add Post</a>
                <a href="user.php" class="text-decoration-none text-white fs-4 fw-bold px-5">Users</a>
             </div>
</body>
</html>
