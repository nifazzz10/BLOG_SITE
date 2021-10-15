<?php include 'includes/header.php';

if (isset($_GET["id"])) {
    $post_id = $_GET["id"];
    $sql = "SELECT * FROM posts WHERE id='$post_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $post_view = $row['view'] + 1;
        $update_view_sql = "UPDATE posts SET view='$post_view' WHERE id='$post_id'";
        $update_view = mysqli_query($conn, $update_view_sql);
    }
} else {
    die("<script>window.location.replace('index.php');</script>");
}

?>
        <div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-leaf bg-green"></i> Blog</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                <span class="color-green"><a href="category.php" title="">
                                <?php
                                $sql1 = "SELECT cat_name FROM categories WHERE id='{$row["cat_id"]}'";
                                $result1 = mysqli_query($conn, $sql1);
                                if (mysqli_num_rows($result1) > 0) {
                                    $cat_data = mysqli_fetch_assoc($result1);
                                    echo $cat_data['cat_name'];
                                }
                                ?>
                                </a></span>

                                <h3><?php echo $row["title"]; ?></h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="#" title=""><?php echo $row["date"]; ?></a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> <?php echo $row["view"]; ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="<?php if (file_exists("admin/uploads/" . $row['img'])) { echo "admin/uploads/" . $row['img']; } else { echo "admin/uploads/" . $row['old_img']; } ?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <div class="pp">
                                    <p><?php echo $row["description"]; ?></p>

                                </div><!-- end pp -->
                            </div><!-- end content -->                            

                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">Jessica</a></h4>
                                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Forest Time!</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <?php

                            $sql1 = "SELECT * FROM posts WHERE cat_id='{$row["cat_id"]}'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {

                            ?>
                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                    <?php

                                    while ($row1 = mysqli_fetch_assoc($result1)) {

                                    ?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="single.php?id=<?php echo $row1['id']; ?>" title="">
                                                    <img src="<?php if (file_exists("admin/uploads/" . $row1['img'])) { echo "admin/uploads/" . $row1['img']; } else { echo "admin/uploads/" . $row1['old_img']; } ?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="single.php?id=<?php echo $row1['id']; ?>" title="<?php echo $row1['title']; ?>"><?php echo $row1['title']; ?></a></h4>
                                                <small><a href="#" title=""><?php echo $row1['date']; ?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    <?php } ?>
                                </div><!-- end row -->
                            </div><!-- end custom-box -->
                            <?php } ?>

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">3 Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author_01.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small></h4>

                                                    <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media last-child">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                                    <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper">
                                            <input type="text" class="form-control" placeholder="Your name">
                                            <input type="text" class="form-control" placeholder="Email address">
                                            <input type="text" class="form-control" placeholder="Website">
                                            <textarea class="form-control" placeholder="Your comment"></textarea>
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                    <?php include 'includes/sidebar.php'; ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include 'includes/footer.php'; ?>