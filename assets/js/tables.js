function viewRow(element) {
    let id = element.children[0].innerHTML;
    location.href = "view/" + id;
}

function viewRecord(element) {
    let code = element.children[1].children[0].children[1].innerHTML;
    location.href = "get_id/" + code;
}

// units/list.php
function showEditUnitModal(element) {
    let inputID = document.getElementById("input_id");
    let inputName = document.getElementById("input_name");
    let inputDisplay = document.getElementById("input_display");
    let inputQty = document.getElementById("input_qty");

    let id = element.parentElement.children[1].innerHTML;
    let name = element.parentElement.children[2].innerHTML;
    let display = element.parentElement.children[3].innerHTML;
    let qty = element.parentElement.children[4].innerHTML;

    inputID.value = id;
    inputName.value = name;
    inputDisplay.value = display;
    inputQty.value = qty;
}

function showDeleteUnitModal(element) {
    let btn_delete = document.getElementById("btn_delete");
    let id = element.parentElement.parentElement.children[1].innerHTML;
    btn_delete.value = id;
}