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
                <h3 class="text-themecolor mb-0 mt-0">Products</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/dashboard/home') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/products/list') ?>">Products</a></li>
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
                    <h4 class="mt-4 ml-3">New Product</h4>
                    <hr>
                    <div class="card-body">

                        <?php echo form_open_multipart('products/create', array('class' => 'form-horizontal', 'autocomplete' => 'off')); ?>
                        <!--
                            <form class="form-horizontal" action="<?php //echo base_url('index.php/materials/create') 
                                                                    ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        -->
                        <h5>Product Details</h5>
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
                                    <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="50M" name="input_image" />
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
                                    <input class="form-control" type="text" name="input_code">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 text-right">
                                    <h6>
                                        Name
                                        <span style="color: red">*</span>
                                    </h6>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="input_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 text-right">
                                    <h6>
                                        Category
                                        <span style="color: red">*</span>
                                    </h6>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="input_category">
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
                                    <input class="form-control" type="text" name="input_unit">
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
                                    <input class="form-control" type="text" name="input_unit_set">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <div class="custom-control custom-check">
                                        <input class="custom-control-input" type="checkbox" id="checkbox_default_unit" name="checkbox_default_unit" value="1">
                                        <label class="custom-control-label" for="checkbox_default_unit">Set as Default Unit?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 text-right">
                                    <h6>
                                        Unit Qty
                                        <span style="color: red">*</span>
                                    </h6>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="input_unit_qty">
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
                                    <input class="form-control" type="number" name="input_qty">
                                </div>
                            </div>
                        </div>


                        <h5>Bills of Materials (BOM)</h5>
                        <small>
                            <p>
                                Field mark with (
                                <span style="color: red">*</span>
                                ) is required.
                            </p>
                        </small>
                        <hr>

                        <?php $form = array(); ?>

                        <?php $selected_material = 0; ?>
                        <div id="form1">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6 id="test">
                                            Material 1
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <select name="select_material1" class="select2" style="width: 100%" onchange="update_unit_options(this, 1)">
                                            <option>Select</option>
                                            <optgroup label="Materials">
                                                <?php foreach ($materials as $material) : ?>
                                                    <option value="<?php echo $material['lid'] ?>"><?php echo $material['lname'] ?></option>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        </select>
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
                                        <select id="unit_options1" name="select_material_unit1" class="select2" style="width: 100%">
                                            <option>Select</option>
                                            <option id="form1_unit1" value="0">Unit</option>
                                            <option id="form1_unit2" value="1">Unit Set</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 text-right">
                                        <h6>
                                            Qty
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="input_material_qty1">
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="row mb-5">
                            <div class="col-md-6 mx-auto">
                                <button class="btn btn-outline-success"><i class="fa fa-plus"></i> Add New Item</button>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 text-right"></div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success" name="btn_save">Save</button>
                                    <a class="btn btn-secondary" href="<?php echo base_url('index.php/materials/list') ?>">Cancel</a>
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
<script src="<?php echo base_url('assets/js/forms.js') ?>"></script>