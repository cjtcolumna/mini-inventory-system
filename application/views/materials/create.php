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
                                        <input class="form-control" type="text" name="input_code" value="<?php echo set_value('input_code') ?>">
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
                                        <input class="form-control" type="text" name="input_name" value="<?php echo set_value('input_name') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="custom-control custom-check">
                                            <input class="custom-control-input" type="checkbox" id="checkbox_is_finish_product" name="checkbox_is_finish_product" value="1" onclick="showBOM(this, 'bom-container')">
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
                                        <input class="form-control" type="text" name="input_category" value="<?php echo set_value('input_category') ?>">
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
                                        <select name="select_material_unit_id" class="select2" style="width: 100%">
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
                                        <select name="select_material_unit_set_id" class="select2" style="width: 100%">
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
                                        <input class="form-control" type="number" name="input_cost" value="<?php echo set_value('input_cost') ?>">
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
                                        <input class="form-control" type="number" name="input_price" value="<?php echo set_value('input_price') ?>">
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
                                        <input class="form-control" type="number" name="input_qty" value="<?php echo set_value('input_qty') ?>">
                                    </div>
                                </div>
                            </div>

                            <div id="bom-container" class="d-none">
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
                                        <tbody id="container">
                                            <tr>
                                                <td class="align-middle">1</td>
                                                <td>
                                                    <select class="select2" name="select_bom_material1" style="cursor: pointer; width: 100%;" onchange="updateSelectUnitOptions(this)">
                                                        <option value="0">Select</option>
                                                        <?php foreach ($materials as $material) : ?>
                                                            <option value="<?php echo $material['lid'] ?>"><?php echo $material['lname'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number" name="input_bom_material_consumed1">
                                                </td>
                                                <td>
                                                    <select class="select2" name="select_bom_material_unit1" style="cursor: pointer; width: 100%;">
                                                        <option>Select</option>
                                                        <option>Unit</option>
                                                        <option>Unit Set</option>
                                                    </select>
                                                </td>
                                                <td class="align-middle"><i class="fa fa-trash-alt" style="cursor: pointer" onclick="deleteRow(this)"></i></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-outline-success m-1" onclick="addNewRow(this)"><i class="fas fa-plus"></i> Add New Item</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 text-right"></div>
                                    <div class="col-md-6">
                                        <button type="submit" id="btn_save" class="btn btn-success" name="btn_save" value="1">Save</button>
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
<?php //echo base_url('assets/js/forms.js') 
?>
<script>
    let materials = <?php echo $json_materials ?>;
    let units = <?php echo $json_units ?>;
    let row_count = 1;

    let material_options = '';
    materials.forEach(material => {
        material_options += '<option value="' + material.lid + '">' + material.lname + '</option>';
    });

    function addNewRow(element) {
        row_count++;

        let htmlContent = `
        <tr>
            <td class="align-middle">` + row_count + `</td>
            <td>
                <select class="select2" name="select_bom_material` + row_count + `" style="cursor: pointer; width: 100%;" onchange="updateSelectUnitOptions(this)">
                    <option>Select</option>` + material_options + `
                </select>
            </td>
            <td>
                <input class="form-control" type="number" name="input_bom_material_consumed` + row_count + `">
            </td>
            <td>
                <select class="select2" name="select_bom_material_unit` + row_count + `" style="cursor: pointer; width: 100%;">
                    <option>Select</option>
                    <option>Unit</option>
                    <option>Unit Set</option>
                    </select>
            </td>
            <td class="align-middle"><i class="fa fa-trash-alt" style="cursor: pointer" onclick="deleteRow(this)"></i></td>
        </tr>
        `;

        document.getElementById("container").insertAdjacentHTML('beforeend', htmlContent);
        document.getElementById("btn_save").value = row_count;
        updateSelect2();
    }

    function deleteRow(element) {
        let index = element.parentElement.parentElement.children[0].innerHTML;
        let container = document.getElementById("container");

        if (row_count != 1) { //this should be if container children size not == 1
            element.parentElement.parentElement.remove();
            row_count--;
            for (let i = 0; i < row_count; i++) {
                //update number
                container.children[i].children[0].innerHTML = i + 1;
                //update input and select elements' name attribute
                container.children[i].children[1].children[0].name = "select_bom_material" + (i + 1);
                container.children[i].children[2].children[0].name = "input_bom_material_consumed" + (i + 1);
                container.children[i].children[3].children[0].name = "select_bom_material_unit" + (i + 1);
            }
            document.getElementById("btn_save").value = row_count;
        }


    }

    function updateSelectUnitOptions(element) {
        let selected_index = element.selectedIndex //Selected Index
        if (selected_index != 0) {
            let unit_id = materials[selected_index - 1].lunit_id;
            units.forEach(unit => {
                if (unit.lid == unit_id) {
                    element.parentElement.parentElement.children[3].children[0].children[1].value = unit.lid; //Unit
                    element.parentElement.parentElement.children[3].children[0].children[1].innerHTML = unit.lname;
                }
            });
            let unit_set_id = materials[selected_index - 1].lunit_set_id;
            units.forEach(unit => {
                if (unit.lid == unit_set_id) {
                    element.parentElement.parentElement.children[3].children[0].children[2].value = unit.lid; //Unit Set
                    element.parentElement.parentElement.children[3].children[0].children[2].innerHTML = unit.lname;
                }
            });
        } else {
            units.forEach(unit => {
                if (unit.lid == unit_id) {
                    element.parentElement.parentElement.children[3].children[0].children[1].value = "1"; //Unit
                    element.parentElement.parentElement.children[3].children[0].children[1].innerHTML = "Unit";
                }
            });
            units.forEach(unit => {
                if (unit.lid == unit_set_id) {
                    element.parentElement.parentElement.children[3].children[0].children[2].value = "2"; //Unit Set
                    element.parentElement.parentElement.children[3].children[0].children[2].innerHTML = "Unit Set";
                }
            });
        }
        updateSelect2();
    }

    function showBOM(element, container_id) {
        let checkbox = element;
        let container = document.getElementById(container_id);
        container.classList.toggle("d-none");
    }

    function updateSelect2() {
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            //templateResult: formatRepo, // omitted for brevity, see the source of this page
            //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    }
</script>