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
                    <li class="breadcrumb-item active">Customers</li>
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
        <div class="row">
            <div class="col-12">
                <?php
                $success_msg = $this->session->flashdata('success_msg');
                if (isset($success_msg)) {
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
                ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Customers</h4>
                        <a class="btn btn-sm btn-success text-white" href="<?php echo base_url('index.php/customers/create') ?>" style="width: 90px">Add</a>
                        <div class="table-responsive mt-4">
                            <?php if (!empty($customers)) { ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($customers as $customer) :
                                            $customer_id = $customer['lid'];
                                            $customer_code = $customer['lcode'];
                                            $customer_firstname = $customer['lfirstname'];
                                            $customer_lastname = $customer['llastname'];
                                            $customer_email = $customer['lcontact'];

                                        ?>
                                            <tr style="cursor: pointer;" onclick="viewRow(this)">
                                                <td><?php echo "$customer_id" ?></td>
                                                <td><?php echo "$customer_code" ?></td>
                                                <td><?php echo "$customer_firstname" ?></td>
                                                <td><?php echo "$customer_lastname" ?></td>
                                                <td><?php echo "$customer_email" ?></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <div class="alert alert-warning text-center">
                                    <h4 class="text-warning">
                                        <i class="fa fa-exclamation-circle"></i>
                                        No records found.
                                    </h4>
                                </div>
                            <?php } ?>
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

<script src="<?php echo base_url('assets/js/tables.js') ?>"></script>