<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Blog Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="codeblog.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Blog Title</label>
                        <input type="text" name="blog_title" class="form-control" placeholder="Blog Title Here">
                    </div>
                    <div class="form-group">
                        <label>Blog Content</label><label>Content Limit only 3500 words.</lable>
                            <textarea name="blog_content" class="form-control" placeholder="Blog Content Here"
                                id="myTextarea"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="state" class="form-control" placeholder="State Name">
                        <input type="text" name="country" class="form-control" placeholder="Country Name">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="blog_date" class="form-control"></input>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="blog_image" class="form-control" id="blog_image"
                            onchange="return fileValidationAboutUs()">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" name='close' class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name='blog_admin' class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <ul style=" list-style: none;">
                <li>
                    <h6 class="m-0 font-wieght-bold text-primary"
                        style="text-align: center; font-size: 20px; text-decoration: underline; font-weight: bolder;">
                        Blog Page</h6>
                </li>
                <li>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Blog Details
                    </button>
                </li>
            </ul>
        </div>

        <div class="card-body">
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
            <div class="table-responsive">

                <?php

                $query = 'SELECT * FROM blog';
                $insert_query = mysqli_query($con, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Blog Title</th>
                            <th>Blog Content</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Date of Posting</th>
                            <th>Image</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (mysqli_num_rows($insert_query) > 0) {
                            while ($row = mysqli_fetch_assoc($insert_query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['blog_title']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['blog_content']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['state']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['country']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['date']; ?>
                                    </td>
                                    <td>
                                        <?php echo '<img src="upload/upload_blog/' . $row['image'] . '" alt="' . $row['image'] . '" width="100px" height="100px">'; ?>
                                    </td>


                                    <td>
                                        <form action="blog_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="blog_edit_btn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="codeblog.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="std_img" value="<?php echo $row['image']; ?>">
                                            <button type="submit" name="blog_delete_btn" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "Record not found";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="ckeditor/ckeditor.js"></script>

<script type="text/javascript">


    let crImage = document.getElementById("blog_image");

    const fileValidationAboutUs = function () {
        var showImageFormat = /(\.jpg|\.jpeg|\.png)$/i;
        var filePath = crImage.value;

        if (!showImageFormat.exec(filePath)) {
            alert('Invalid file type only jpg/jpeg/png format allowed !!');
            crImage.value = '';

            return false;

        }
    };


    CKEDITOR.replace('myTextarea');


</script>



<!-- container-fluid -->
<?php
include('includes/script.php');
include('includes/footer.php');
?>