<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-page</title>
    <?php
    include 'header.php';
    ?>
    
    <style>
    .card {
       width: 18rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%; /* Equal height cards */
    }
    .card-img-top {
      height: 200px;
      object-fit: contain;
    }
  </style>

</head>

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">


                <h1 class="text-warning font-monospace text-center my-3 fw-bold ">HOODIE</h1>
                <?php
                include 'config.php';
                $Record = mysqli_query($con, "SELECT * FROM `tblproduct`");
                while ($row = mysqli_fetch_array($Record)) {

                    $check_page = $row['PCategory'];
                    if($check_page ==='Hoodie'){

                    echo "
     <div class='col-md-6 col-lg-4 m-auto mb-3'> 
     <form action = 'Insertcart.php' method = 'POST'>
    <div class='card m-auto' style='width: 18rem;'>
        <img src='../admin/product/$row[Pimage]' class='card-img-top'>
        <div class='card-body text-center'>
            <h5 class='card-title text-danger fs-4 fw-bold'>$row[Pname]</h5>
            <p class='card-text text-danger fs-4 fw-bold'>";?> BDT: <?php echo number_format($row['Pprice'],2) ?> <?php echo " </p>
            <input type = 'hidden' name = 'Pname' value = '$row[Pname]' >
            <input type = 'hidden' name = 'Pprice' value = '$row[Pprice]' >
            <input type='number' name='Pquantity' value = 'min='1' max='20'' placeholder = 'quantity' class='text-center'><br><br>
            <input type='submit' name='addCart' class='btn btn-warning text-white w-100' value='Add To Cart'>
            
        </div>
    </div>
    </form>
     </div>   
     ";
                }
                }
                ?>
            </div>
        </div>
    </div>
        <?php

    include 'footer.php';

    ?>
</body>

</html>

