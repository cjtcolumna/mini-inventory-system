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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/materials/list') ?>">Materials</a></li>
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
                    <?php echo $error_msg ?>
                </div>
        <?php
            };
        };
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <h4 class="mt-4 ml-3">Edit Product Details</h4>
                    <hr>
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo base_url("index.php/materials/edit/{$material_id}") ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title">Product Details</h4>
                                <a class="btn btn-default" href="<?php echo base_url("index.php/materials/view/{$material_id}") ?>"><i class="fas fa-arrow-alt-circle-left"></i> Go back</a>
                            </div>
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
                                    <div class="col-md-4 mx-auto">
                                        <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="50M" name="input_image" data-default-file="<?php echo base_url("uploads/materials/images/{$material['limage']}") ?>" />
                                        <small>File must only be an image</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>
                                            Code
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="input_code" value="<?php echo set_value('input_code', $material['lcode']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>
                                            Name
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="input_name" value="<?php echo set_value('input_name', $material['lname']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="custom-control custom-check">
                                            <input class="custom-control-input" type="checkbox" id="checkbox_is_finish_product" name="checkbox_is_finish_product" value="1" <?php if($material['lis_finish_product']) echo "checked"; ?>>
                                            <label class="custom-control-label" for="checkbox_is_finish_product">Is a finish product?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>
                                            Category
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="input_category" value="<?php echo set_value('input_category', $material['lcategory']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>
                                            Unit
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <select name="select_material_unit_id" class="select2" style="width: 100%" >
                                            <option>Select</option>
                                            <?php foreach ($units as $unit) : ?>
                                                <option value="<?php echo $unit['lid'] ?>" <?php if($unit['lid'] == $material['lunit_id']) echo "selected"; ?>><?php echo $unit['lname'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-0">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>
                                            Unit Set
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <select name="select_material_unit_set_id" class="select2" style="width: 100%" >
                                            <option>Select</option>
                                            <?php foreach ($units as $unit) : ?>
                                                <option value="<?php echo $unit['lid'] ?>" <?php if($unit['lid'] == $material['lunit_set_id']) echo "selected"; ?>><?php echo $unit['lname'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="custom-control custom-check">
                                            <input class="custom-control-input" type="checkbox" id="checkbox_default_unit" name="checkbox_default_unit" value="1" <?php if($material['lunit_set_default']) echo "checked" ; ?>>
                                            <label class="custom-control-label" for="checkbox_default_unit">Set as Default Unit?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>
                                            Cost
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="input_cost" value="<?php echo set_value('input_cost', $material['lcost']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>
                                            Price
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="input_price" value="<?php echo set_value('input_price', $material['lprice']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>
                                            Qty (Inv)
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="input_qty" value="<?php echo set_value('input_qty', $material['lqty']) ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 text-right"></div>
                                    <div class="col-md-6">
                                        <button type="submit" id="btn_save" class="btn btn-success" name="btn_save">Save</button>
                                        <a class="btn btn-secondary" href="<?php echo base_url("index.php/materials/view/{$material_id}") ?>">Cancel</a>
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