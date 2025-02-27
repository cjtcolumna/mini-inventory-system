<?php

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
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon.png'); ?>">
        <title>
                <?php echo $title ?>
        </title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <?php if (isset($dropify)) { ?>
                <link rel="stylesheet" href="<?php echo base_url('assets/plugins/dropify/dist/css/dropify.min.css'); ?>">
        <?php }; ?>

        <?php if (isset($form_addons)) { ?>
                <link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" type="text/css" />
                <link href="<?php echo base_url('assets/plugins/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css" />
                <link href="<?php echo base_url('assets/plugins/switchery/dist/switchery.min.css'); ?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/plugins/bootstrap-select/bootstrap-select.min.css'); ?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css'); ?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css'); ?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/plugins/multiselect/css/multi-select.css'); ?>" rel="stylesheet" type="text/css" />
        <?php }; ?>
        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="<?php echo base_url('assets/css/colors/blue.css'); ?>" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!--
        <div class="preloader">
                <svg class="circular" viewBox="25 25 50 50">
                        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
        </div>
        -->
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->
                <header class="topbar">
                        <nav class="navbar top-navbar navbar-expand-md navbar-light">
                                <!-- ============================================================== -->
                                <!-- Logo -->
                                <!-- ============================================================== -->
                                <div class="navbar-header">
                                        <a class="navbar-brand" href="<?php echo base_url('index.php/dashboard/home') ?>">
                                                <!-- Logo icon -->
                                                <b>
                                                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                                        <!-- Dark Logo icon -->
                                                        <img src="<?php echo base_url('assets/images/logo-icon.png') ?>" alt="homepage" class="dark-logo" />
                                                        <!-- Light Logo icon -->
                                                        <img src="<?php echo base_url('assets/images/logo-light-icon.png') ?>" alt="homepage" class="light-logo" />
                                                </b>
                                                <!--End Logo icon -->
                                                <!-- Logo text -->
                                                <span>
                                                        <!-- dark Logo text -->
                                                        <img src="<?php echo base_url('assets/images/logo-text.png') ?>" alt="homepage" class="dark-logo" />
                                                        <!-- Light Logo text -->
                                                        <img src="<?php echo base_url('assets/images/logo-light-text.png') ?>" class="light-logo" alt="homepage" /></span> </a>
                                </div>
                                <!-- ============================================================== -->
                                <!-- End Logo -->
                                <!-- ============================================================== -->
                                <div class="navbar-collapse">
                                        <!-- ============================================================== -->
                                        <!-- toggle and nav items -->
                                        <!-- ============================================================== -->
                                        <ul class="navbar-nav mr-auto mt-md-0 ">
                                                <!-- This is  -->
                                                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a>
                                                </li>
                                                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                                        </ul>
                                        <!-- ============================================================== -->
                                        <!-- User profile and search -->
                                        <!-- ============================================================== -->
                                        <ul class="navbar-nav my-lg-0">
                                                <li class="d-flex justify-content-center align-items-center mr-1"><b class="text-white">Hi!,
                                                                <?php echo $this->session->userdata('firstname') ?>
                                                        </b></li>
                                                <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('assets/images/users/1.jpg') ?>" alt="user" class="profile-pic" /></a>
                                                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                                                <ul class="dropdown-user">
                                                                        <li>
                                                                                <div class="dw-user-box">
                                                                                        <div class="u-img"><img src="<?php echo base_url('assets/images/users/1.jpg') ?>" alt="user">
                                                                                        </div>
                                                                                        <div class="u-text">
                                                                                                <h4>
                                                                                                        <?php echo "{$this->session->userdata('firstname')} {$this->session->userdata('lastname')}" ?>
                                                                                                </h4>
                                                                                                <p class="text-muted">
                                                                                                        <?php echo $this->session->userdata('email') ?>
                                                                                                </p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View
                                                                                                        Profile</a>
                                                                                        </div>
                                                                                </div>
                                                                        </li>
                                                                        <li role="separator" class="divider"></li>
                                                                        <li><a href="#"><i class="ti-user"></i> My
                                                                                        Profile</a></li>
                                                                        <li><a href="#"><i class="ti-wallet"></i> My
                                                                                        Balance</a></li>
                                                                        <li><a href="#"><i class="ti-email"></i>
                                                                                        Inbox</a></li>
                                                                        <li role="separator" class="divider"></li>
                                                                        <li><a href="#"><i class="ti-settings"></i>
                                                                                        Account Setting</a></li>
                                                                        <li role="separator" class="divider"></li>
                                                                        <li><a href="<?php echo base_url('index.php/dashboard/logout') ?>"><i class="fa fa-power-off"></i>
                                                                                        Logout</a></li>
                                                                </ul>
                                                        </div>
                                                </li>
                                        </ul>
                                </div>
                        </nav>
                </header>
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <aside class="left-sidebar">
                        <!-- Sidebar scroll-->
                        <div class="scroll-sidebar">
                                <!-- Sidebar navigation-->
                                <nav class="sidebar-nav">
                                        <ul id="sidebarnav">
                                                <li class="nav-small-cap">PERSONAL</li>

                                                <li>
                                                        <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-cubes"></i><span class="hide-menu">Warehouse</span></a>
                                                        <ul aria-expanded="false" class="collapse">
                                                                <li><a href="<?php echo base_url('index.php/materials/list') ?>">Materials</a></li>
                                                        </ul>
                                                </li>
                                                <li>
                                                        <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-database"></i><span class="hide-menu">Maintenance</span></a>
                                                        <ul aria-expanded="false" class="collapse">
                                                                <li><a href="<?php echo base_url('index.php/users/list') ?>">Users</a></li>
                                                                <li><a href="<?php echo base_url('index.php/customers/list') ?>">Customers</a></li>
                                                                <li><a href="<?php echo base_url('index.php/units/list') ?>">Units</a></li>
                                                                <!--
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                <li><a href="javascript:void(0)">item 1.3.3</a></li>
                                <li><a href="javascript:void(0)">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">item 1.4</a></li>
                        -->
                                                        </ul>
                                                </li>
                                        </ul>
                                </nav>
                                <!-- End Sidebar navigation -->
                        </div>
                        <!-- End Sidebar scroll-->
                </aside>
                <!-- ============================================================== -->
                <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->