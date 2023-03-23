<?php
include('security.php');

if (isset($_POST['blog_admin'])) {
    $blog_title = $_POST['blog_title'];
    $blog_content = $_POST['blog_content'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $date = $_POST['blog_date'];
    $image = $_FILES['blog_image']['name'];


    // $image_type = array('image/jpg', 'image/jpeg', 'image/png');
    // $image_type_validation = in_array($_FILES['cr_image']['type'], $image_type);




    if (file_exists("upload\upload_blog/" . $image)) {
        $store1 = $_FILES['blog_image']['name'];

        if ($store1) {
            $_SESSION['status'] = "Image File already exits. '.$store1.'";
            header('Location: blogpage.php');
        }


    } else {
        $query = "INSERT INTO blog (blog_title,blog_content,state,country,date,image)VALUES('$blog_title','$blog_content','$state','$country','$date','$image')";
        $insert_query = mysqli_query($con, $query);

        if ($insert_query) {
            move_uploaded_file($_FILES['blog_image']['tmp_name'], "upload\upload_blog/" . $image);
            $_SESSION['success'] = "Blog Data Added";
            header('Location: blogpage.php');

        } else {
            $_SESSION['status'] = "Blog Data NOT Added";
            header('Location: blogpage.php');
        }
    }


}

// BLOG EDIT BUTTON --------------------------------------------------

if (isset($_POST['blog_update_btn'])) {

    $id = $_POST['edit_id'];
    $blog_title = $_POST['blog_title'];
    $blog_content = $_POST['blog_content'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $date = $_POST['date'];
    $image = $_FILES['image']['name'];




    // $image_type = array('image/jpg', 'image/jpeg', 'image/png');
    // $image_type_validation = in_array($_FILES['cr_img_edit']['type'], $image_type);
    // $image_type_validation = $_FILES['cr_img_edit']['type'] == 'image/jpg' || $_FILES['cr_img_edit']['type'] == 'image/jpeg' || $_FILES['cr_img_edit']['type'] == 'image/png';




    $blog_query = "SELECT * FROM blog WHERE id = $id";
    $blog_insert_query = mysqli_query($con, $blog_query);

    while ($image_rows = mysqli_fetch_array($blog_insert_query)) {

        if ($image == NULL) {
            $image_data = $image_rows['image'];
        } else {
            //update with new image delete with old image
            if ($file_path = "upload\upload_blog/" . $image_rows['image']) {
                unlink($file_path);
                $image_data = $image;

            }
        }

    }

    $query = "UPDATE blog SET blog_title = '$blog_title', blog_content = '$blog_content', state = '$state', country = '$country', date = '$date', image = '$image_data'
         WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {

        if ($image == NULL) {
            $_SESSION['success'] = 'Blog data is updated with existing image';
            header('Location: blogpage.php');
        } else {
            //update with new image delete with old image
            move_uploaded_file($_FILES['image']['tmp_name'], "upload\upload_blog/" . $image);
            $_SESSION['success'] = 'Blog data is updated';
            header('Location: blogpage.php');
        }

    } else {
        $_SESSION['status'] = 'Blog data is NOT updated';
        header('Location: blogpage.php');
    }




}

// BLOG DELETE BUTTON-------------------------------------------

if (isset($_POST['blog_delete_btn'])) {
    $id = $_POST['delete_id'];
    $std_img = $_POST['std_img'];




    $query = "DELETE FROM BLOG WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {
        unlink("upload\upload_blog/" . $std_img);
        $_SESSION['success'] = 'Blog Data Is Deleted';
        header('Location: blogpage.php');
    } else {
        $_SESSION['status'] = 'Blog Data Is NOT Deleted';
        header('Location: blogpage.php');

    }
    // id AUto_increment reset ------------------------------------------
    $query_update = "SELECT * FROM blog";
    $insert_query_update = mysqli_query($con, $query_update);
    $num = 1;
    while ($rows = mysqli_fetch_assoc($insert_query_update)) {
        $id = $rows['id'];
        $sql = "UPDATE blog SET id = $num WHERE id=$id";
        if ($insert_query_update) {
            $num++;
        }

    }

    $query_alter = "ALTER TABLE blog AUTO_INCREMENT = 1";
    $insert_query_alter = mysqli_query($con, $query_alter);
    if ($insert_query_alter) {
        echo ' Record Altered succesfully';
    } else {
        echo " Record Not Altered";
    }



}







?>