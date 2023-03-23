<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bolder; color: #4e73df;">
                Edit Blog Data</h5>

        </div>
        <?php

        // if (isset($_SESSION['success'])) {
        //     echo '<h4 style="color:#00ec97;"> ' . $_SESSION['success'] . ' </h4>';
        //     unset($_SESSION['success']);
        // }
        
        // if (isset($_SESSION['status'])) {
        //     echo '<h4 style="color:#e74a3b;"> ' . $_SESSION['status'] . ' </h4>';
        //     unset($_SESSION['status']);
        // }
        
        ?>
        <form action="codeblog.php" method="post" enctype="multipart/form-data">

            <?php


            if (isset($_POST['blog_edit_btn'])) {

                $id = $_POST['edit_id'];
                $query = "SELECT * FROM blog WHERE id = $id";
                $insert_query = mysqli_query($con, $query);



                while ($row = mysqli_fetch_assoc($insert_query)) { //we can also use :- foreach( $insert_query as $row)
                    ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

                            <label>Blog Title</label>
                            <input type="text" name="blog_title" value="<?php echo $row['blog_title']; ?>" class="form-control"
                                placeholder="Blog Title Here">
                        </div>
                        <div class="form-group">
                            <label>Blog Content</label><label>Content Limit only 3500 words.</lable>
                                <textarea name="blog_content" value="<?php echo $row['blog_content']; ?>" class="form-control"
                                    id="myTextarea"></textarea>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" value="<?php echo $row['state']; ?>" class="form-control"
                                placeholder="Enter State Name"></input>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" value="<?php echo $row['country']; ?>" class="form-control"
                                placeholder="Enter Country Name"></input>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" value="<?php echo $row['date']; ?>" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label>Image</label><br><label>** For best result use 1024px X 463px image resolution.</lable>
                                <input type="file" name="image" value="<?php echo $row['image']; ?>" class="form-control"
                                    id="blog_image" onchange="return fileValidation()"></input>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <a href="blogpage.php"><button type="button" name='close' class="btn btn-danger"
                                data-dismiss="modal">Cancel</button></a>
                        <button type="submit" name='blog_update_btn' class="btn btn-primary">Update</button>
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


    let crImage = document.getElementById("blog_image");


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