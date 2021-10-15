<?php include 'includes/header.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Categories</h1>

        <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
        </div>
        <div class="card-body">
            <?php 
            
            if (isset($_GET['remove_success'])) {
                if ($_GET['remove_success'] == "true") {
                    echo "<div class='alert alert-success'>Record deleted successful.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Record can't deleted.</div>";
                }
            }

            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Category Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['cat_name']; ?></td>
                            <td><?php echo $row['cat_order']; ?></td>
                            <td>
                                <a href="edit-category.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="delete-category.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php

                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'includes/footer.php'; ?>