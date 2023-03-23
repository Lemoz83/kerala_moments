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
                <h5 class="modal-title" id="exampleModalLabel">Add Contact Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="codecontact.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control" placeholder="Contact Content Here"
                            id="myTextarea"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Map Link</label>
                        <input type="text" name="map" class="form-control" placeholder="State Name">
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile No.">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Id.">
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" id="contact_image"
                            onchange="return fileValidation()">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" name='close' class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name='contact_admin' class="btn btn-primary">Save</button>
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
                        Contact Page</h6>
                </li>
                <li>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Contact Details
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

                $query = 'SELECT * FROM contact_page';
                $insert_query = mysqli_query($con, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Content</th>
                            <th>Map Link</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Email</th>
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
                                        <?php echo $row['content']; ?>
                                    </td>
                                    <td>
                                        <!-- <?php echo $row['map']; ?> -->
                                    </td>
                                    <td>
                                        <?php echo $row['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['address']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['mobile']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo '<img src="upload/upload_contact/' . $row['image'] . '" alt="' . $row['image'] . '" width="100px" height="100px">'; ?>
                                    </td>


                                    <td>
                                        <form action="contact_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="contact_edit_btn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="codecontact.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="std_img" value="<?php echo $row['image']; ?>">
                                            <button type="submit" name="contact_delete_btn"
                                                class="btn btn-danger">DELETE</button>
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


    let crImage = document.getElementById("contact_image");

    const fileValidation = function () {
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