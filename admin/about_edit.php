<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bolder; color: #4e73df;">
                Edit About Data</h5>

        </div>
        <?php

        if (isset($_SESSION['success'])) {
            echo '<h4 style="color:#00ec97;"> ' . $_SESSION['success'] . ' </h4>';
            unset($_SESSION['success']);
        }

        if (isset($_SESSION['status'])) {
            echo '<h4 style="color:#e74a3b;"> ' . $_SESSION['status'] . ' </h4>';
            unset($_SESSION['status']);
        }

        ?>
        <form action="codeabout.php" method="post" enctype="multipart/form-data">

            <?php


            if (isset($_POST['about_edit_btn'])) {

                $id = $_POST['edit_id'];
                $query = "SELECT * FROM aboutus WHERE id = $id";
                $insert_query = mysqli_query($con, $query);



                while ($row = mysqli_fetch_assoc($insert_query)) { //we can also use :- foreach( $insert_query as $row)
                    ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                            <label>Title Caption</label>
                            <input type="text" name="edit_titlecaption" value="<?php echo $row['titlecaption']; ?>"
                                class="form-control" placeholder="Title Caption">
                        </div>
                        <div class="form-group">
                            <label>Content Left</label>
                            <input type="text" name="edit_contentleft" value="<?php echo $row['contentleft']; ?>"
                                class="form-control" placeholder="Write Content">
                        </div>
                        <div class="form-group">
                            <label>Main Content Para 1</label>
                            <input type="text" name="edit_maincontent1" value="<?php echo $row['maincontent1']; ?>"
                                class="form-control" placeholder="Write Main Content"></input>
                        </div>
                        <div class="form-group">
                            <label>Main Content Para 2</label>
                            <input type="text" name="edit_maincontent2" value="<?php echo $row['maincontent2']; ?>"
                                class="form-control" placeholder="Write Main Content"></input>
                        </div>
                        <div class="form-group">

                            Image1:<input type="file" name="about_image1" value="<?php echo $row['image1']; ?>"
                                class="form-control" id="cr_image1" onchange="return fileValidationAboutUs1()"></input>
                            Image2:<input type="file" name="about_image2" value="<?php echo $row['image2']; ?>"
                                class="form-control" id="cr_image2" onchange="return fileValidationAboutUs1()"></input>
                            Image3:<input type="file" name="about_image3" value="<?php echo $row['image3']; ?>"
                                class="form-control" id="cr_image3" onchange="return fileValidationAboutUs1()"></input>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <a href="aboutus.php"><button type="button" name='close' class="btn btn-danger"
                                data-dismiss="modal">Cancel</button></a>
                        <button type="submit" name='about_update_btn' class="btn btn-primary">Update</button>
                    </div>
                    <?php

                }
            }


            ?>


        </form>

    </div>
</div>
</div>


<script>


    let crImage1 = document.getElementById("cr_image1");
    let crImage2 = document.getElementById("cr_image2");
    let crImage3 = document.getElementById("cr_image3");


    const fileValidationAboutUs1 = function () {
        var showImageFormat = /(\.jpg|\.jpeg|\.png)$/i;
        var filePath1 = crImage1.value;
        var filePath2 = crImage2.value;
        var filePath3 = crImage3.value;

        if (!showImageFormat.exec(filePath1)) {
            alert('Invalid file type only jpg/jpeg/png format allowed !!');
            crImage1.value = '';

            return false;

        } else if (!showImageFormat.exec(filePath2)) {
            alert('Invalid file type only jpg/jpeg/png format allowed !!');
            crImage2.value = '';

            return false;

        } else if (!showImageFormat.exec(filePath3)) {

            alert('Invalid file type only jpg/jpeg/png format allowed !!');
            crImage3.value = '';

            return false;
        }
    };





</script>



<?php
include('includes/script.php');
include('includes/footer.php');
?>