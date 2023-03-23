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
                <h5 class="modal-title" id="exampleModalLabel">Add Footer Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="codefooter.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Contact No.</label>
                        <input type="text" name="contact" class="form-control" placeholder="Enter Contact No.">
                    </div>
                    <div class="form-group">
                        <label>Email Id</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email Id">
                    </div>
                    <div class="form-group">
                        <label>Broucher link</label>
                        <input type="file" name="br_link" class="form-control" placeholder="Add link">
                    </div>
                    <div class="form-group">
                        <label>Logo Image</label>
                        <input type="file" name="br_logo" class="form-control" id="cr_logo"
                            onchange="return fileValidationAdmin1()">
                    </div>
                    <div class="form-group">
                        <label>Broucher Image</label>
                        <input type="file" name="br_image" class="form-control" id="cr_adminimage"
                            onchange="return fileValidationAdmin()">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" name='close' class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name='footer_btn' class="btn btn-primary">Save</button>
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
                        Admin
                        Profile</h6>
                </li>
                <li>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Footer Data
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
                include('database/dbconfig.php');
                $query = 'SELECT * FROM footer';
                $insert_query = mysqli_query($con, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Contact No.</th>
                            <th>Email Id</th>
                            <th>Broucher link</th>
                            <th>Logo Image</th>
                            <th>Broucher Image</th>
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
                                        <?php echo $row['id'] ?>
                                    </td>

                                    <td>
                                        <?php echo $row['contact'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email'] ?>

                                    </td>

                                    <td>
                                        <?php echo "upload/" . $row['br_link']; ?>
                                    </td>

                                    <td>
                                        <?php echo '<img src="upload/' . $row['br_logo'] . '" alt="' . $row['br_logo'] . '" width="100px" height="100px">'; ?>
                                    </td>
                                    <td>
                                        <?php echo '<img src="upload/' . $row['br_image'] . '" alt="' . $row['br_image'] . '" width="100px" height="100px">'; ?>
                                    </td>

                                    <td>
                                        <form action="footer_edit.php" method="post">
                                            <input type="hidden" name="footer_edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="footer_edit_btn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="codefooter.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="file_id" value="<?php echo $row['br_link']; ?>">
                                            <input type="hidden" name="logo_image_id" value="<?php echo $row['br_logo']; ?>">
                                            <input type="hidden" name="image_id" value="<?php echo $row['br_image']; ?>">
                                            <button type="submit" name="footer_delete_btn"
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



<!-- container-fluid -->


<?php
include('includes/script.php');
include('includes/footer.php');
?>