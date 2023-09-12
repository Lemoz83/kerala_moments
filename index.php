<?php

$title = "Kerala Moments";
include('includes/header.php')
  ?>

<!--Navbar -->
<?php
include('includes/navbar.php');
?>
<?php
include('admin/database/dbconfig.php');
$query = "SELECT * FROM carousel LIMIT 5";
$insert_query = mysqli_query($con, $query);
$image_count = -1;
$indicator_html = '';
$slider_html = '';
if (mysqli_num_rows($insert_query) > 0) {

  while ($rows = mysqli_fetch_assoc($insert_query)) {
    $active_class = "";
    if (!$image_count) {
      $active_class = 'active';
      $image_count = 0;

    }
    $image_count++;
    $thumb_image = "" . $rows['cr_image'] . "";
    // slider image html
    $slider_html .= "<div class='carousel-item " . $active_class . "'>";
    $slider_html .= "<img class='d-block w-100' src='admin/upload/upload_cr/" . $rows['cr_image'] . "' alt='$thumb_image'/>";
    $slider_html .= "
    <div class='carousel-caption'>
      <h1>" . $rows['cr_main'] . "</h1>
      <p class='lead'>" . $rows['cr_sub'] . "</p>
      <a class='btn btn-primary' href='about.php'><span>Learn more</span></a>
    </div></div>";
    // Thumbnail html
    // $thumb_html .= "<li><img src='images/" . $thumb_image . "' alt='$thumb_image'></li>";
    // Button html
    $indicator_html .= "<li data-target='#carousel-thumb' data-slide-to='" . $image_count . "' >
    <img class='d-block w-100' src=' admin/upload/upload_cr/" . $rows['cr_image'] . "' class='img-fluid' />
    <span>" . $rows['cr_caption'] . "</span>
  </li>";
  }

}



?>
<!--/.Navbar -->
<!--Carousel Wrapper-->
<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
  <!--Slides-->
  <?php echo $slider_html; ?>
  <!-- <div class="carousel-item">
      <img class="d-block w-100" src="images\home-img\calicut-biryani.jpg" alt="Second slide" />
      <div class="gradient"></div>
      <div class="carousel-caption">
        <h1>Taste of Malabar | Exploring the gastronomy map of Thalassery and Kozhikode</h1>
        <p class="lead">walking through the streets of Thalassery and Kozhikode and savour the ocean of flavours...</p>
        <a class="btn btn-primary" href="about.php"><span>Learn more</span></a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images\home-img\thrissur-puram.jpg" alt="Third slide" />
      <div class="gradient"></div>
      <div class="carousel-caption">
        <h1>Visit the cultural capital of Kerala and the land of Poorams-Thrissur</h1>
        <p class="lead">known for its ancient temples, churches, and mosques...</p>
        <a class="btn btn-primary" href="about.php"><span>Learn more</span></a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/home-img/allepy-boats.jpg" alt="Third slide" />
      <div class="gradient"></div>
      <div class="carousel-caption">
        <h1>the ‘Venice of the East’-Alappuzha</h1>
        <p class="lead">You glide through the serene backwaters of Alappuzha in a beautiful ‘’Kettuvallam’’ (houseboat)
          and enjoy the picture perfect landscape...</p>
        <a class="btn btn-primary" href="about.php"><span>Learn more</span></a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/home-img/munnar-kerala.jpg" alt="Forth slide" />
      <div class="gradient"></div>
      <div class="carousel-caption">
        <h1>Fall in love with astounding Deep Forests of Munnar</h1>
        <p class="lead">Trekking in the Munnar Deep forest is a thrilling experience that ups your thrillometer...</p>
        <a class="btn btn-primary" href="about.php"><span>Learn more</span></a>
      </div>
    </div>
  </div> -->
  <!--/.Slides-->
  <!--/.Controls-->
  <ol class="carousel-indicators">
    <?php echo $indicator_html; ?>
    <!-- <li data-target="#carousel-thumb" data-slide-to="1">
      <img class="d-block w-100" src="images\home-img\calicut-biryani.jpg" class="img-fluid" />
      <span>Taste of Malabar Cuisine</span>
    </li>
    <li data-target="#carousel-thumb" data-slide-to="2">
      <img class="d-block w-100" src="images\home-img\thrissur-puram.jpg" class="img-fluid" />
      <span>The Thrissur Poorams</span>
    </li>
    <li data-target="#carousel-thumb" data-slide-to="3">
      <img class="d-block w-100" src="images/home-img/allepy-boats.jpg" class="img-fluid" />
      <span>Alappuzha Backwaters</span>
    </li>
    <li data-target="#carousel-thumb" data-slide-to="4">
      <img class="d-block w-100" src="images/home-img/munnar-kerala.jpg" class="img-fluid" />
      <span> Munnar Deep Forest.</span>
    </li> -->
  </ol>
