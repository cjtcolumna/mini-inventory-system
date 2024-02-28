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
                    <li class="breadcrumb-item active">Users</li>
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
                        <h4 class="card-title">Users</h4>
                        <a class="btn btn-sm btn-success text-white" href="<?php echo base_url('index.php/users/create') ?>" style="width: 90px">Add</a>
                        <div class="table-responsive mt-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $user) :
                                        $user_id = $user['lid'];
                                        $user_firstname = $user['lfirstname'];
                                        $user_lastname = $user['llastname'];
                                        $user_email = $user['lemail'];

                                    ?>
                                        <tr style="cursor: pointer;" onclick="viewRow(this)">
                                            <td><?php echo "$user_id" ?></td>
                                            <td><?php echo "$user_firstname" ?></td>
                                            <td><?php echo "$user_lastname" ?></td>
                                            <td><?php echo "$user_email" ?></td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
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