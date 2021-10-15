<?php

include 'includes/header.php';

$msg = "";

if (isset($_POST['submit'])) {
    $cat_name = $_POST['cat_name'];
    $cat_order = $_POST['cat_order'];

    $sql = "INSERT INTO categories (cat_name, cat_order) VALUES ('$cat_name', '$cat_order')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "<div class='alert alert-success'>Category has been successfully created.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Something wrong went. Please try again.</div>";
    }
}

?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 col-12 mx-auto bg-white p-4 shadow">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Add Category</h1>

                <form action="" method="post">
                    <?php echo $msg; ?>
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="cat_name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="order">Category Order</label>
                        <input type="number" class="form-control" name="cat_order" id="order" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php'; ?>