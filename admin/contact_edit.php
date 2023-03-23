<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bolder; color: #4e73df;">
                Edit Contact Data</h5>

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
        <form action="codecontact.php" method="post" enctype="multipart/form-data">

            <?php


            if (isset($_POST['contact_edit_btn'])) {

                $id = $_POST['edit_id'];
                $query = "SELECT * FROM contact_page WHERE id = $id";
                $insert_query = mysqli_query($con, $query);


                while ($row = mysqli_fetch_assoc($insert_query)) { //we can also use :- foreach( $insert_query as $row)
            
                    ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                            <label>Content</label><label>Content Limit only 1000 words.</lable>
                                <textarea name="content" value="<?php echo $row['content']; ?>" class="form-control"
                                    id="myTextarea"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Map Link</label>
                            <input type="text" name="map" value="<?php echo $row['map']; ?>" class="form-control"
                                placeholder="Map Link Here">
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control"
                                placeholder="Enter Full Name"></input>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control"
                                placeholder="Enter Address"></input>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" class="form-control"
                                placeholder="Mobile No."></input>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"
                                placeholder="Email Id"></input>
                        </div>
                        <div class="form-group">
                            <label>Image</label><br><label>** For best result use 1024px X 463px image resolution.</lable>
                                <input type="file" name="image" value="<?php echo $row['image']; ?>" class="form-control"
                                    id="contact_image" onchange="return fileValidation()"></input>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <a href="contactpage.php"><button type="button" name='close' class="btn btn-danger"
                                data-dismiss="modal">Cancel</button></a>
                        <button type="submit" name='contact_update_btn' class="btn btn-primary">Update</button>
                    </div>

                    <?php

                }
            }


            ?>


        </form>

    </div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="ckeditor/ckeditor.js"></script>


<script>


    let crImage = document.getElementById("contact_image");


    const fileValidation = function () {
        var showImageFormat = /(\.jpg|\.jpeg|\.png)$/i;
        var filePath = crImage.value;

        if (!showImageFormat.exec(filePath)) {
            alert('Invalid file type only jpg/jpeg/png format allowed !!');
            crImage.value = '';
            return false;
        }
    }


    CKEDITOR.replace('myTextarea');
</script>



<?php
include('includes/script.php');
?>