</div>
<!--/.Carousel Wrapper-->

<!-- Page Content -->







<section id="portfolio">

  <div class="container">
    <h2>Recently Added Photographs</h2>
    <div class="row justify-content-center">
      <div class="col-md-12 col-12">
        <?php
        $query = "SELECT * FROM portfolio WHERE id = 1 ";
        $insert_query = mysqli_query($con, $query);
        ?>
        <?php
        while ($rows = mysqli_fetch_assoc($insert_query)) {
          ?>

          <div class="row">
            <a href="<?php echo "admin/upload/upload_portfolio/" . $rows['image']; ?>" data-toggle="lightbox"
              data-gallery="example-gallery" class="col-xl-6 col-md-4 box-1 portfolio">
              <img src="<?php echo "admin/upload/upload_portfolio/" . $rows['image']; ?>" class="img-fluid" />

              <div class="overlay">
                <img src="images/comment.png" alt="plus-icon" title="Total Comments" />
                <div class="text">
                  <?php echo $rows['main_cap']; ?>
                  <span>
                    <?php echo $rows['sub_cap']; ?>
                  </span>
                </div>
                <div class="count">1</div>
              </div>
            </a>
            <?php
        }
        ;
        ?>

          <?php
          $query = "SELECT * FROM portfolio WHERE id = 2 ";
          $insert_query = mysqli_query($con, $query);
          ?>
          <?php
          while ($rows = mysqli_fetch_assoc($insert_query)) {
            ?>
            <a href="<?php echo "admin/upload/upload_portfolio/" . $rows['image']; ?>" data-toggle="lightbox"
              data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2 portfolio">
              <img src="<?php echo "admin/upload/upload_portfolio/" . $rows['image']; ?>" class="img-fluid" />
              <div class="overlay">
                <img src="images/comment.png" alt="plus-icon" title="Total Comments" />
                <div class="text">
                  <?php echo $rows['main_cap']; ?>
                  <span>
                    <?php echo $rows['sub_cap']; ?>
                  </span>
                </div>
                <div class="count">01</div>
              </div>
            </a>
            <?php
          }
          ?>

          <?php
          $query = "SELECT * FROM portfolio WHERE id = 3 ";
          $insert_query = mysqli_query($con, $query);
          ?>
          <?php
          while ($rows = mysqli_fetch_assoc($insert_query)) {
            ?>
            <a href="<?php echo "admin/upload/upload_portfolio/" . $rows['image']; ?>" data-toggle="lightbox"
              data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2 portfolio">
              <img src="<?php echo "admin/upload/upload_portfolio/" . $rows['image']; ?>" class="img-fluid" />
              <div class="overlay">
                <img src="images/comment.png" alt="plus-icon" title="Total Comments" />
                <div class="text">
                  <?php echo $rows['main_cap']; ?>
                  <span>
                    <?php echo $rows['sub_cap']; ?>
                  </span>
                </div>
                <div class="count">01</div>
              </div>
            </a>
            <?php
          }
          ?>

        </div>
        <div class="row">
          <a href="images/home-img/recent-photo/kochi-wala-big.jpg" data-toggle="lightbox"
            data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2 portfolio">
            <img src="images/home-img/recent-photo/kochi-wala-small.jpg" class="img-fluid" />
            <div class="overlay">
              <img src="images/comment.png" alt="plus-icon" title="Total Comments" />
              <div class="text">
                Man standing on the middle of the road in the morning
                <span>Landscapes</span>
              </div>
              <div class="count">01</div>
            </div>
          </a>
          <a href="images/home-img/recent-photo/kerala-fish-big.jpg" data-toggle="lightbox"
            data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2 portfolio">
            <img src="images/home-img/recent-photo/kerala-fish-small.jpg" class="img-fluid" />
            <div class="overlay">
              <img src="images/comment.png" alt="plus-icon" title="Total Comments" />
              <div class="text">
                Man standing on the middle of the road in the morning
                <span>Landscapes</span>
              </div>
              <div class="count">01</div>
            </div>
          </a>
          <a href="images/home-img/recent-photo/kerala-random-image1.jpg" data-toggle="lightbox"
            data-gallery="example-gallery" class="col-xl-6 col-md-4 box-1 portfolio">
            <img src="images/home-img/recent-photo/kerala-random-image1.jpg" class="img-fluid" />
            <div class="overlay">
              <img src="images/comment.png" alt="plus-icon" title="Total Comments" id="" />
              <div class="text">
                Man standing on the middle of the road in the morning
                <span>Landscapes</span>
              </div>
              <div class="count">01</div>
            </div>
          </a>
        </div>
        <div class="row">
          <a href="images/home-img/recent-photo/kerala-random-image2.jpg" data-toggle="lightbox"
            data-gallery="example-gallery" class="col-xl-6 col-md-4 box-1 portfolio">
            <img src="images/home-img/recent-photo/kerala-random-image2.jpg" class="img-fluid" />
            <div class="overlay">
              <img src="images/comment.png" alt="plus-icon" title="Total Comments" />
              <div class="text">
                Man standing on the middle of the road in the morning
                <span>Landscapes</span>
              </div>
              <div class="count">01</div>
            </div>
          </a>
          <a href="images/home-img/recent-photo/kerala-random-image3.jpg" data-toggle="lightbox"
            data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2 portfolio">
            <img src="images/home-img/recent-photo/kerala-random-image3.jpg" class="img-fluid" />
            <div class="overlay">
              <img src="images/comment.png" alt="plus-icon" title="Total Comments" />
              <div class="text">
                Man standing on the middle of the road in the morning
                <span>Landscapes</span>
              </div>
              <div class="count">01</div>
            </div>
          </a>
          <a href="images/home-img/recent-photo/kerala-random-image4.jpg" data-toggle="lightbox"
            data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2 portfolio">
            <img src="images/home-img/recent-photo/kerala-random-image4.jpg" class="img-fluid" />
            <div class="overlay">
              <img src="images/comment.png" alt="plus-icon" title="Total Comments" />
              <div class="text">
                Man standing on the middle of the road in the morning
                <span>Landscapes</span>
              </div>
              <div class="count">01</div>
            </div>

          </a>

        </div>

      </div>
    </div>

  </div>
