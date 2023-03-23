<?php

$title = "Contact-Kerala Moments";
include('includes/header.php')
    ?>
<!--Navbar -->
<?php
include('includes/navbar.php')
    ?>
<?php
include('admin/database/dbconfig.php');
$query = "SELECT * FROM contact_page ORDER BY id DESC LIMIT 1";
$insert_query = mysqli_query($con, $query);

$contact_header_html = '';
$contact_map_html = '';
if (mysqli_num_rows($insert_query) > 0) {

    while ($rows = mysqli_fetch_assoc($insert_query)) {


        // $image = "" . $rows['image'] . "";
        // slider image html
        $contact_header_html .= "<div class='col-sm-12'>
                                    <figure class='figure'>
            <img src='admin/upload/upload_contact/" . $rows['image'] . "' class='figure-img img-fluid'
                alt='A generic square placeholder image with rounded corners in a figure.'>
        </figure>
    </div>
    <div class='col-sm-12'>
        " . $rows['content'] . "
    </div>
                ";

        $contact_map_html .= "<div class='contact__map'>

        <iframe
            src='" . $rows['map'] . "'
            height='350' style='border:0;' allowfullscreen='' aria-hidden='false' tabindex='0'>
        </iframe>
    </div>
    <div class='contact__widget'>
        <ul>
            <li>
                <i class='fa fa-map-marker' style='font-size:25px;padding:10px 18px;'></i>
                <span>" . $rows['name'] . ", " . $rows['address'] . "</span>
            </li>
            <li>
                <i class='fa fa-mobile' style='font-size:25px;padding:10px 20px;'></i>
                <span>Phone: +91-" . $rows['mobile'] . "</span>
            </li>
            <li>
                <i class='fa fa-envelope-o'></i>
                <span>Email: " . $rows['email'] . "</span>
            </li>
        </ul>
    </div>";

    }

}



?>

<!--/.Navbar -->
<!-- Blog-Section -->
<div class="support">
    <div class="container">
        <h3>Contact Us</h3>
        <div class="row">
            <?php echo $contact_header_html; ?>
            <!-- <div class="col-sm-12">
                <figure class="figure">
                    <img src="images/kerala-contactPage.jpeg" class="figure-img img-fluid"
                        alt="A generic square placeholder image with rounded corners in a figure.">
                </figure>
            </div>
            <div class="col-sm-12">
                <p>Welcome to my <a href="#">personal travel</a> blog, i love to travel the globe, i have been to so
                    many beautiful places and met interesting people the world, this website is my mirror of life.
                    Welcome to my personal travel blog, i love to travel the globe, i have been to so many beautiful
                    Welcome to my personal travel blog, i love to travel the globe, i have been to so many beautiful
                    places and met interes Welcome to my personal travel blog, i love to travel the globe, i have been
                    to so many beautiful places and met interesting people around the world, this website is my mirror
                    of life. </p>
            </div> -->
        </div>

        <div class="container py-5 main">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-title">
                        <h2>Get In Touch</h2>
                    </div>
                    <form action="codecontact.php" method="post">
                        <div class="form-group row">

                            <div class="col-sm-6">

                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="email" name="email" class="form-control" placeholder="Your Email id"
                                    required>
                            </div>
                            <div class="col-sm-12">
                                <input type="number" name="phone" class="form-control" placeholder="Your Phone Number"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea type="text" name="message" class="form-control" placeholder="your Message"
                                    rows="8" required></textarea>
                            </div>
                        </div>
                        <button type="submit" name="submit_btn" class="btn btn-primary px-4">Submit it</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <?php echo $contact_map_html; ?>

                    <!-- <div class="contact__map">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d62519.10439815241!2d76.22200208171324!3d11.66291148119536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m5!1s0x3ba608bb285e4b7d%3A0xe29cb8dc789996ce!2sSulthan%20Bathery%2C%20Kerala!3m2!1d11.6629136!2d76.2570217!4m0!5e0!3m2!1sen!2sin!4v1671526929016!5m2!1sen!2sin"
                            height="350" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                        </iframe>
                    </div>
                    <div class="contact__widget">
                        <ul>
                            <li>
                                <i class="fa fa-map-marker" style="font-size:25px;padding:10px 18px;"></i>
                                <span>Lemo Leon, Sulthan Bathery, Wayanad,Kerala</span>
                            </li>
                            <li>
                                <i class="fa fa-mobile" style="font-size:25px;padding:10px 20px;"></i>
                                <span>Phone: +91-7012965500</span>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <span>Email: info@keralamoments.com</span>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

</div>
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


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
include('includes/script.php')
    ?>
</body>

</html>