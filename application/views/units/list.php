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
                <h3 class="text-themecolor mb-0 mt-0">Units</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/dashboard/home') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Units</li>
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

        <!-- unit creation modal content -->
        <div id="createUnitModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createUnitModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="createUnitModalLabel">Create</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url('index.php/units/list') ?>" method="post" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Unit Name</label>
                                <input type="text" class="form-control" name="input_name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Unit Display</label>
                                <input type="text" class="form-control" name="input_display">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="input_qty">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="btn_create">Save</button>
                            <button class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- unit edit modal content -->
        <div id="editUnitModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editUnitModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editUnitModalLabel">Edit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url('index.php/units/list') ?>" method="post" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group d-none">
                                <label class="form-label">Unit ID</label>
                                <input type="hidden" class="form-control" id="input_id" name="input_id">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Unit Name</label>
                                <input type="text" class="form-control" id="input_name" name="input_name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Unit Display</label>
                                <input type="text" class="form-control" id="input_display" name="input_display">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="input_qty" name="input_qty">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="btn_update">Save</button>
                            <button class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- unit edit modal content -->
        <div id="deleteUnitModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteUnitModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="deleteUnitModalLabel">Delete</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url('index.php/units/list') ?>" method="post" autocomplete="off">
                        <div class="modal-body">
                            <div class="alert alert-warning">
                                <strong>Warning! </strong>
                                Are you sure you want to delete this record? You will not be able to recover this record after deleting the record.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn_delete" class="btn btn-danger" name="btn_delete">Delete</button>
                            <button class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            Action
                        </h4>
                        <hr>
                        <div class="d-grid">
                            <button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#createUnitModal">
                                <i class="fas fa-plus"></i> Create New
                            </button>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title m-0">
                                Record List
                            </h4>
                            <h4 class="card-title m-0">
                                Total Records: <?php echo $total_records ?>
                            </h4>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="d-none">ID</th>
                                    <th class="font-weight-bold">Unit Name</th>
                                    <th class="font-weight-bold">Unit Display</th>
                                    <th class="font-weight-bold">Quantity</th>
                                    <th class="font-weight-bold">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($units as $unit) : ?>
                                    <tr>
                                        <td>
                                            <?php if ($unit['lstatus'] == "Not Used") { ?>
                                                <i class="fa fa-trash" style="cursor: pointer;" data-toggle="modal" data-target="#deleteUnitModal" onclick="showDeleteUnitModal(this)"></i>
                                            <?php }; ?>
                                        </td>
                                        <td style="cursor: pointer;" data-toggle="modal" data-target="#editUnitModal" onclick="showEditUnitModal(this)" class="d-none"><?php echo $unit['lid'] ?></td>
                                        <td style="cursor: pointer;" data-toggle="modal" data-target="#editUnitModal" onclick="showEditUnitModal(this)"><?php echo $unit['lname'] ?></td>
                                        <td style="cursor: pointer;" data-toggle="modal" data-target="#editUnitModal" onclick="showEditUnitModal(this)"><?php echo $unit['ldisplay'] ?></td>
                                        <td style="cursor: pointer;" data-toggle="modal" data-target="#editUnitModal" onclick="showEditUnitModal(this)"><?php echo $unit['lqty'] ?></td>
                                        <td style="cursor: pointer;" data-toggle="modal" data-target="#editUnitModal" onclick="showEditUnitModal(this)"><span style="width: 100px" class="label label-info text-center"><?php echo $unit['lstatus'] ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <hr>
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