<?php
session_start();
include('includes/header.php');

?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h2 text-gray-900 mb-4">Kerala Moments</h1>
                                        <h2 class="h4 text-gray-900 mb-4">Login Here</h2>
                                    </div>
                                    <?php

                                    if (isset($_SESSION['status'])) {
                                        echo '<h4 style="color:red;"> ' . $_SESSION['status'] . ' </h4>';
                                        unset($_SESSION['status']);

                                    }
                                    ?>

                                    <form action="code.php" method="post" class="user">
                                        <div class="form-group">

                                            <input type="text" class="form-control form-control-user" name="login_user"
                                                placeholder="Enter Username">
                                        </div>
                                        <div class="form-group">

                                            <input type="email" class="form-control form-control-user"
                                                name="login_email" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="login_password" placeholder="Password">
                                        </div>


                                        <button type="submit" name="login_btn"
                                            class="btn btn-primary btn-user btn-block">Login</button>


                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>






    <?php
    include('includes/script.php');

    ?>