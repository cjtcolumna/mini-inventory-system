<?php
include "classes/UserClass.php";
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
}

if (isset($_POST['btn_save'])) {
    $firstname = $_POST['input_firstname'];
    $lastname = $_POST['input_lastname'];
    $email = $_POST['input_email'];
    $password = $_POST['input_password'];
    $confirm_password = $_POST['input_confirm_password'];

    $form = new UserClass();
    $error_msg = $form->CreateUserRecord($firstname, $lastname, $email, $password, $confirm_password);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>USERS | NEW</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="card-no-border">
    <?php include "includes/preloader.php" ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include "includes/header.php" ?>
        <?php include "includes/navbar.php" ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="user_list.php">Users</a></li>
                            <li class="breadcrumb-item active">New</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?php
                    if(isset($error_msg)){
                        if(!empty($error_msg)){
                ?>
                <div class="alert alert-danger text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3 class="text-danger">
                        <i class="fa fa-times-circle"></i>
                        Oops!
                    </h3>
                    <?php echo "$error_msg" ?>
                </div>
                <?php
                        };
                    };
                ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <h4 class="mt-4 ml-3">New User</h4>
                            <hr>
                            <div class="card-body">
                                <form class="form-horizontal" action="user_new.php" method="post" autocomplete="off">
                                    <h5>Personal Information</h5>
                                    <small>
                                        <p>
                                            Field mark with (
                                            <span style="color: red">*</span>
                                            ) is required.
                                        </p>
                                    </small>
                                    <hr>
                                    <div class="form-group mt-5">
                                        <div class="row">
                                            <label class="col-md-3 text-right">
                                                <h6>
                                                    First Name
                                                    <span style="color: red">*</span>
                                                </h6>
                                            </label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="text" name="input_firstname" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 text-right">
                                                <h6>
                                                    Last Name
                                                    <span style="color: red">*</span>
                                                </h6>
                                            </label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="text" name="input_lastname" required>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Account Details</h5>
                                    <small>
                                        <p>
                                            Field mark with (
                                            <span style="color: red">*</span>
                                            ) is required.
                                        </p>
                                    </small>
                                    <hr>
                                    <div class="form-group mt-5">
                                        <div class="row">
                                            <label class="col-md-3 text-right">
                                                <h6>
                                                    Email
                                                    <span style="color: red">*</span>
                                                </h6>
                                            </label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="email" name="input_email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 text-right">
                                                <h6>
                                                    Password
                                                    <span style="color: red">*</span>
                                                </h6>
                                            </label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="password" name="input_password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 text-right">
                                                <h6>
                                                    Confirm Password
                                                    <span style="color: red">*</span>
                                                </h6>
                                            </label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="password" name="input_confirm_password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3 text-right"></div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success" name="btn_save">Save</button>
                                                <button class="btn btn-secondary" href="user_list.php">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php include "includes/footer.php" ?>
    <?php include "includes/jquery.php" ?>
</body>

</html>