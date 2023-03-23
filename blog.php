<?php

$title = "Blog-Kerala Moments";
include('includes/header.php')
    ?>
<!--Navbar -->
<?php include('includes/navbar.php') ?>
<!--/.Navbar -->
<!-- Blog-Section -->
<section class="blog-page">
    <div class="container">

        <div class="row image-row">

            <div class="col-md-6 offset-md-3">
                <h2>My Recent Blog Posts</h2>
            </div>


            <?php
            include('admin/database/dbconfig.php');
            $limit = 8;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1) * $limit;
            $query = "SELECT * FROM blog ORDER BY id DESC LIMIT {$offset},{$limit}";
            $insert_query = mysqli_query($con, $query);

            $indicator_html = '';
            $slider_html = '';
            $total_rows = mysqli_num_rows($insert_query);

            if ($total_rows > 0) {

                while ($rows = mysqli_fetch_assoc($insert_query)) {
                    $olddate = $rows['date'];
                    $newdate = date("d-m-Y", strtotime($olddate));


                    // $image = "" . $rows['image'] . "";
                    // slider image html
                    $slider_html .= "<div class='col-md-6'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <figure class='figure'>
                                <a href='single.php'><img src='admin/upload/upload_blog/" . $rows['image'] . "'
                                        class='figure-img img-fluid'
                                        alt='A generic square placeholder image with rounded corners in a figure.'></a>
                                <figcaption class='figure-caption'> <img src='images/comment.png'
                                        alt=''><span>01</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class='col-md-6'>
                            <h4><a href='single.php'>" . $rows['blog_title'] . "</a></h4>
                            <div class='btn-group'>
                                <a href='single.php' class='btn btn-danger'>" . $rows['state'] . ", " . $rows['country'] . "</a>
                                <button class='btn btn-primary'><i class='fa fa-eye'
                                        aria-hidden='true'></i>1</button>
                            </div>
                            <p>Posted on : " . $newdate . "</p>
                        </div>
                    </div>
                </div>
                ";
                    //                 $slider_html .= "<img class='d-block w-100' src='admin/upload/upload_cr/" . $rows['cr_image'] . "' alt='$thumb_image'/>";
                    //                 $slider_html .= "
                    // <div class='carousel-caption'>
                    //   <h1>" . $rows['cr_main'] . "</h1>
                    //   <p class='lead'>" . $rows['cr_sub'] . "</p>
                    //   <a class='btn btn-primary' href='about.php'><span>Learn more</span></a>
                    // </div></div>";
                    // Thumbnail html
                    // $thumb_html .= "<li><img src='images/" . $thumb_image . "' alt='$thumb_image'></li>";
                    // Button html
                    //     $indicator_html .= "<div class='col-md-3'>
                    //     <h4><a href='single.php'>" . $rows['blog_title'] . "</a></h4>
                    //     <div class='btn-group'>
                    //         <a href='single.php' class='btn btn-danger'>" . $rows['state'] . " , " . $rows['country'] . "</a>
                    //         <button class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'></i>1</button>
                    //     </div>
                    //     <p>Posted on : " . $rows['date'] . "</p>
                    // </div>";
            

                }


            }



            ?>

            <div class="col col-md-12 col-sm-12 blog-row">



                <div class="row ">

                    <?php echo $slider_html; ?>

                    <!-- <div class="col-md-3">
                        <figure class="figure">
                            <a href="single.php"><img src="images/banner-image-1.jpg" class="figure-img img-fluid"
                                    alt="A generic square placeholder image with rounded corners in a figure."></a>
                            <figcaption class="figure-caption"> <img src="images/comment.png" alt=""><span>01</span>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-3">
                        <h4><a href="single.php">Super and up for the comming model in shoot at newyork USA
                                morning..</a></h4>
                        <div class="btn-group">
                            <a href="single.php" class="btn btn-danger">Kerala, India</a>
                            <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>1</button>
                        </div>
                        <p>Posted on : 15.12.2022</p>
                    </div>


                    <div class="col-md-3">
                        <figure class="figure">
                            <a href="single.php"><img src="images/banner-image-1.jpg" class="figure-img img-fluid"
                                    alt="A generic square placeholder image with rounded corners in a figure."></a>
                            <figcaption class="figure-caption"> <img src="images/comment.png" alt=""><span>01</span>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-3">
                        <h4><a href="single.php">Super and up for the comming model in shoot at newyork USA
                                morning..</a></h4>
                        <div class="btn-group">
                            <a href="single.php" class="btn btn-danger">Kerala, India</a>
                            <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>1</button>
                        </div>
                        <p>Posted on : 15.12.2022</p>
                    </div>
                    <div class="col-md-3">
                        <figure class="figure">
                            <a href="single.php"><img src="images/banner-image-1.jpg" class="figure-img img-fluid"
                                    alt="A generic square placeholder image with rounded corners in a figure."></a>
                            <figcaption class="figure-caption"> <img src="images/comment.png" alt=""><span>01</span>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-3">
                        <h4><a href="single.php">Super and up for the comming model in shoot at newyork USA
                                morning..</a></h4>
                        <div class="btn-group">
                            <a href="single.php" class="btn btn-danger">Kerala, India</a>
                            <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>1</button>
                        </div>
                        <p>Posted on : 15.12.2022</p>
                    </div>

                    <div class="col-md-3">
                        <figure class="figure">
                            <a href="single.php"><img src="images/banner-image-1.jpg" class="figure-img img-fluid"
                                    alt="A generic square placeholder image with rounded corners in a figure."></a>
                            <figcaption class="figure-caption"> <img src="images/comment.png" alt=""><span>01</span>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-3">
                        <h4><a href="single.php">Super and up for the comming model in shoot at newyork
                                USA morning..</a></h4>
                        <div class="btn-group">
                            <a href="single.php" class="btn btn-danger">Kerala, India</a>
                            <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>1</button>
                        </div>
                        <p>Posted on : 15.12.2022</p>
                    </div>
                    <div class="col-md-3">
                        <figure class="figure">
                            <a href="single.php"><img src="images/banner-image-1.jpg" class="figure-img img-fluid"
                                    alt="A generic square placeholder image with rounded corners in a figure."></a>
                            <figcaption class="figure-caption"> <img src="images/comment.png" alt=""><span>01</span>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-3">
                        <h4><a href="single.php">Super and up for the comming model in shoot at newyork
                                USA morning..</a></h4>
                        <div class="btn-group">
                            <a href="single.php" class="btn btn-danger">Kerala, India</a>
                            <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>1</button>
                        </div>
                        <p>Posted on : 15.12.2022</p>
                    </div>
                </div> -->
                </div>

                <div class="row bt">
                    <?php

                    $query = "SELECT * FROM blog ORDER BY id DESC";
                    $insert_query = mysqli_query($con, $query);
                    if (mysqli_num_rows($insert_query) > 0) {
                        $total_rows = mysqli_num_rows($insert_query);

                        $total_pages = ceil($total_rows / $limit);
                        echo '<div class="col col-sm-12 offset-md-3">
                        <ul>';
                        if ($page > 1) {
                            echo '<li><a href ="blog.php?page=' . ($page - 1) . '">Prev</a></li>';
                        }
                        for ($i = 1; $i <= $total_pages; $i++) {

                            if ($i == $page) {
                                $active = 'active';
                            } else {
                                $active = "";
                            }

                            echo '<li ><a class="' . $active . '" href="blog.php?page=' . $i . '">' . $i . '</a></li>';

                        }
                        if ($total_pages > $page) {
                            echo '<li><a href ="blog.php?page=' . ($page + 1) . '">Next</a></li>';
                        }
                        echo '</ul>
                        </div>';
                    }

                    ?>
                    <!-- <div class="col col-sm-12 offset-md-3">
                        <ul> -->


                    <!-- <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li> -->
                    <!-- </ul>
                    </div> -->
                </div>




            </div>

</section>
<!-- Portfolio-Section -->
<!-- Footer -->
<footer>
    <?php include('includes/footer.php') ?>
</footer>
<!-- /.Footer -->
<!-- Return to Top -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<<?php include('includes/script.php') ?>
    </body>

    </html>