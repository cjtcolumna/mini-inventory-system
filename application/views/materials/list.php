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
                <h3 class="text-themecolor mb-0 mt-0">Materials</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/dashboard/home') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Materials</li>
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
                        <div class="d-block">
                            <a class="btn btn-success w-100 mb-3" href="<?php echo base_url('index.php/materials/create') ?>"><i class="fas fa-plus"></i> Create New</a>
                            <a class="btn btn-info w-100 mb-3" href="<?php echo base_url('index.php/materials/list') ?>"><i class="fas fa-retweet"></i> Clear Sorting</a>
                        </div>
                        <h4 class="card-title mt-3">
                            Filters
                        </h4>
                        <hr>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" placeholder="Search" aria-label="" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div>
                            <h5>Sort by:</h5>
                            <select class="selectpicker mb-3 mr-2" data-style="btn-info btn-outline-info">
                                <option data-tokens="all">All</option>
                                <option data-tokens="materials">Materials</option>
                                <option data-tokens="finish_product">Finish Products</option>
                            </select>
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
                        <hr>
                        <table class="table table-hover mt-5">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold" style="width: 15%">Image</th>
                                    <th class="font-weight-bold">Item</th>
                                    <th class="font-weight-bold">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($materials as $material) : ?>
                                    <tr style="cursor: pointer;" onclick="viewRecord(this)">
                                        <td class="align-middle">
                                            <img src="<?php echo base_url("uploads/materials/images/{$material['limage']}") ?>" class="img-fluid img-thumbnail" alt="Material Image"  style="width: 200px; height: 150px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-xl-4 font-weight-normal">Code:</div>
                                                <div class="col-xl-8"><?php echo $material['lcode'] ?></div>
                                            </div>
                                            <div class="row">
                                                <span class="col-xl-4 font-weight-normal">Name:</span>
                                                <span class="col-xl-8"><?php echo $material['lname'] ?></span>
                                            </div>
                                            <div class="row">
                                                <span class="col-xl-4 font-weight-normal">Category:</span>
                                                <span class="col-xl-8"><?php echo $material['lcategory'] ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-xl-4 font-weight-normal">Unit:</div>
                                                <div class="col-xl-8"><?php echo $material['lunit_display'] ?></div>
                                            </div>
                                            <div class="row">
                                                <span class="col-xl-4 font-weight-normal">Unit Set:</span>
                                                <span class="col-xl-8"><?php echo $material['lunit_set_display'] ?></span>
                                            </div>
                                            <div class="row">
                                                <span class="col-xl-4 font-weight-normal">Cost:</span>
                                                <span class="col-xl-8"><?php echo $material['lcost'] ?></span>
                                            </div>
                                            <div class="row">
                                                <span class="col-xl-4 font-weight-normal">Price:</span>
                                                <span class="col-xl-8"><?php echo $material['lprice'] ?></span>
                                            </div>
                                            <div class="row">
                                                <span class="col-xl-4 font-weight-normal">Qty (Inv):</span>
                                                <?php
                                                $qty = $material['lunit_set_default'] ?
                                                    (string) (round($material['lqty'] / $material['lunit_set_qty'], 2)) . " " . $material['lunit_set_display'] :
                                                    (string) $material['lqty'] . " " . $material['lunit_display'];
                                                ?>
                                                <span class="col-xl-8"><?php echo $qty ?></span>
                                            </div>
                                        </td>
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