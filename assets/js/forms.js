let form_num = 1;

function update_unit_options(material, form_group) {
    var unit_options = document.getElementById("unit_options" + form_group);
    var selected_material = material.value;

    if(material != "Selected" || material.length === 0 || !material){
        unit_options.children[1].innerHTML = "TEST";//"<?php echo $materials['" + selected_material + "'][lunit] ?>";
        unit_options.children[2].innerHTML = "TEST 2"//"<?php echo $materials['" + selected_material + "'][lunit_set] ?>";
    }
}