<?php
include('security.php');

if (isset($_POST['home_cr_btn'])) {
    $heading_main = $_POST['main_hdg'];
    $heading_sub = $_POST['sub_hdg'];
    $caption = $_POST['caption'];
    $image = $_FILES['cr_image']['name'];


    // $image_type = array('image/jpg', 'image/jpeg', 'image/png');
    // $image_type_validation = in_array($_FILES['cr_image']['type'], $image_type);




    if (file_exists("upload\upload_cr/" . $image)) {
        $store1 = $_FILES['cr_image']['name'];

        if ($store1) {
            $_SESSION['status'] = "Pdf File already exits. '.$store1.'";
            header('Location: carousel_home.php');
        }


    } else {
        $query = "INSERT INTO carousel (cr_main,cr_sub,cr_caption,cr_image)VALUES('$heading_main','$heading_sub','$caption','$image')";
        $insert_query = mysqli_query($con, $query);

        if ($insert_query) {
            move_uploaded_file($_FILES['cr_image']['tmp_name'], "upload\upload_cr/" . $image);
            $_SESSION['success'] = "Carousel Data Added";
            header('Location: carousel_home.php');

        } else {
            $_SESSION['status'] = "Carousel Data NOT Added";
            header('Location: carousel_home.php');
        }
    }


}





// EDIT BUTTON Carousel--------------------------------------------------

if (isset($_POST['cr_update_btn'])) {

    $id = $_POST['edit_id'];
    $cr_main = $_POST['cr_main_edit'];
    $cr_sub = $_POST['cr_sub_edit'];
    $cr_cap = $_POST['cr_cap_edit'];
    $cr_image = $_FILES['cr_img_edit']['name'];



    $image_type = array('image/jpg', 'image/jpeg', 'image/png');
    $image_type_validation = in_array($_FILES['cr_img_edit']['type'], $image_type);
    // $image_type_validation = $_FILES['cr_img_edit']['type'] == 'image/jpg' || $_FILES['cr_img_edit']['type'] == 'image/jpeg' || $_FILES['cr_img_edit']['type'] == 'image/png';




    $cr_query = "SELECT * FROM carousel WHERE id = $id";
    $cr_insert_query = mysqli_query($con, $cr_query);

    while ($image_rows = mysqli_fetch_array($cr_insert_query)) {

        if ($cr_image == NULL) {
            $image_data = $image_rows['cr_image'];
        } else {
            //update with new image delete with old image
            if ($file_path = "upload\upload_cr/" . $image_rows['cr_image']) {
                unlink($file_path);
                $image_data = $cr_image;

            }
        }

    }

    $query = "UPDATE carousel SET cr_main = '$cr_main', cr_sub = '$cr_sub', cr_caption = '$cr_cap', cr_image = '$image_data'
         WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {

        if ($cr_image == NULL) {
            $_SESSION['success'] = 'Carousel data is updated with existing image';
            header('Location: carousel_home.php');
        } else {
            //update with new image delete with old image
            move_uploaded_file($_FILES['cr_img_edit']['tmp_name'], "upload\upload_cr/" . $cr_image);
            $_SESSION['success'] = 'Carousel data is updated';
            header('Location: carousel_home.php');
        }

    } else {
        $_SESSION['status'] = 'Carousel data is NOT updated';
        header('Location: carousel_home.php');
    }




}





//DELETE BUTTON Carousel---------------------------------------------------

if (isset($_POST['cr_delete_btn'])) {
    $id = $_POST['delete_id'];
    $std_img = $_POST['image_id'];




    $query = "DELETE FROM carousel WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {
        unlink("upload\upload_cr/" . $std_img);
        $_SESSION['success'] = 'Carousel Data Is Deleted';
        header('Location: carousel_home.php');
    } else {
        $_SESSION['status'] = 'Carousel Data Is NOT Deleted';
        header('Location: carousel_home.php');

    }
    // id AUto_increment reset ------------------------------------------
    $query_update = "SELECT * FROM carousel";
    $insert_query_update = mysqli_query($con, $query_update);
    $num = 1;
    while ($rows = mysqli_fetch_assoc($insert_query_update)) {
        $id = $rows['id'];
        $sql = "UPDATE carousel SET id = $num WHERE id=$id";
        if ($insert_query_update) {
            $num++;
        }

    }

    $query_alter = "ALTER TABLE carousel AUTO_INCREMENT = 1";
    $insert_query_alter = mysqli_query($con, $query_alter);
    if ($insert_query_alter) {
        echo ' Record Altered succesfully';
    } else {
        echo " Record Not Altered";
    }



}



