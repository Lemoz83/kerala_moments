<link href="../css/sb-admin-2.min.css" rel="stylesheet">

<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'kerala_moments';

$con = mysqli_connect($host, $user, $pass);
$dbconfig = mysqli_select_db($con, $db);

if ($dbconfig) {

  // echo 'database is connected';

} else {
  echo '<div class="container">
    <h1>:(</h1><br>
    <h2>A <span>404</span> error occured, Page not found, check the URL and try again.</h2><br><br>
      <h3><a href="#">Return to home</a>&nbsp;|&nbsp;<a href="javascript:history.back()">Go Back</a></h3>
    </div>';
}


?>