<?php include 'includes/header.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Posts</h1>

        <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM posts";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $id = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php
                            
                            $show_category = mysqli_query($conn, "SELECT * FROM categories WHERE id='{$row["cat_id"]}'");
                            if (mysqli_num_rows($show_category) > 0) {
                                $category_data = mysqli_fetch_assoc($show_category);
                                echo $category_data['cat_name'];
                            }
                            
                            ?></td>
                            <td>
                                <a href="edit-post.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="delete-post.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php

                            $id++; }
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