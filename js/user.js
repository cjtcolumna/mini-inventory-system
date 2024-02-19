function viewUser(element) {
    let id = element.children[0].innerHTML
    location.href = "user_edit.php?id="+id;
}