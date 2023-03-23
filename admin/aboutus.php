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
                <h5 class="modal-title" id="exampleModalLabel">Add About Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="codeabout.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title Caption</label>
                        <input type="text" name="titlecaption" class="form-control" placeholder="Title Caption">
                    </div>
                    <div class="form-group">
                        <label>Content Left</label>
                        <input type="text" name="contentleft" class="form-control" placeholder="Write Content">
                    </div>
                    <div class="form-group">
                        <label>Main Content Para 1</label>
                        <input type="text" name="maincontent1" class="form-control"
                            placeholder="Write Main Content1"></input>
                    </div>
                    <div class="form-group">
                        <label>Main Content Para 2</label>
                        <input type="text" name="maincontent2" class="form-control"
                            placeholder="Write Main Content2"></input>
                    </div>
                    <div class="form-group">

                        Image 1<input type="file" name="about_image1" class="form-control" id="cr_image1"
                            onchange="return fileValidationAboutUs1()">
                    </div>
                    <div class="form-group">

                        Image 2<input type="file" name="about_image2" class="form-control" id="cr_image2"
                            onchange="return fileValidationAboutUs1()">
                    </div>
                    <div class="form-group">

                        Image 3<input type="file" name="about_image3" class="form-control" id="cr_image3"
                            onchange="return fileValidationAboutUs1()">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" name='close' class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name='aboutadmin' class="btn btn-primary">Save</button>
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
                        About Us</h6>
                </li>
                <li>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Data
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

                $query = 'SELECT * FROM aboutus';
                $insert_query = mysqli_query($con, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title Caption</th>
                            <th>Content Left</th>
                            <th>Main Content Para 1</th>
                            <th>Main Content Para 2</th>
                            <th>Image 1</th>
                            <th>Image 2</th>
                            <th>Image 3</th>
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
                                        <?php echo $row['titlecaption']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['contentleft']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['maincontent1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['maincontent2']; ?>
                                    </td>
                                    <td>
                                        <?php echo '<img src="upload/' . $row['image1'] . '" alt="' . $row['image1'] . '" width="100px" height="100px">'; ?>
                                    </td>
                                    <td>
                                        <?php echo '<img src="upload/' . $row['image2'] . '" alt="' . $row['image2'] . '" width="100px" height="100px">'; ?>
                                    </td>
                                    <td>
                                        <?php echo '<img src="upload/' . $row['image3'] . '" alt="' . $row['image3'] . '" width="100px" height="100px">'; ?>
                                    </td>

                                    <td>
                                        <form action="about_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="about_edit_btn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="codeabout.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                            <input type="hidden" name="std_img1" value="<?php echo $row['image1'] ?>">
                                            <input type="hidden" name="std_img2" value="<?php echo $row['image2'] ?>">
                                            <input type="hidden" name="std_img3" value="<?php echo $row['image3'] ?>">

                                            <button type="submit" name="about_delete_btn" class="btn btn-danger">DELETE</button>
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



<!-- container-fluid -->
<?php
include('includes/script.php');
include('includes/footer.php');
?>