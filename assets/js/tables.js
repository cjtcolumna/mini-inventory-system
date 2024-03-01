function viewRow(element) {
    let id = element.children[0].innerHTML
    location.href = "view/" + id;
}

function viewRecord(element) {
    let code = element.children[1].children[0].children[1].innerHTML
    location.href = "get_id/" + code;
}