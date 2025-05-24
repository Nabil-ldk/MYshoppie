


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewCart</title>

</head>

<body>

    <?php
    include 'header.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center bg-light mb-5 rounded">
                <h1 class="text-warning">My Cart</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-6 col-lg-9">
                <table class="table table-bordered">
                    <thead>
                        <th class="bg-danger text-white text-center">Serial Number</th>
                        <th class="bg-danger text-white text-center">Product Name</th>
                        <th class="bg-danger text-white text-center">Product Price</th>
                        <th class="bg-danger text-white text-center">Product Quantity</th>
                        <th class="bg-danger text-white text-center">Total Price</th>
                        <th class="bg-danger text-white text-center">Update</th>
                        <th class="bg-danger text-white text-center">Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        
                        $Ptotal = 0;
                        $total = 0;
                        $i = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $Ptotal = $value['productPrice'] * $value['productQuantity'];
                                $total += $value['productPrice'] * $value['productQuantity'];
                                $i = $key + 1;

                                echo "
                                <form action = 'Insertcart.php' method ='POST'>
                                 <tr class='text-center'>
                                    <td>$i</td>
                                    <td><input type='hidden' name='Pname' value='$value[productName]'>$value[productName]</td>
                                    <td><input type='hidden' name='Pprice' value='$value[productPrice]'>$value[productPrice]</td>
                                    <td><input type='text' name='Pquantity' value='$value[productQuantity]'></td>
                                    <td>$Ptotal</td>
                                    <td><button name='update' class='btn btn-warning'>Update</button></td>
                                    <td><button name='remove' class='btn btn-danger'>Delete</button></td>
                                    <td><input type='hidden' name='item' value='$value[productName]'></td>
                                 </tr>
                                 </form>
                                ";
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            <div class="col-lg-3 text-center">
                <h1 class="bg-warning text-white fw-bold">TOTAL</h1>
                <h2 class="bg-danger text-white"><?php echo number_format($total,2) ?></h2>
            </div>
        </div>
    </div>

</body>

</html>