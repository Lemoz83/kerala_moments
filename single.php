<?php
include('includes/header.php')
    ?>
<!--Navbar -->
<?php
include('includes/navbar.php')
    ?>

<!--/.Navbar -->
<!-- Blog-Section -->
<section class="blog-single ">
    <div class="container">
        <div class="main-contant">

            <?php
            include('admin/database/dbconfig.php');
            $query = "SELECT * FROM blog ORDER BY id DESC LIMIT 1";
            $insert_query = mysqli_query($con, $query);


            // $indicator_html = '';
            // $slider_html = '';
            if (mysqli_num_rows($insert_query) > 0) {

                while ($rows = mysqli_fetch_assoc($insert_query)) {
                    $olddate = $rows['date'];
                    $newdate = date("d-m-Y", strtotime($olddate));
                    ?>

                    <div class='row'>
                        <div class='col-sm-12'>
                            <figure class='figure'>
                                <img src="<?php echo "admin/upload/upload_blog/" . $rows['image']; ?>"
                                    class="figure-img img-fluid"
                                    alt="A generic square placeholder image with rounded corners in a figure.">
                                <figcaption class="figure-caption">
                                    <div class="btn-group">
                                        <a href="single.php" class="btn btn-danger">
                                            <?php echo $rows['state']; ?>,
                                            <?php echo $rows['country']; ?>
                                        </a>
                                        <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                                            1</button>
                                    </div>
                                    <span>Posted on :
                                        <?php echo $newdate; ?>

                                    </span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-sm-12">
                            <h3>
                                <?php echo $rows['blog_title']; ?>
                            </h3>

                            <?php echo $rows['blog_content']; ?>


                            <hr />
                        </div>
                    </div>

                    <?php
                }
            }
            ?>


            <div class="row single-image-row">
                <div class="col-md-6 offset-md-3">
                    <h2>Suggested Posts to Read</h2>
                </div>



                <div class="col col-md-12 col-sm-12 single-blog-row">



                    <div class="row">
                        <?php

                        $query = "SELECT * FROM blog ORDER BY id DESC LIMIT 2 OFFSET 1";
                        $insert_query = mysqli_query($con, $query);

                        // $indicator_html = '';
                        // $slider_html = '';
                        if (mysqli_num_rows($insert_query) > 0) {

                            while ($rows = mysqli_fetch_assoc($insert_query)) {
                                $olddate = $rows['date'];
                                $newdate = date("d-m-Y", strtotime($olddate));
                                ?>
                                <div class="col-md-3">
                                    <figure class="single-figure">
                                        <img src="<?php echo "admin/upload/upload_blog/" . $rows['image']; ?>"
                                            class="single-figure-img img-fluid"
                                            alt="A generic square placeholder image with rounded corners in a figure.">
                                        <figcaption class="single-figure-caption"> <img src="images/comment.png"
                                                alt=""><span>01</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="single-caption"><a href="single.php">
                                            <?php echo $rows['blog_title']; ?>
                                        </a>
                                    </h4>
                                    <div class="btn-group">
                                        <a href="single.php" class="btn btn-danger single-btn-danger">
                                            <?php echo $rows['state']; ?>,
                                            <?php echo $rows['country']; ?>
                                        </a>
                                        <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>1</button>
                                    </div>
                                    <p>Posted on :
                                        <?php echo $newdate; ?>
                                    </p>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <!-- <div class="col-md-3">
                                    <figure class="single-figure">
                                        <img src="images/banner-image-1.jpg" class="single-figure-img img-fluid"
                                            alt="A generic square placeholder image with rounded corners in a figure.">
                                        <figcaption class="single-figure-caption"> <img src="images/comment.png"
                                                alt=""><span>01</span>
                                        </figcaption>
                                    </figure>
                                </div> -->
                        <!-- <div class="col-md-3">
                                    <h4 class="single-caption"><a href="single.php">Super and up for the comming model in shoot
                                            at newyork USA
                                            morning..</a>
                                    </h4>
                                    <div class="btn-group">
                                        <a href="single.php" class="btn btn-danger single-btn-danger">Kerala, India</a>
                                        <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>1</button>
                                    </div>
                                    <p>Posted on : 15.12.2022</p>
                                </div> -->
                    </div>

                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <h2>Blog Read Comments Post</h2>
                </div>
            </div>
            <form action="codesingle.php" method="post" class="form">
                <div class="form-row">

                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Enter your namespan**"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="email" class="form-control" name="email" placeholder=" Enter your email**"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="place" placeholder=" Enter your place.">
                    </div>
                    <div class="col-md-12 mb-3">
                        <textarea class="form-control" rows="5" name="comment" placeholder="Write your message**"
                            required></textarea>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" name="submit_comment">Submit Comment</button>
            </form>
            <div class="post">
                <div class="row">
                    <?php

                    $query = "SELECT * FROM blog_comments ORDER BY id DESC LIMIT 4 ";
                    $insert_query = mysqli_query($con, $query);

                    $rows = mysqli_num_rows($insert_query);

                    echo '<div class="col-sm-12">
                    <h5 style="color:green;">Total Comments Posted: ' . $rows . '</h5>
                        <h2>Recent Comments </h2>
                    </div>'
                        ?>
                </div>
                <div class="row">
                    <?php

                    $query = "SELECT * FROM blog_comments ORDER BY id DESC LIMIT 4 ";
                    $insert_query = mysqli_query($con, $query);

                    if (mysqli_num_rows($insert_query) > 0) {

                        while ($rows = mysqli_fetch_assoc($insert_query)) {
                            $olddate = $rows['date'];
                            $newdate = date("d-m-Y , H:i ", strtotime($olddate));
                            ?>


                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="col1">
                                    <p><strong><span>
                                                <?php echo $newdate ?>,
                                                <?php echo $rows['place'] ?>
                                            </span>
                                            <?php echo $rows['name'] ?>
                                        </strong>
                                        <?php echo $rows['comment'] ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <!-- <div class="col-lg-6 col-md-12 col-12">
                        <div class="col1">
                            <p><strong><span>12.06.2016</span>Mahender Singh</strong>Really like the way you write
                                the articles about your photography</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="col1">
                            <p><strong><span>12.06.2016</span>Sudharshan Karnati</strong>Really like the way you
                                write the articles about your photography</p>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Support section Ended -->
<!--/.Portfolio-Section -->
<!-- Footer -->
<footer>
    <?php
    include('includes/footer.php')
        ?>
</footer>
<!-- /.Footer -->
<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
include('includes/script.php')
    ?>
</body>

</html>