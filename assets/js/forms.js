let form_num = 1;

function addNewRow(element) {
    var htmlContent = '<p></p>';
    var newElement = document.createElement('p');
    document.getElementById("container").insertAdjacentHTML('beforeend', htmlContent);
}