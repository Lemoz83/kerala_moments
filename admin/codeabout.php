<?php
include('security.php');



if (isset($_POST['aboutadmin'])) {
    $titlecaption = $_POST['titlecaption'];
    $contentleft = $_POST['contentleft'];
    $maincontent1 = $_POST['maincontent1'];
    $maincontent2 = $_POST['maincontent2'];
    $image1 = $_FILES['about_image1']['name'];
    $image2 = $_FILES['about_image2']['name'];
    $image3 = $_FILES['about_image3']['name'];

    // first method-----------------

    // $image_type_validation1 = $_FILES['about_image1']['type'] == "image/jpg" || $_FILES['about_image1']['type'] == "image/jpeg" || $_FILES['about_image1']['type'] == "image/png";
    // $image_type_validation2 = $_FILES['about_image2']['type'] == "image/jpg" || $_FILES['about_image2']['type'] == "image/jpeg" || $_FILES['about_image2']['type'] == "image/png";
    // $image_type_validation3 = $_FILES['about_image3']['type'] == "image/jpg" || $_FILES['about_image3']['type'] == "image/jpeg" || $_FILES['about_image3']['type'] == "image/png";

    // second method---------------

    $image_type = array('image/jpg', 'image/jpeg', 'image/png');
    $image_type_validation1 = in_array($_FILES['about_image1']['type'], $image_type);
    $image_type_validation2 = in_array($_FILES['about_image2']['type'], $image_type);
    $image_type_validation3 = in_array($_FILES['about_image3']['type'], $image_type);


    if ($image_type_validation1 || $image_type_validation2 || $image_type_validation3) {

        if (file_exists("upload/" . $image1) && file_exists("upload/" . $image2) && file_exists("upload/" . $image3)) {
            $store1 = $_FILES['about_image1']['name'];
            $store2 = $_FILES['about_image2']['name'];
            $store3 = $_FILES['about_image3']['name'];

            if ($store1) {
                $_SESSION['status'] = "Image already exits. '.$store1.'";
                header('Location: aboutus.php');
            } else if ($store2) {
                $_SESSION['status'] = "Image already exits. '.$store2.'";
                header('Location: aboutus.php');
            } else if ($store3) {
                $_SESSION['status'] = "Image already exits. '.$store3.'";
                header('Location: aboutus.php');
            }

        } else {
            $query = "INSERT INTO aboutus(titlecaption,contentleft,maincontent1,maincontent2,image1,image2,image3)VALUES('$titlecaption','$contentleft','$maincontent1','$maincontent2','$image1','$image2','$image3')";
            $query_insert = mysqli_query($con, $query);
            if ($query_insert) {
                move_uploaded_file($_FILES['about_image1']['tmp_name'], "upload/" . $image1);
                move_uploaded_file($_FILES['about_image2']['tmp_name'], "upload/" . $image2);
                move_uploaded_file($_FILES['about_image3']['tmp_name'], "upload/" . $image3);
                $_SESSION['success'] = "About Data Added";
                header('Location: aboutus.php');

            } else {
                $_SESSION['status'] = "About Data NOT Added";
                header('Location: aboutus.php');
            }
        }


    } else {
        $_SESSION['status'] = "Only jpg,jpeg,png format allowed,Try again";
        header('Location: aboutus.php');

    }


}

//Edit Button-------------------------------------------------------------

