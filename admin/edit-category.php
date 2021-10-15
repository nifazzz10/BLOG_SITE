<?php

include 'includes/header.php';

$id = $_GET['id'];

$msg = "";

if (isset($_POST['submit'])) {
    $cat_name = $_POST['cat_name'];
    $cat_order = $_POST['cat_order'];

    $sql = "UPDATE categories SET cat_name='$cat_name', cat_order='$cat_order' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "<div class='alert alert-success'>Category has been successfully updated.</div>";
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
                <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>

                <form action="" method="post">
                    <?php echo $msg;
                    
                    $sql = "SELECT * FROM categories WHERE id='$id'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="cat_name" id="name" value="<?php echo $row['cat_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="order">Category Order</label>
                        <input type="number" class="form-control" name="cat_order" value="<?php echo $row['cat_order']; ?>" id="order" required>
                    </div>
                    <?php } } ?>
                    <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php'; ?>