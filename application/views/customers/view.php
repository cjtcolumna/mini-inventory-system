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
                        <h3 class="text-themecolor mb-0 mt-0">Customers</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/dashboard/home') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/customers/list') ?>">Customers</a></li>
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
                                Customer Info
                                <a class="btn btn-sm btn-secondary float-right" href="<?php echo base_url('index.php/customers/list') ?>" style="margin-right: 30px">
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
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab-pane-1" role="tab"><span class="hidden-sm-down"><i class="ti-user"></i></span> <span class="hidden-xs-down">Record Settings</span> </a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-pane-2" role="tab"><span class="hidden-sm-down"><i class="ti-settings"></i></span> <span class="hidden-xs-down">Record Deletion</span></a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content col-md-12">
                                        <div class="tab-pane active" id="tab-pane-1" role="tabpanel">
                                            <h3 class="mb-4">RECORD SETTINGS</h3>
                                            <form class="form-horizontal" action="<?php echo base_url("index.php/customers/view/$customer_id") ?>" method="post" autocomplete="off">
                                                <div class="container">
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Code</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="input_code" value="<?php echo $customer_code ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">First Name</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="input_firstname" value="<?php echo $customer_firstname ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Last Name</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="input_lastname" value="<?php echo $customer_lastname ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Contact</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="input_contact" value="<?php echo $customer_contact ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-success" type="submit" name="btn_record_settings">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        
                                        <div class="tab-pane" id="tab-pane-2" role="tabpanel">
                                            <div class="container">
                                                <div class="alert alert-warning">
                                                    <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning!</h3>
                                                    Deleting this record may affect another record. Please make sure that you know what you are doing.
                                                </div>
                                                <form class="form form-horizontal" action="<?php echo base_url("index.php/customers/view/$customer_id") ?>" method="post">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Remove Record</label>
                                                        <div class="col-md-7">
                                                            <div class="custom-control custom-check">
                                                                <input class="custom-control-input" type="checkbox" id="checkbox_delete" name="checkbox_delete" value="1">
                                                                <label class="custom-control-label" for="checkbox_delete">Delete this record?</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-7 col-md-push-3">
                                                            <button class="btn btn-success" type="submit" name="btn_record_deletion">Yes, Delete</button>
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