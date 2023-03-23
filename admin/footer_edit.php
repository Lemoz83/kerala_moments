<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bolder; color: #4e73df;">
                Edit Footer Data</h5>

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
        <form action="codefooter.php" method="post" enctype="multipart/form-data">

            <?php


            if (isset($_POST['footer_edit_btn'])) {

                $id = $_POST['footer_edit_id'];
                $query = "SELECT * FROM footer WHERE id = $id";
                $insert_query = mysqli_query($con, $query);



                while ($row = mysqli_fetch_assoc($insert_query)) { //we can also use :- foreach( $insert_query as $row)
                    ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                            <label>Contact</label>
                            <input type="text" name="edit_contact" value="<?php echo $row['contact']; ?>" class="form-control"
                                placeholder="Contact No.">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" value="<?php echo $row['email']; ?>" class="form-control"
                                placeholder="Email Id">
                        </div>
                        <div class="form-group">
                            <label>Broucher Link</label>
                            <input type="file" name="edit_br_link" value="<?php echo $row['br_link']; ?>" class="form-control"
                                placeholder="Add Link"></input>
                        </div>
                        <div class="form-group">
                            <label>Logo Image</label>
                            <input type="file" name="edit_br_logo" value="<?php echo $row['br_logo']; ?>" class="form-control"
                                id="cr_logo" onchange="return fileValidationAdmin1()"></input>
                        </div>

                        <div class="form-group">
                            <label>Broucher Image</label>
                            <input type="file" name="edit_br_image" value="<?php echo $row['br_image']; ?>" class="form-control"
                                id="cr_adminimage" onchange="return fileValidationAdmin()"></input>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <a href="customfooter.php"><button type="button" name='close' class="btn btn-danger"
                                data-dismiss="modal">Cancel</button></a>
                        <button type="submit" name='footer_update_btn' class="btn btn-primary">Update</button>
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


    let crImage = document.getElementById("cr_adminimage");
    let crLogo = document.getElementById("cr_logo");
    // const passMsg = document.getElementById("message");


    const fileValidationAdmin = function () {
        var showImageFormat = /(\.jpg|\.jpeg|\.png)$/i;
        var filePath = crImage.value;

        if (!showImageFormat.exec(filePath)) {
            alert('Invalid file type only jpg/jpeg/png format allowed !!');
            crImage.value = '';
            return false;
        }
    }

    const fileValidationAdmin1 = function () {
        var showImageFormat = /(\.png)$/i;
        var filePath1 = crLogo.value;

        if (!showImageFormat.exec(filePath1)) {
            alert('Invalid file type only ".png" format allowed !!');
            crLogo.value = '';
            return false;
        }
    }
</script>



<?php
include('includes/script.php');
include('includes/footer.php');
?>