// // HOME PORTFOLIO------------------------------------------------------
// ----------------------------------------------------------------------- 

if (isset($_POST['home_pf_btn'])) {
    $main_cap = $_POST['main_cap'];
    $sub_cap = $_POST['sub_cap'];
    $image = $_FILES['pf_image']['name'];



    if (file_exists("upload\upload_portfolio/" . $image)) {
        $store1 = $_FILES['pf_image']['name'];

        if ($store1) {
            $_SESSION['status'] = "Pdf File already exits. '.$store1.'";
            header('Location: portfolio_home.php');
        }


    } else {
        $query = "INSERT INTO portfolio (main_cap,sub_cap,image)VALUES('$main_cap','$sub_cap','$image')";
        $insert_query = mysqli_query($con, $query);

        if ($insert_query) {
            move_uploaded_file($_FILES['pf_image']['tmp_name'], "upload\upload_portfolio/" . $image);
            $_SESSION['success'] = "Portfolio Data Added";
            header('Location: portfolio_home.php');

        } else {
            $_SESSION['status'] = "Portfolio Data NOT Added";
            header('Location: portfolio_home.php');
        }
    }


}

// Edit Portfolio---------------------------------------------------

if (isset($_POST['pf_update_btn'])) {

    $id = $_POST['edit_id'];
    $pf_main = $_POST['main_cap'];
    $pf_sub = $_POST['sub_cap'];
    $image = $_FILES['image']['name'];



    // $image_type = array('image/jpg', 'image/jpeg', 'image/png');
    // $image_type_validation = in_array($_FILES['cr_img_edit']['type'], $image_type);
    // $image_type_validation = $_FILES['cr_img_edit']['type'] == 'image/jpg' || $_FILES['cr_img_edit']['type'] == 'image/jpeg' || $_FILES['cr_img_edit']['type'] == 'image/png';




    $pf_query = "SELECT * FROM portfolio WHERE id = $id";
    $pf_insert_query = mysqli_query($con, $pf_query);

    while ($image_rows = mysqli_fetch_array($pf_insert_query)) {

        if ($image == NULL) {
            $image_data = $image_rows['image'];
        } else {
            //update with new image delete with old image
            if ($file_path = "upload\upload_portfolio/" . $image_rows['image']) {
                unlink($file_path);
                $image_data = $image;

            }
        }

    }

    $query = "UPDATE portfolio SET main_cap = '$pf_main', sub_cap = '$pf_sub', image = '$image_data'
         WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {

        if ($image == NULL) {
            $_SESSION['success'] = 'Portfolio data is updated with existing image';
            header('Location: portfolio_home.php');
        } else {
            //update with new image delete with old image
            move_uploaded_file($_FILES['image']['tmp_name'], "upload\upload_portfolio/" . $image);
            $_SESSION['success'] = 'Portfolio data is updated';
            header('Location: portfolio_home.php');
        }

    } else {
        $_SESSION['status'] = 'Portfolio data is NOT updated';
        header('Location: portfolio_home.php');
    }




}

// PORTFOLIO DELETE BUTTON-------------------------------------------

if (isset($_POST['pf_delete_btn'])) {
    $id = $_POST['delete_id'];
    $std_img = $_POST['image_id'];




    $query = "DELETE FROM portfolio WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {
        unlink("upload\upload_portfolio/" . $std_img);
        $_SESSION['success'] = 'Portfolio Data Is Deleted';
        header('Location: portfolio_home.php');
    } else {
        $_SESSION['status'] = 'Portfolio Data Is NOT Deleted';
        header('Location: portfolio_home.php');

    }
    // id AUto_increment reset ------------------------------------------
    $query_update = "SELECT * FROM portfolio";
    $insert_query_update = mysqli_query($con, $query_update);
    $num = 1;
    while ($rows = mysqli_fetch_assoc($insert_query_update)) {
        $id = $rows['id'];
        $sql = "UPDATE portfolio SET id = $num WHERE id=$id";
        if ($insert_query_update) {
            $num++;
        }

    }

    $query_alter = "ALTER TABLE portfolio AUTO_INCREMENT = 1";
    $insert_query_alter = mysqli_query($con, $query_alter);
    if ($insert_query_alter) {
        echo ' Record Altered succesfully';
    } else {
        echo " Record Not Altered";
    }



}







?>