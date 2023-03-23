<?php
session_start();
include('database/dbconfig.php');


if ($dbconfig) {

    // echo 'database is connected';

} else {
    header('Location: database/dbconfig.php');
}


if (!$_SESSION['username']) {

    header('Location: login.php');
}
?>