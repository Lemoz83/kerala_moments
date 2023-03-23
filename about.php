<?php

$title = "About-Kerala Moments";
include('includes/header.php')
    ?>


<!--Navbar -->
<?php
include('includes/navbar.php')
    ?>
<!--/.Navbar -->
<!-- Blog-Section -->
<?php
include('admin/database/dbconfig.php');
$query = "SELECT * FROM aboutus ORDER BY id DESC LIMIT 1";
$query_insert = mysqli_query($con, $query);

if (mysqli_num_rows($query_insert) > 0) {

    while ($rows = mysqli_fetch_assoc($query_insert)) {

        ?>

        <div class="about-page">
            <div class="container">
                <div class="row ">
                    <div class="col-sm-12">
                        <span class="about-header1">
                            <h4>about</h4>
                        </span>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <span class="about-header2">
                            <h2>
                                <?php echo $rows['titlecaption']; ?>
                            </h2>
                        </span>
                    </div>
                </div>
            </div>

            <section class="main">
                <div class="container-fluid ">
                    <div class="row ">
                        <div class=" col-sm-12 col-md-4">
                            <h5>
                                <?php echo $rows['contentleft']; ?>
                            </h5>
                        </div>
                        <div class=" col-sm-12 col-md-8">
                            <p>
                                <?php echo $rows['maincontent1']; ?><br><br>
                                <?php echo $rows['maincontent2']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-4">
                            <div class="image-wrapper">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <span class="image1"><img src="<?php echo "admin/upload/" . $rows['image1']; ?>"
                                                class="image-1"></span>
                                    </div>
                                    <div class=" col-sm-12 col-md-6">
                                        <span class="image2"><img src="<?php echo "admin/upload/" . $rows['image2']; ?>"
                                                class="image-2"></span>
                                        <span class="image3"><img src="<?php echo "admin/upload/" . $rows['image3']; ?>"
                                                class="image-3"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php
    }
} else {
    echo 'Record not found';
}

?>

    <section class="main-2">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-sm-12 col-md-4  main-2-box box-1">
                    <h2>Mission</h2>
                    <img src="images/blue-square.png" class="main-2-image" alt="">
                    <div class="main-2-para1">
                        <p>Travel mission point one here</p>
                    </div>
                    <div class="main-2-para2">
                        <p>Travel mission point two here</p>
                    </div>
                    <div class="main-2-para3">
                        <p>Travel mission point three here</p>
                    </div>
                </div>

                <div class=" col-sm-12 col-md-4  main-2-box box-2">
                    <h2>Vission</h2>
                    <img src="images/lightblue-square.png" class="main-2-image" alt="">
                    <div class="main-2-para1">
                        <p>Travel vission point one here</p>
                    </div>
                    <div class="main-2-para2">
                        <p>Travel vission point two here</p>
                    </div>
                    <div class="main-2-para3">
                        <p>Travel vission point three here</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
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