if (isset($_POST['about_update_btn'])) {

    $id = $_POST['edit_id'];
    $titlecaption = $_POST['edit_titlecaption'];
    $contentleft = $_POST['edit_contentleft'];
    $maincontent1 = $_POST['edit_maincontent1'];
    $maincontent2 = $_POST['edit_maincontent2'];
    $image1 = $_FILES['about_image1']['name'];
    $image2 = $_FILES['about_image2']['name'];
    $image3 = $_FILES['about_image3']['name'];



    $image_type = array('image/jpg', 'image/jpeg', 'image/png');
    $image_type_validation1 = in_array($_FILES['about_image1']['type'], $image_type);
    $image_type_validation2 = in_array($_FILES['about_image2']['type'], $image_type);
    $image_type_validation3 = in_array($_FILES['about_image3']['type'], $image_type);

    if ($image_type_validation1 || $image_type_validation2 || $image_type_validation3) {


        $about_query = "SELECT * FROM aboutus WHERE id = $id";
        $insert_about_query = mysqli_query($con, $about_query);

        while ($image_rows = mysqli_fetch_assoc($insert_about_query)) {

            if ($image1 == NULL) {
                $image_data1 = $image_rows['image1'];
            } else {
                //update with new image delete with old image
                if ($image_path1 = "upload/" . $image_rows['image1']) {
                    unlink($image_path1);
                    $image_data1 = $image1;

                }
            }
            if ($image2 == NULL) {
                $image_data2 = $image_rows['image2'];
            } else {
                //update with new image delete with old image
                if ($image_path2 = "upload/" . $image_rows['image2']) {
                    unlink($image_path2);
                    $image_data2 = $image2;

                }
            }
            if ($image3 == NULL) {
                $image_data3 = $image_rows['image3'];
            } else {
                //update with new image delete with old image
                if ($image_path3 = "upload/" . $image_rows['image3']) {
                    unlink($image_path3);
                    $image_data3 = $image3;
                }
            }

        }

        $query = "UPDATE aboutus SET titlecaption = '$titlecaption', contentleft = '$contentleft', maincontent1 = '$maincontent1',maincontent2 = '$maincontent2',
        image1 ='$image_data1', image2 = '$image_data2', image3 = '$image_data3' WHERE id = '$id'";
        $insert_query = mysqli_query($con, $query);

        if ($insert_query) {

            if ($image1 == NULL) {
                $_SESSION['success'] = 'About data is updated with existing image';
                header('Location: aboutus.php');
            } else {
                //update with new image delete with old image
                move_uploaded_file($_FILES['about_image1']['tmp_name'], "upload/" . $image1);
                $_SESSION['success'] = 'About data is updated';
                header('Location: aboutus.php');
            }
            if ($image2 == NULL) {
                $_SESSION['success'] = 'About data is updated with existing image';
                header('Location: aboutus.php');
            } else {
                //update with new image delete with old image
                move_uploaded_file($_FILES['about_image2']['tmp_name'], "upload/" . $image2);
                $_SESSION['success'] = 'About data is updated';
                header('Location: aboutus.php');
            }
            if ($image3 == NULL) {
                $_SESSION['success'] = 'About data is updated with existing image';
                header('Location: aboutus.php');
            } else {
                //update with new image delete with old image
                move_uploaded_file($_FILES['about_image3']['tmp_name'], "upload/" . $image3);
                $_SESSION['success'] = 'About data is updated';
                header('Location: aboutus.php');

            }

        } else {
            $_SESSION['status'] = 'About data is NOT updated';
            header('Location: aboutus.php');
        }

    } else {
        $_SESSION['status'] = "Only jpg,jpeg,png format allowed,Try again";
        header('Location: aboutus.php');

    }



}













// Delete Button--------------------------------------------------------------


if (isset($_POST['about_delete_btn'])) {

    $id = $_POST['delete_id'];
    $std_img1 = $_POST['std_img1'];
    $std_img2 = $_POST['std_img2'];
    $std_img3 = $_POST['std_img3'];



    $query = "DELETE FROM aboutus WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {
        unlink("upload/" . $std_img1);
        unlink("upload/" . $std_img2);
        unlink("upload/" . $std_img3);
        $_SESSION['success'] = 'About Data Is Deleted';
        header('Location: aboutus.php');
    } else {
        $_SESSION['status'] = ' About Data Is NOT Deleted';
        header('Location: aboutus.php');

    }
    // id AUto_increment reset ------------------------------------------
    $query_update = "SELECT * FROM aboutus";
    $insert_query_update = mysqli_query($con, $query_update);
    $num = 1;
    while ($rows = mysqli_fetch_assoc($insert_query_update)) {
        $id = $rows['id'];
        $sql = "UPDATE aboutus SET id = $num WHERE id=$id";
        if ($insert_query_update) {
            echo 'Id Number reset';
            $num++;
        }

    }

    $query_alter = "ALTER TABLE aboutus AUTO_INCREMENT = 1";
    $insert_query_alter = mysqli_query($con, $query_alter);
    if ($insert_query_alter) {
        echo ' Record Altered succesfully';
    } else {
        echo " Record Not Altered";
    }
}










?>

<!-- $query_img = mysqli_query($con, "SELECT * FROM aboutus WHERE id = '$id'");
    while ($image_row = mysqli_fetch_assoc($query_img)) {

        if ($image_path1 = $image_row['image1']) {
            unlink($image_path1);
        }

        if ($image_path2 = $image_row['image2']) {
            unlink($image_path2);
        }
        if ($image_path3 = $image_row['image3']) {
            unlink($image_path3);
        }
    } -->