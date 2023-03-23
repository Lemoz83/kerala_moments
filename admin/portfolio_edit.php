<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>




<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bolder; color: #4e73df;">
                Edit Portfolio Data</h5>

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


            if (isset($_POST['pf_edit_btn'])) {

                $id = $_POST['pf_edit_id'];
                $query = "SELECT * FROM portfolio WHERE id = $id";
                $insert_query = mysqli_query($con, $query);



                while ($row = mysqli_fetch_assoc($insert_query)) { //we can also use :- foreach( $insert_query as $row)
                    ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                            <label>Main Caption</label>
                            <input type="text" name="main_cap" value="<?php echo $row['main_cap'] ?>" class="form-control"
                                placeholder="Enter Main Heading">
                        </div>
                        <div class="form-group">
                            <label>Sub Caption</label>
                            <input type="text" name="sub_cap" value="<?php echo $row['sub_cap'] ?>" class="form-control"
                                placeholder="Enter Sub Heading">
                        </div>

                        <div class="form-group">
                            <label>Image</label><label>** For best result use 1024px X 463px image resolution</label>
                            <input type="file" name="image" value="<?php echo $row['image'] ?>" class="form-control"
                                id="pf_image" onchange="return fileValidation()"></input>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <a href="portfolio_home.php"><button type="button" name='close' class="btn btn-danger"
                                data-dismiss="modal">Cancel</button></a>
                        <button type="submit" name='pf_update_btn' class="btn btn-primary">Update</button>
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


    let crImage = document.getElementById("pf_image");


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