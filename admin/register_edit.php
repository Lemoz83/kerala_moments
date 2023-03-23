<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bolder; color: #4e73df;">
                Edit Admin Data</h5>

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
        <form action="code.php" method="post">

            <?php
            $con = mysqli_connect('localhost', 'root', '', 'kerala_moments');

            if (isset($_POST['edit_btn'])) {

                $id = $_POST['edit_id'];
                $query = "SELECT * FROM admin_registration WHERE id = $id";
                $insert_query = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($insert_query)) { //we can also use :- foreach( $insert_query as $row)
                    ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                            <label>Username</label>
                            <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control"
                                placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type=email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control"
                                placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="edit_password" value="<?php echo $row['password'] ?>"
                                class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label>Usertype</label>
                            <select name="update_usertype" class="form-control">
                                <option value="">Select</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="register.php"><button type="button" name='close' class="btn btn-danger"
                                data-dismiss="modal">Cancel</button></a>
                        <button type="submit" name='update_btn' class="btn btn-primary">Update</button>
                    </div>
                    <?php

                }
            }

            ?>


        </form>

    </div>
</div>
</div>




<?php
include('includes/script.php');
include('includes/footer.php');
?>