</section>


<!-- Blog section--------------- -->

<section class="blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 left-side">
        <?php
        include('admin/database/dbconfig.php');
        $query = "SELECT * FROM blog ORDER BY id DESC LIMIT 4";
        $insert_query = mysqli_query($con, $query);

        $indicator_html = '';
        $slider_html = '';
        if (mysqli_num_rows($insert_query) > 0) {

          while ($rows = mysqli_fetch_assoc($insert_query)) {
            $olddate = $rows['date'];
            $newdate = date("d-m-Y", strtotime($olddate));


            // $image = "" . $rows['image'] . "";
            // slider image html
            $slider_html .= "<div class='row'>
                    <div class='col-md-6'>
                      <figure class='figure'>
                        <a href='single.php'><img src='admin/upload/upload_blog/" . $rows['image'] . "'
                            class='figure-img img-fluid'
                            alt='A generic square placeholder image with rounded corners in a figure.' /></a>
                        <figcaption class='figure-caption'>
                          <img src='images/comment.png' alt='' title='Total Comments' /><span>01</span>
                        </figcaption>
                      </figure>
                    </div>
                    <div class='col-md-6'>
                      <h4>
                        <a href='single.php'>" . $rows['blog_title'] . "</a>
                      </h4>
                      <div class='btn-group'>
                        <a href='single.php' class='btn btn-danger'>" . $rows['state'] . ", " . $rows['country'] . "</a>
                        <button class='btn btn-primary' title='Total Views'>
                          <i class='fa fa-eye' aria-hidden='true'></i> 1
                        </button>
                      </div>
                      <p>Posted on : " . $newdate . "</p>
                    </div>
                  </div>
                ";
          }
        }
        ?>
        <h2>My Recent Blog Posts</h2>
        <?php echo $slider_html; ?>
        <!-- <div class="row">
          <div class="col-md-6">
            <figure class="figure">
              <a href="single.php"><img src="images/home-img/recent-photo/kerala-random-image6.jpg"
                  class="figure-img img-fluid"
                  alt="A generic square placeholder image with rounded corners in a figure." /></a>
              <figcaption class="figure-caption">
                <img src="images/comment.png" alt="" title="Total Comments" /><span>01</span>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-6">
            <h4>
              <a href="single.php">Super and up for the comming model in shoot at newyork USA
                morning..</a>
            </h4>
            <div class="btn-group">
              <a href="single.php" class="btn btn-danger">Kerala, India</a>
              <button class="btn btn-primary" title="Total Views">
                <i class="fa fa-eye" aria-hidden="true"></i> 1
              </button>
            </div>
            <p>Posted on : 15.12.2022</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <figure class="figure">
              <a href="single.php"><img src="images/home-img/recent-photo/kerala-random-image10.jpg"
                  class="figure-img img-fluid"
                  alt="A generic square placeholder image with rounded corners in a figure." /></a>
              <figcaption class="figure-caption">
                <img src="images/comment.png" alt="" title="Total Comments" /><span>01</span>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-6">
            <h4>
              <a href="single.php">Super and up for the comming model in shoot at newyork USA
                morning..</a>
            </h4>
            <div class="btn-group">
              <a href="single.php" class="btn btn-danger">Kerala, India</a>
              <button class="btn btn-primary" title="Total Views">
                <i class="fa fa-eye" aria-hidden="true"></i> 1
              </button>
            </div>
            <p>Posted on : 15.12.2022</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <figure class="figure">
              <a href="single.php"><img src="images/home-img/recent-photo/kerala-random-image8.jpg"
                  class="figure-img img-fluid"
                  alt="A generic square placeholder image with rounded corners in a figure." /></a>
              <figcaption class="figure-caption">
                <img src="images/comment.png" alt="" title="Total Comments" /><span>01</span>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-6">
            <h4>
              <a href="single.php">Super and up for the comming model in shoot at newyork USA
                morning..</a>
            </h4>
            <div class="btn-group">
              <a href="single.php" class="btn btn-danger">Kerala, India</a>
              <button class="btn btn-primary" title="Total Views">
                <i class="fa fa-eye" aria-hidden="true"></i> 1
              </button>
            </div>
            <p>Posted on : 15.12.2022</p>
          </div>
        </div> -->
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="row">
          <div class="col-md-12">
            <div class="right-side">
              <h3>Whos Me ?</h3>
              <figure>
                <img src="images/home-img/recent-photo/Alleppey-small.jpg" alt="" />
              </figure>
              <h5>
                Welcome to my personal travel blog, i love to travel the
                globe, i have been to so many beautiful places and met
                interesting people around the world, this website is my
                mirror of life...
              </h5>

              <a class="btn btn-danger btn-danger_right" href="about.php"><span>Read more</span></a>

              <div class="fa-main">
                <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              </div>

              <address>
                <span>Phone: +91 7012965500</span>
                <span>Email : info@keralamoments.com</span>
              </address>
              <h2>Quick Contact</h2>
              <form id="contact" method="post" class="form" role="form">
                <div class="row">
                  <div class="col-xs-6 col-md-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required />
                  </div>
                  <div class="col-xs-6 col-md-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required />
                  </div>
                </div>
                <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>
                <br />
                <div class="row">
                  <div class=" col-sm-12 offset-sm-3 form-group">
                    <button class="btn btn-primary" type="submit">
                      Submit
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>

  <?php
  include('includes/footer.php');
  ?>

</footer>


<?php
include('includes/script.php');
?>
</body>

</html>