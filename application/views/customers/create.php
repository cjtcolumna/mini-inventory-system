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
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <h4 class="mt-4 ml-3">New Customer</h4>
                    <hr>
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo base_url('index.php/customers/create') ?>" method="post" autocomplete="off">
                            <h5>Customer Information</h5>
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
                                            Code
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="input_code">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>
                                            First Name
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="input_firstname">
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
                                        <input class="form-control" type="text" name="input_lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>Contact</h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="input_contact">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 text-right"></div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success" name="btn_save">Save</button>
                                        <a class="btn btn-secondary" href="<?php echo base_url('index.php/customers/list') ?>">Cancel</a>
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