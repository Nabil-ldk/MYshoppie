<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Mipht...your_hash" crossorigin="anonymous">

</head>

<body>

    <?php
    include 'mystore.php';
    $con = mysqli_connect('localhost', 'root', '19332360nAbil@.com', 'ecommerce');

    // Optional: check for connection errors
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $Record = mysqli_query($con, "SELECT * FROM `tbluser`");
    $row_count = mysqli_num_rows($Record);

    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">




                <table class="table table-secondary table-bordered">
                    <thead class="text-center">
                        <th>S.Number</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Number</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        
                        <?php
                        $i = 0;

                        while ($row = mysqli_fetch_array($Record)) {
                            echo "
           <tr>
            <td class='text-center text-danger'> ";?><?php echo ++$i ?><?php echo "</td>
            <td class='text-center text-danger'>$row[UserName]</td>
            <td class='text-center text-danger'>$row[Email]</td>
            <td class='text-center text-danger'>$row[Number]</td>
            <td class='text-center text-danger'><a href='delete.php? ID=$row[Id]' class='btn btn-outline-danger'>Delete</a></td>
           </tr>
           ";
                        }

                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2 pr-5 text-center">

                <h3 class="text-danger">Total</h3>
                <h1 class="bg-danger text-white"><?php echo $row_count; ?></h1>


            </div>
        </div>
    </div>

</body>

</html>