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
                <h5 class="modal-title" id="exampleModalLabel">Add Portfolio Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="codehome.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Main Caption</label>
                        <input type="text" name="main_cap" class="form-control" placeholder="Enter Main Caption">
                    </div>
                    <div class="form-group">
                        <label>Sub Caption</label>
                        <input type="text" name="sub_cap" class="form-control" placeholder="Enter Sub Caption">
                    </div>
                    <div class="form-group">
                        <label>Image</label><label>** For best result use 1024px X 463px image resolution</label>
                        <input type="file" name="pf_image" class="form-control" id="pf_adminimage"
                            onchange="return fileValidationAdmin()">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" name='close' class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name='home_pf_btn' class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="card-header py-3">
    <ul style=" list-style: none; margin: 30px;">
        <li>
            <h6 class="m-0 font-wieght-bold text-primary"
                style="text-align: center; font-size: 20px; text-decoration: underline; font-weight: bolder;">
                Admin Home
                Portfolio</h6>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"
                style=" font-size: 20px; text-decoration: underline; font-weight: bolder;" href="#"
                id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Home Page sections
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"
                style=" font-size: 15px; font-weight: bolder;">
                <a class="dropdown-item" href="carousel_home.php">Carousel</a>

            </div>
        </li>
        <li style="text-align:right;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                style=" margin-top:30px;">
                Add & Manage Portfolio Data
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
        $query = 'SELECT * FROM portfolio';
        $insert_query = mysqli_query($con, $query);
        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Main Caption</th>
                    <th>Sub Caption</th>
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
                                <?php echo $row['main_cap']; ?>
                            </td>

                            <td>
                                <?php echo $row['sub_cap']; ?>
                            </td>

                            <td>
                                <?php echo ' <img src="upload/upload_portfolio/' . $row['image'] . '" alt="' . $row['image'] . '" width = 100px  height=100px>' ?>
                            </td>
                            <td>
                                <form action="portfolio_edit.php" method="post">
                                    <input type="hidden" name="pf_edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="pf_edit_btn" class="btn btn-success">EDIT</button>
                                </form>

                            </td>
                            <td>
                                <form action="codehome.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="image_id" value="<?php echo $row['image']; ?>">
                                    <button type="submit" name="pf_delete_btn" class="btn btn-danger">DELETE</button>
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



</div>
<script>


    let crImage = document.getElementById("pf_adminimage");
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

</script>



<?php
include('includes/script.php');
include('includes/footer.php');
?>