let form_num = 1;

function addNewRow(element) {
    let row = "<p>This is a new paragraph!</p>";
    document.getElementById("tbody").insertAdjacentHTML(row);
}