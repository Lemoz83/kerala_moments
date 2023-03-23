<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bolder; color: #4e73df;">
                Edit Carousel Data</h5>

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
        <form action="codehome.php" method="post" enctype="multipart/form-data">

            <?php


            if (isset($_POST['cr_edit_btn'])) {

                $id = $_POST['cr_edit_id'];
                $query = "SELECT * FROM carousel WHERE id = $id";
                $insert_query = mysqli_query($con, $query);



                while ($row = mysqli_fetch_assoc($insert_query)) { //we can also use :- foreach( $insert_query as $row)
                    ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

                            <label>CR Main Heading</label>
                            <input type="text" name="cr_main_edit" value="<?php echo $row['cr_main']; ?>" class="form-control"
                                placeholder="Enter Main Heading">
                        </div>
                        <div class="form-group">
                            <label>CR Sub Heading</label>
                            <input type="text" name="cr_sub_edit" value="<?php echo $row['cr_sub']; ?>" class="form-control"
                                placeholder="Enter Sub Heading">
                        </div>
                        <div class="form-group">
                            <label>Cr Indicator caption</label>
                            <input type="text" name="cr_cap_edit" value="<?php echo $row['cr_caption']; ?>" class="form-control"
                                placeholder="Enter Caption"></input>
                        </div>
                        <div class="form-group">
                            <label>CR Image</label><label>** For best result use 1024px X 463px image resolution</label>
                            <input type="file" name="cr_img_edit" value="<?php echo $row['cr_image']; ?>" class="form-control"
                                id="cr_image" onchange="return fileValidation()"></input>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <a href="carousel_home.php"><button type="button" name='close' class="btn btn-danger"
                                data-dismiss="modal">Cancel</button></a>
                        <button type="submit" name='cr_update_btn' class="btn btn-primary">Update</button>
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


    let crImage = document.getElementById("cr_image");


    const fileValidation = function () {
        var showImageFormat = /(\.jpg|\.jpeg|\.png)$/i;
        var filePath = crImage.value;

        if (!showImageFormat.exec(filePath)) {
            alert('Invalid file type only jpg/jpeg/png format allowed !!');
            crImage.value = '';
            return false;
        }
    }

</script>



<?php
include('includes/script.php');
?>