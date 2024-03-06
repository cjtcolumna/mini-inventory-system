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

        <!-- unit edit modal content -->
        <div id="deleteUnitModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteUnitModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="deleteUnitModalLabel">Delete</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url("index.php/materials/view/" . $material['lid']) ?>" method="post" autocomplete="off">
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
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title">Product Info</h4>
                            <a class="btn btn-default" href="<?php echo base_url('index.php/materials/list') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Go back</a>
                        </div>
                        <h5 class="card-title mt-3">Details</h5>
                        <hr>
                        <img src="<?php echo base_url("uploads/materials/images/{$material['limage']}") ?>" class="img-fluid" alt="Material Image">
                        <div class="container">
                            <table class="mt-5 w-100 text-dark">
                                <tbody>
                                    <tr>
                                        <td>Item Code:</td>
                                        <td class="text-right"><?php echo $material['lcode'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item Name:</td>
                                        <td class="text-right"><?php echo $material['lname'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item Type:</td>
                                        <td class="text-right"><?php echo $material['lis_finish_product'] ? "Finish Product" : "Material" ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Category:</td>
                                        <td class="text-right"><?php echo $material['lcategory'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Unit:</td>
                                        <td class="text-right"><?php echo $material['lunit_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Unit Set:</td>
                                        <td class="text-right"><?php echo $material['lunit_set_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Default Unit:</td>
                                        <td class="text-right">
                                            <?php echo $material['lunit_set_default'] ? "Unit Set" : "Unit"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cost:</td>
                                        <td class="text-right"><?php echo number_format((float) $material['lcost'], 2) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Price:</td>
                                        <td class="text-right"><?php echo number_format((float) $material['lprice'], 2) ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Qty (Inv):</td>
                                        <td class="text-right"><?php echo $material['lqty'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a class="btn btn-secondary mt-5"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-danger text-light mt-5 ml-2" data-toggle="modal" data-target="#deleteUnitModal"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Other Details</h4>
                        <?php if ($material['lis_finish_product']) { ?>
                            <h5 class="card-title mt-4">Bills of Materials (BOM)</h5>
                            <hr>
                            <table class="table table-borderless w-100">
                                <form class="form-horizontal" action="<?php echo base_url("index.php/materials/view/" . $material['lid']) ?>" method="post" autocomplete="off">
                                    <thead>
                                        <tr>
                                            <th class="py-0">Material</th>
                                            <th class="py-0">Qty</th>
                                            <th class="py-0">Unit</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pt-1">
                                                <select class="select2" name="select_bom_material" style="cursor: pointer; width: 100%;" onchange="updateSelectUnitOptions(this)">
                                                    <option value="0">Select</option>
                                                    <?php foreach ($materials as $material) : ?>
                                                        <option value="<?php echo $material['lid'] ?>"><?php echo $material['lname'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td class="pt-1" style="max-width: 75px">
                                                <input class="form-control" type="number" name="input_bom_material_consumed">
                                            </td>
                                            <td class="pt-1">
                                                <select class="select2" name="select_bom_material_unit" style="cursor: pointer; width: 100%;">
                                                    <option>Select</option>
                                                    <option>Unit</option>
                                                    <option>Unit Set</option>
                                                </select>
                                            </td>
                                            <td class="pt-1" style="width: 1%">
                                                <button type="submit" class="btn btn-success">ADD</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </form>
                            </table>
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">#</th>
                                        <th class="font-weight-bold">Material</th>
                                        <th class="font-weight-bold">Qty</th>
                                        <th class="font-weight-bold">Unit</th>
                                        <th class="font-weight-bold">Cost</th>
                                        <th class="font-weight-bold">Total</th>
                                        <th style="width: 1%"></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $bom_total_cost = 0;
                                    foreach ($bom as $item) :
                                        $material_total_cost = number_format((float) ($item['lcost'] * $item['lqty_consumed'] * $item['lmultiplier']), 2);
                                        $bom_total_cost += $material_total_cost;
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $item['lname'] ?></td>
                                            <td><?php echo $item['lqty_consumed'] ?></td>
                                            <td><?php echo $item['ldisplay'] ?></td>
                                            <td><?php echo number_format((float) $item['lcost'], 2) ?></td>
                                            <td><?php echo $material_total_cost ?></td>
                                            <td><i class="fa fa-trash-alt" style="cursor: pointer"></i></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-right">TOTAL COST:</td>
                                        <td><?php echo number_format((float) $bom_total_cost, 2) ?></td>
                                        <td></td>
                                    </tr>
                                </tbody>

                                </tbody>
                            </table>
                            <hr>
                        <?php } else { ?>
                            <hr>
                            <div class="m-5">

                            </div>
                        <?php }; ?>
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

<script>
    let materials = <?php echo $json_materials ?>;

    function updateSelectUnitOptions(element) {
        let selected_index = element.selectedIndex //Selected Index

        if (selected_index != 0) {
            element.parentElement.parentElement.children[2].children[0].children[1].value = materials[selected_index - 1].lunit_id;
            element.parentElement.parentElement.children[2].children[0].children[1].innerHTML = materials[selected_index - 1].lunit_name;
            element.parentElement.parentElement.children[2].children[0].children[2].value = materials[selected_index - 1].lunit_set_id;
            element.parentElement.parentElement.children[2].children[0].children[2].innerHTML = materials[selected_index - 1].lunit_set_name;
        } else {
            element.parentElement.parentElement.children[2].children[0].children[1].value = "";
            element.parentElement.parentElement.children[2].children[0].children[1].innerHTML = "Unit";
            element.parentElement.parentElement.children[2].children[0].children[2].value = "";
            element.parentElement.parentElement.children[2].children[0].children[2].innerHTML = "Unit Set";
        }
        updateSelect2();
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