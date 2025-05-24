

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Update</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
include 'config.php';

// Sanitize GET input
$id = isset($_GET['ID']) ? intval($_GET['ID']) : 0;

$Record = mysqli_query($con, "SELECT * FROM `tblproduct` WHERE Id = $id ");
$data = mysqli_fetch_array($Record);
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto border border-primary mt-3 p-3">

            <form action="" method="POST" enctype="multipart/form-data">
                <p class="text-center fw-bold fs-3 text-warning">Product Update</p>

                <div class="mb-3">
                    <label class="form-label">Product Name:</label>
                    <input type="text" value="<?php echo htmlspecialchars($data['Pname']); ?>" name="Pname" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Price:</label>
                    <input type="text" value="<?php echo htmlspecialchars($data['Pprice']); ?>" name="Pprice" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Add Product Image:</label>
                    <input type="file" name="Pimage" class="form-control"><br>
                    <img src="<?php echo $data['Pimage']; ?>" alt="Current Image" style="height: 100px;">
                </div>

                <div class="mb-3">
                    <label class="form-label">Select Page Category:</label>
                    <select class="form-select" name="Pages" required>
                        <option value="Home" <?php if($data['PCategory'] == 'Home') echo 'selected'; ?>>Home</option>
                        <option value="T-Shirt" <?php if($data['PCategory'] == 'T-Shirt') echo 'selected'; ?>>T-Shirt</option>
                        <option value="Hoodie" <?php if($data['PCategory'] == 'Hoodie') echo 'selected'; ?>>Hoodie</option>
                        <option value="Mug" <?php if($data['PCategory'] == 'Mug') echo 'selected'; ?>>Mug</option>
                    </select>
                </div>

                <input type="hidden" name="id" value="<?php echo $data['Id']; ?>">
                <input type="hidden" name="old_image" value="<?php echo $data['Pimage']; ?>">

                <button name="update" class="btn btn-danger fs-5 fw-bold w-100">Update</button>
            </form>

        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $product_name = mysqli_real_escape_string($con, $_POST['Pname']);
    $product_price = mysqli_real_escape_string($con, $_POST['Pprice']);
    $product_category = mysqli_real_escape_string($con, $_POST['Pages']);

    $image_des = $_POST['old_image']; // Default to old image

    if (!empty($_FILES['Pimage']['name'])) {
        $image_loc = $_FILES['Pimage']['tmp_name'];
        $image_name = $_FILES['Pimage']['name'];
        $image_des = "Uploadimage/" . basename($image_name);
        move_uploaded_file($image_loc, $image_des);
    }

    $update_query = "UPDATE `tblproduct` SET 
                        `Pname`='$product_name',
                        `Pprice`='$product_price',
                        `Pimage`='$image_des',
                        `PCategory`='$product_category'
                     WHERE Id = $id";

    if (mysqli_query($con, $update_query)) {
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<div class='text-danger text-center'>Failed to update product.</div>";
    }
}
?>

</body>
</html>
