<?php
include('security.php');

if (isset($_POST['footer_btn'])) {
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $br_link = $_FILES['br_link']['name'];
    $br_logo = $_FILES['br_logo']['name'];
    $br_image = $_FILES['br_image']['name'];



    $image_type = array('image/jpg', 'image/jpeg', 'image/png', 'image/pdf');
    $image_type_validation1 = in_array($_FILES['br_logo']['type'], $image_type);
    $image_type_validation2 = in_array($_FILES['br_image']['type'], $image_type);


    if ($image_type_validation1 || $image_type_validation2) {

        if (file_exists("upload/" . $br_link) && file_exists("upload/" . $br_logo) && file_exists("upload/" . $br_image)) {
            $store1 = $_FILES['br_link']['name'];
            $store2 = $_FILES['br_logo']['name'];
            $store3 = $_FILES['br_image']['name'];


            if ($store1) {
                $_SESSION['status'] = "Pdf File already exits. '.$store1.'";
                header('Location: customfooter.php');
            } else if ($store2) {
                $_SESSION['status'] = "Image already exits. '.$store2.'";
                header('Location: customfooter.php');
            } else if ($store3) {
                $_SESSION['status'] = "Image already exits. '.$store2.'";
                header('Location: customfooter.php');
            }

        } else {
            $query = "INSERT INTO footer (contact,email,br_link,br_logo,br_image) VALUES ('$contact','$email','$br_link','$br_logo','$br_image')";
            $insert_query = mysqli_query($con, $query);

            if ($insert_query) {
                move_uploaded_file($_FILES['br_link']['tmp_name'], "upload/" . $br_link);
                move_uploaded_file($_FILES['br_logo']['tmp_name'], "upload/" . $br_logo);
                move_uploaded_file($_FILES['br_image']['tmp_name'], "upload/" . $br_image);
                $_SESSION['success'] = "Footer Data Added";
                header('Location: customfooter.php');

            } else {
                $_SESSION['status'] = "Footer Data NOT Added";
                header('Location: customfooter.php');
            }
        }


    } else {
        $_SESSION['status'] = "Only jpg,jpeg,png format allowed,Try again";
        header('Location: customfooter.php');

    }



}

// EDIT BUTTON--------------------------------------------------

if (isset($_POST['footer_update_btn'])) {

    $id = $_POST['edit_id'];
    $contact = $_POST['edit_contact'];
    $email = $_POST['edit_email'];
    $br_link = $_FILES['edit_br_link']['name'];
    $br_logo = $_FILES['edit_br_logo']['name'];
    $br_image = $_FILES['edit_br_image']['name'];


    $image_type = array('image/jpg', 'image/jpeg', 'image/png', 'image/pdf');
    $file_type_validation = in_array($_FILES['edit_br_link']['type'], $image_type);
    $image_type_validation1 = in_array($_FILES['edit_br_logo']['type'], $image_type);
    $image_type_validation2 = in_array($_FILES['edit_br_image']['type'], $image_type);





    $about_query = "SELECT * FROM footer WHERE id = $id";
    $insert_about_query = mysqli_query($con, $about_query);

    while ($image_rows = mysqli_fetch_assoc($insert_about_query)) {

        if ($br_link == NULL) {
            $file_data = $image_rows['br_link'];
        } else {
            //update with new image delete with old image
            if ($file_path = "upload/" . $image_rows['br_link']) {
                unlink($file_path);
                $file_data = $br_link;

            }
        }

        if ($br_logo == NULL) {
            $image_data1 = $image_rows['br_logo'];
        } else {
            //update with new image delete with old image
            if ($image_path1 = "upload/" . $image_rows['br_logo']) {
                unlink($image_path1);
                $image_data1 = $br_logo;

            }
        }
        if ($br_image == NULL) {
            $image_data2 = $image_rows['br_image'];
        } else {
            //update with new image delete with old image
            if ($image_path2 = "upload/" . $image_rows['br_image']) {
                unlink($image_path2);
                $image_data2 = $br_image;

            }
        }


    }

    $query = "UPDATE footer SET contact= '$contact', email = '$email', br_link = '$file_data',br_logo = '$image_data1',
        br_image ='$image_data2' WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {

        if ($br_link == NULL) {
            $_SESSION['success'] = 'Footer data is updated with existing image';
            header('Location: customfooter.php');
        } else {
            //update with new image delete with old image
            move_uploaded_file($_FILES['edit_br_link']['tmp_name'], "upload/" . $br_link);
            $_SESSION['success'] = 'Footer data is updated';
            header('Location: customfooter.php');
        }

        if ($br_logo == NULL) {
            $_SESSION['success'] = 'Footer data is updated with existing image';
            header('Location: customfooter.php');
        } else {
            //update with new image delete with old image
            move_uploaded_file($_FILES['edit_br_logo']['tmp_name'], "upload/" . $br_logo);
            $_SESSION['success'] = 'Footer data is updated';
            header('Location: customfooter.php');
        }
        if ($br_image == NULL) {
            $_SESSION['success'] = 'Footer data is updated with existing image';
            header('Location: customfooter.php');
        } else {
            //update with new image delete with old image
            move_uploaded_file($_FILES['edit_br_image']['tmp_name'], "upload/" . $br_image);
            $_SESSION['success'] = 'Footer data is updated';
            header('Location: customfooter.php');
        }


    } else {
        $_SESSION['status'] = 'Footer data is NOT updated';
        header('Location: customfooter.php');
    }




}




//DELETE BUTTON---------------------------------------------------

if (isset($_POST['footer_delete_btn'])) {
    $id = $_POST['delete_id'];
    $std_file = $_POST['file_id'];
    $std_img1 = $_POST['logo_image_id'];
    $std_img2 = $_POST['image_id'];




    $query = "DELETE FROM footer WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {
        unlink("upload/" . $std_file);
        unlink("upload/" . $std_img1);
        unlink("upload/" . $std_img2);

        $_SESSION['success'] = 'Footer Data Is Deleted';
        header('Location: customfooter.php');
    } else {
        $_SESSION['status'] = 'Footer Data Is NOT Deleted';
        header('Location: customfooter.php');

    }

    // id AUto_increment reset ------------------------------------------
    $query_update = "SELECT * FROM footer";
    $insert_query_update = mysqli_query($con, $query_update);
    $num = 1;
    while ($rows = mysqli_fetch_assoc($insert_query_update)) {
        $id = $rows['id'];
        $sql = "UPDATE footer SET id = $num WHERE id=$id";
        if ($insert_query_update) {
            echo 'Id Number reset';
            $num++;
        }

    }

    $query_alter = "ALTER TABLE footer AUTO_INCREMENT = 1";
    $insert_query_alter = mysqli_query($con, $query_alter);
    if ($insert_query_alter) {
        echo ' Record Altered succesfully';
    } else {
        echo " Record Not Altered";
    }
}

?>