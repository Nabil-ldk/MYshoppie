





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product-page</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Mipht...your_hash" crossorigin="anonymous">
     
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto border border-primary mt-3">

                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <p class="text-center fw-bold fs-3 text-warning">Product details:</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Name:</label>
                        <input type="text" name="Pname" class="form-control" placeholder="Enter product name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Price:</label>
                        <input type="text" name="Pprice" class="form-control" placeholder="Enter product price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Add Product Image:</label>
                        <input type="file" name="Pimage" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Page Category:</label>
                        <select class="form-select" name="Pages">
                            <option value="Home">Home</option>
                            <option value="T-Shirt">T-Shirt</option>
                            <option value="Hoodie">Hoodie</option>
                            <option value="Mug">Mug</option>
                        </select>
                    </div>
                    <button name="submit" class="bg-danger fs-4 fw-bold my-3 form-control text-white">Upload</button>
                </form>

            </div>
        </div>
    </div>
    <!-- fetch data -->
    <div class="container">
        <div class="row">
            <div class="col-md-7 m-auto">

           
    <table class="table border border-warning table-hover border my-5">
        <thead>
            <th class="bg-dark text-white fs-5 font-monospace text-center">Id</th>
            <th class="bg-dark text-white fs-5 font-monospace text-center">Name</th>
            <th class="bg-dark text-white fs-5 font-monospace text-center">Price</th>
            <th class="bg-dark text-white fs-5 font-monospace text-center">Image</th>
            <th class="bg-dark text-white fs-5 font-monospace text-center">Category</th>
            <th class="bg-dark text-white fs-5 font-monospace text-center">Delete</th>
            <th class="bg-dark text-white fs-5 font-monospace text-center">Update</th>
        </thead>
        

        <tbody class="text-center">
            <?php
            include 'config.php';
            $Record = mysqli_query($con, "SELECT * FROM `tblproduct`");
            $i = 1;
            while ($row = mysqli_fetch_array($Record)){
                echo "
                  <tr>
                   <td>$i</td>
                   <td>$row[Pname]</td>
                   <td>$row[Pprice]</td>
                   <td><img src='$row[Pimage]' height='90px' weight='200px'></td>
                   <td>$row[PCategory]</td>
                   <td><a href='delete.php? ID= $row[Id]' class='btn btn-danger'>Delete</a></td>
                   <td><a href='update.php? ID= $row[Id]' class='btn btn-warning'>Update</a></td>
                  </tr> 
                ";
                $i++;
                }
            ?>
        </tbody>
    </table>
     </div>
        </div>
    </div>
</body>

</html>