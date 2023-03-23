<?php
include('security.php');



if (isset($_POST['registeradmin'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    if ($password === $cpassword) {

        $query = "INSERT INTO `admin_registration`(username,email,password,usertype)VALUES('$username','$email','$password','$usertype')";
        $query_insert = mysqli_query($con, $query);

        if ($query_insert) {
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: register.php');

        } else {
            $_SESSION['status'] = "Admin Profile Not Added";
            header('Location: register.php');
        }

    } else {
        $_SESSION['status'] = "Password And Confirm Password Does Not Match";
        header('Location: register.php');
    }




}


if (isset($_POST['update_btn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertype = $_POST['update_usertype'];

    $query = "UPDATE admin_registration SET username = '$username', email = '$email', password = '$password',usertype = '$usertype' WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {



        $_SESSION['success'] = 'Admin No. ' . $id . ' data is updated';
        header('Location:register.php');
    } else {
        $_SESSION['status'] = 'Admin No. ' . $id . ' data is NOT updated';
        header('Location:register.php');

    }
}



if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM admin_registration WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {

        $_SESSION['success'] = 'Data Is Deleted';
        header('Location:register.php');
    } else {
        $_SESSION['status'] = ' Data Is NOT Deleted';
        header('Location:register.php');

    }

    // id AUto_increment reset ------------------------------------------

    $query_update = "SELECT * FROM admin_registration";
    $insert_query_update = mysqli_query($con, $query_update);
    $num = 1;
    while ($rows = mysqli_fetch_assoc($insert_query_update)) {
        $id = $rows['id'];
        $sql = "UPDATE admin_registration SET id = $num WHERE id=$id";
        if ($insert_query_update) {
            echo 'Id Number reset';
            $num++;
        }

    }

    $query_alter = "ALTER TABLE admin_registration AUTO_INCREMENT = 1";
    $insert_query_alter = mysqli_query($con, $query_alter);
    if ($insert_query_alter) {
        echo ' Record Altered succesfully';
    } else {
        echo " Record Not Altered";
    }

}

//login Button..................................

if (isset($_POST['login_btn'])) {
    $username = $_POST['login_user'];
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];


    $query = "SELECT * FROM admin_registration WHERE username = '$username' AND email = '$email' AND password = '$password' ";
    $insert_query = mysqli_query($con, $query);
    $usertype = mysqli_fetch_array($insert_query);

    if ($usertype['usertype'] === 'Admin') {
        $_SESSION['name'] = $username;
        $_SESSION['username'] = $email;
        header('Location: index.php');


    } else if ($usertype['usertype'] === 'User') {

        $_SESSION['username'] = $email;
        session_destroy();
        unset($_SESSION['username']);
        header('Location: ../index.php');
    } else {
        $_SESSION['status'] = ' Your Email / Password Is Invalid';
        header('Location: login.php');

    }


}






?>