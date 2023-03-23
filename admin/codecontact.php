<?php
include('security.php');

if (isset($_POST['contact_admin'])) {
    $content = $_POST['content'];
    $map = $_POST['map'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];


    // $image_type = array('image/jpg', 'image/jpeg', 'image/png');
    // $image_type_validation = in_array($_FILES['cr_image']['type'], $image_type);




    if (file_exists("upload\upload_contact/" . $image)) {
        $store1 = $_FILES['image']['name'];

        if ($store1) {
            $_SESSION['status'] = "Image File already exits. '.$store1.'";
            header('Location: contactpage.php');
        }


    } else {
        $query = "INSERT INTO contact_page (content,map,name,address,mobile,email,image)VALUES('$content','$map','$name','$address','$mobile','$email','$image')";
        $insert_query = mysqli_query($con, $query);

        if ($insert_query) {
            move_uploaded_file($_FILES['image']['tmp_name'], "upload\upload_contact/" . $image);
            $_SESSION['success'] = "Contact Data Added";
            header('Location: contactpage.php');

        } else {
            $_SESSION['status'] = "Contact Data NOT Added";
            header('Location: contactpage.php');
        }
    }


}

// Contact Edit BUTTON --------------------------------------------------

if (isset($_POST['contact_update_btn'])) {

    $id = $_POST['edit_id'];
    $content = $_POST['content'];
    $map = $_POST['map'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];




    // $image_type = array('image/jpg', 'image/jpeg', 'image/png');
    // $image_type_validation = in_array($_FILES['cr_img_edit']['type'], $image_type);
    // $image_type_validation = $_FILES['cr_img_edit']['type'] == 'image/jpg' || $_FILES['cr_img_edit']['type'] == 'image/jpeg' || $_FILES['cr_img_edit']['type'] == 'image/png';




    $query = "SELECT * FROM contact_page WHERE id = $id";
    $insert_query = mysqli_query($con, $query);

    while ($image_rows = mysqli_fetch_array($insert_query)) {

        if ($image == NULL) {
            $image_data = $image_rows['image'];
        } else {
            //update with new image delete with old image
            if ($file_path = "upload\upload_contact/" . $image_rows['image']) {
                unlink($file_path);
                $image_data = $image;

            }
        }

    }

    $query = "UPDATE contact_page SET content = '$content', map = '$map', name = '$name', address = '$address', mobile = '$mobile', email = '$email',image = '$image_data'
         WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {

        if ($image == NULL) {
            $_SESSION['success'] = 'Contact data is updated with existing image';
            header('Location: contactpage.php');
        } else {
            //update with new image delete with old image
            move_uploaded_file($_FILES['image']['tmp_name'], "upload\upload_contact/" . $image);
            $_SESSION['success'] = 'Blog data is updated';
            header('Location: contactpage.php');
        }

    } else {
        $_SESSION['status'] = 'Contact data is NOT updated';
        header('Location: contactpage.php');
    }




}

// BLOG DELETE BUTTON-------------------------------------------

if (isset($_POST['contact_delete_btn'])) {
    $id = $_POST['delete_id'];
    $std_img = $_POST['std_img'];




    $query = "DELETE FROM contact_page WHERE id = '$id'";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {
        unlink("upload\upload_contact/" . $std_img);
        $_SESSION['success'] = 'Contact Data Is Deleted';
        header('Location: contactpage.php');
    } else {
        $_SESSION['status'] = 'Contact Data Is NOT Deleted';
        header('Location: contactpage.php');

    }
    // id AUto_increment reset ------------------------------------------
    $query_update = "SELECT * FROM contact_page";
    $insert_query_update = mysqli_query($con, $query_update);
    $num = 1;
    while ($rows = mysqli_fetch_assoc($insert_query_update)) {
        $id = $rows['id'];
        $sql = "UPDATE contact_page SET id = $num WHERE id=$id";
        if ($insert_query_update) {
            $num++;
        }

    }

    $query_alter = "ALTER TABLE contact_page AUTO_INCREMENT = 1";
    $insert_query_alter = mysqli_query($con, $query_alter);
    if ($insert_query_alter) {
        echo ' Record Altered succesfully';
    } else {
        echo " Record Not Altered";
    }



}

// FORM SUBMISSION TO MAIL-----------------------------------


if (isset($_POST['submit_btn'])) {
    $to = "lemomatrix@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = "Form submission";
    $subject2 = "Recieved your form submission";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Hi!! " . $name . " \n\n , we will contact you shortly.\n\n We This is an automated meessgae please do not reply back";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to, $subject, $message, $headers);
    mail($from, $subject2, $message2, $headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $name . "";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}

?>