<section class="footer-top">
  <!--Container-->


  <?php
  include('admin/database/dbconfig.php');
  $query = "SELECT * FROM footer ORDER BY id DESC LIMIT 1";
  $insert_query = mysqli_query($con, $query);

  if (mysqli_num_rows($insert_query) > 0) {
    while ($rows = mysqli_fetch_assoc($insert_query)) {

      ?>
      <!-- //modal----------------------------------------------  -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Kerala Moments Broucher</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Do you wish to download the broucher ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
              <a id="download-file" href="<?php echo "admin/upload/" . $rows['br_link']; ?>"
                download="keralamoments.pdf"><button type="button" class="btn btn-primary"
                  onclick="newDoc()">yes</button></a>
            </div>
          </div>
        </div>
      </div>


      <div class="container">
        <!-- echo $rows['br_link']; -->



        <div class="row ">
          <div class="col-sm-12 col-md-6 logo">
            <span class="logo-image"><img src="<?php echo "admin/upload/" . $rows['br_logo']; ?>"></span>
            <div class="fa-main">
              <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <address>
              <span>Phone: +91
                <?php echo $rows['contact']; ?>
              </span>
              <span>Email :
                <?php echo $rows['email']; ?>
              </span>
            </address>
          </div>

          <div class="col-sm-12 col-md-6">
            <div class="row">
              <div class="col-md-6">
                <span class="broucher-image"><img src="<?php echo "admin/upload/" . $rows['br_image']; ?>" alt=""></span>
              </div>
              <div class="col-md-6">
                <span class="broucher-text">
                  <h5>Download Broucher</h5>
                  <p>Explore the tourist destinations and things to do in Kerala. Check out our latest
                    e-brochure and start planning your next trip to Kerala.</p>
                </span>
                <div class="button-footer-group">
                  <button type="button" class="btn btn-primary button-primary_download " id="download" data-toggle="modal"
                    data-target="#exampleModal">Download</button>
                  <a href="https://online.fliphtml5.com/xillt/icza/" target="_blank"><button type="button"
                      class="btn btn-danger button-danger_view">view</button></a>
                </div>
              </div>
            </div>

          </div>



          <?php
    }
  } else {
    echo 'Record not found';
  }
  ?>






    </div>
  </div>
  <!-- /.container -->
</section>





<section class="footer-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li class="hidden">/</li>
          <li><a href="about.html">About-us</a></li>
          <li class="hidden">/</li>
          <li><a href="blog.php">Read My Blog</a></li>
          <li class="hidden">/</li>
          <!-- <li><a href="destinations.html">Destinations</a></li>
                <li class="hidden">/</li> -->
          <li><a href="gallery.html">Gallery</a></li>
          <li class="hidden">/</li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-12">
        <p>
          (C) All Rights Reserved
          <a href="https://www.template.net/editable/websites/html5" target="_blank">Kerala Moments</a>
          <span>/</span> Designed and Developed by
          <a href="#" target="_blank">Lemo Leon</a>
        </p>
      </div>
    </div>
  </div>
  <!-- /.container -->

</section>