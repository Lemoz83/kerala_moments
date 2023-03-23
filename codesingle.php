<?php
// BLOG COMMENTS---------------------------------------------------------------
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'kerala_moments';

$con = new mysqli($host, $user, $pass, $db);

if (!$con) {
    echo "some problem with conectivity!!!";
}

if (isset($_POST['submit_comment'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $place = $_POST['place'];
    $comment = $_POST['comment'];


    // $image_type = array('image/jpg', 'image/jpeg', 'image/png');
    // $image_type_validation = in_array($_FILES['cr_image']['type'], $image_type);




    $query = "INSERT INTO blog_comments (name,email,place,comment)VALUES('$name','$email','$place','$comment')";
    $insert_query = mysqli_query($con, $query);

    if ($insert_query) {
        header('Location: single.php');
    }

}

?>