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
                        <h3 class="text-themecolor mb-0 mt-0">Users</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/dashboard/home') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/users/list') ?>">Users</a></li>
                            <li class="breadcrumb-item active">View</li>
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
                if (isset($error_msg)) {
                    if (!empty($error_msg)) {
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
                if (isset($success_msg)) {
                    if (!empty($success_msg)) {
                    ?>
                        <div class="alert alert-success text-left">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h3 class="text-success">
                                <i class="fa fa-times-circle"></i>
                                Well done!
                            </h3>
                            <?php echo "$success_msg" ?>
                        </div>
                <?php
                    };
                };
                ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h4 class="mt-4 ml-3">
                                Users Info
                                <a class="btn btn-sm btn-secondary float-right" href="<?php echo base_url('index.php/users/list') ?>" style="margin-right: 30px">
                                    <i class="fas fa-chevron-left"></i>
                                    <i class="fas fa-chevron-left"></i>
                                    Back to list
                                </a>
                            </h4>
                            <hr>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="vtabs">
                                    <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab-pane-1" role="tab"><span class="hidden-sm-down"><i class="ti-user"></i></span> <span class="hidden-xs-down">Profile Settings</span> </a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-pane-2" role="tab"><span class="hidden-sm-down"><i class="ti-lock"></i></span> <span class="hidden-xs-down">Change Password</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-pane-3" role="tab"><span class="hidden-sm-down"><i class="ti-settings"></i></span> <span class="hidden-xs-down">Account Settings</span></a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content col-md-12">
                                        <div class="tab-pane active" id="tab-pane-1" role="tabpanel">
                                            <h3 class="mb-4">PROFILE SETTINGS</h3>
                                            <form class="form-horizontal" action="<?php echo base_url("index.php/users/view/$user_id") ?>" method="post" autocomplete="off">
                                                <div class="container">
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">First Name</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="input_firstname" value="<?php echo $user_firstname ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Last Name</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="input_lastname" value="<?php echo $user_lastname ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Email</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="email" name="input_email" value="<?php echo $user_email ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-success" type="submit" name="btn_profile_settings">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="tab-pane" id="tab-pane-2" role="tabpanel">
                                            <h3 class="mb-4">CHANGE PASSWORD</h3>
                                            <form class="form-horizontal" action="<?php echo base_url("index.php/users/view/$user_id") ?>" method="post" autocomplete="off">
                                                <div class="container">
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">New Password</label>
                                                        <div class="col-md-12">
                                                            <input id="input_new_password" class="form-control" type="password" name="input_new_password" />
                                                            <input id="showPassword" type="checkbox" onchange="document.getElementById('input_new_password').type = this.checked ? 'text' : 'password'">
                                                            <label for="showPassword">Show Password </label>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">New Password Confirm</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="password" name="input_new_password_confirm"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-success" type="submit" name="btn_change_password">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab-pane-3" role="tabpanel">
                                            <div class="container">
                                                <div class="alert alert-warning">
                                                    <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning!</h3>
                                                    Deleting this account may affect another record. Please make sure that you know what you are doing.
                                                </div>
                                                <form class="form form-horizontal" action="<?php echo base_url("index.php/users/view/$user_id") ?>" method="post">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Remove Account</label>
                                                        <div class="col-md-7">
                                                            <div class="custom-control custom-check">
                                                                <input class="custom-control-input" type="checkbox" id="checkbox_delete" name="checkbox_delete" value="1">
                                                                <label class="custom-control-label" for="checkbox_delete">Delete this account?</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-7 col-md-push-3">
                                                            <button class="btn btn-success" type="submit" name="btn_account_settings">Yes, Delete</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
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