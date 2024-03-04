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
                    <?php echo "$error_msg" ?>
                </div>
        <?php
            };
        };
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <h4 class="mt-4 ml-3">New Material</h4>
                    <hr>
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo base_url('index.php/materials/create') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                            <h5>Material Details</h5>
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
                            <div class="form-group mb-0">
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
                                    <div class="col-md-6 mx-auto">
                                        <div class="custom-control custom-check">
                                            <input class="custom-control-input" type="checkbox" id="checkbox_is_finish_product" name="checkbox_is_finish_product" value="1">
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
                                        <select name="select_material_unit" class="select2" style="width: 100%">
                                            <option>Select</option>
                                            <?php foreach ($units as $unit) : ?>
                                                <option value="<?php echo $unit['lid'] ?>"><?php echo $unit['lname'] ?></option>
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
                                        <select name="select_material_unit_set" class="select2" style="width: 100%">
                                            <option>Select</option>
                                            <?php foreach ($units as $unit) : ?>
                                                <option value="<?php echo $unit['lid'] ?>"><?php echo $unit['lname'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
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
                                            Cost
                                            <span style="color: red">*</span>
                                        </h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="input_cost">
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
                                        <input class="form-control" type="number" name="input_price">
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

                            <h5 class="mt-5">Bills of Materials (BOM)</h5>
                            <hr>

                            <div class="form-group table-responsive">
                                <table class="table table-hover mt-5">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bold">#</th>
                                            <th class="font-weight-bold" style="width: 25%">Material</th>
                                            <th class="font-weight-bold" style="width: 25%">Qty Consumed Per Unit</th>
                                            <th class="font-weight-bold" style="width: 25%">Unit</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr>
                                            <td class="align-middle">1</td>
                                            <td>
                                                <select name="select_bom_material" class="select2" style="width: 100%">
                                                    <option>Select</option>
                                                    <?php foreach ($materials as $material) : ?>
                                                        <option value="<?php echo $material['lid'] ?>"><?php echo $material['lname'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="input_bom_material_consumed">
                                            </td>
                                            <td>
                                                <select name="select_bom_material_unit" class="select2" style="width: 100%">
                                                    <option>Select</option>
                                                    <option>Unit</option>
                                                    <option>Unit Set</option>
                                                </select>
                                            </td>
                                            <td class="align-middle"><i class="fa fa-trash-alt"></i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button class="btn btn-outline-success" onclick="addNewRow(this)"><i class="fas fa-plus"></i> Add New Item</button>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


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