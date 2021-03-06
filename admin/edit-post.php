<?php

include 'includes/header.php';

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
} else {
    echo "<script>window.location.replace('posts.php');</script>";
}

$msg = "";

error_reporting(0);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cat_id = $_POST['category'];

    $img_name = rand() . $_FILES['img']['name'];
    $img_tmp_name = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['size'];
    $old_img = $_POST['old_img'];

    if ($img_size > 5242880) {
        $msg = "<div class='alert alert-danger'>Image is too big. Maximum image uploading size is 5 MB.</div>";
    } else {
        $sql = "UPDATE posts SET title='$title', description='$description', img='$img_name', old_img='$old_img', cat_id='$cat_id' WHERE id='$post_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            move_uploaded_file($img_tmp_name, "uploads/" . $img_name);
            $msg = "<div class='alert alert-success'>Post updated successful.</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Something wrong went. Please try again later.</div>";
        }
    }
}

?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 col-12 mx-auto bg-white p-4 shadow">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Edit Post</h1>

                <form action="" method="post" enctype="multipart/form-data">
                    <?php echo $msg;
                    
                    $sql1 = "SELECT * FROM posts WHERE id='$post_id'";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {

                    ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="<?php echo $row1['title']; ?>" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="5" id="description" required><?php echo $row1['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category" required>
                            <option value="" selected hidden disabled>Select Category</option>
                            <?php

                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            
                            ?>
                            <option <?php if ($row1['cat_id'] == $row['id']) { echo "selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['cat_name']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" accept="image/*" class="form-control" name="img" id="img">
                        <input type="hidden" name="old_img" value="<?php echo $row1['img']; ?>">
                    </div>
                    <?php } } ?>
                    <button type="submit" name="submit" class="btn btn-primary">Update Post</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php'; ?>