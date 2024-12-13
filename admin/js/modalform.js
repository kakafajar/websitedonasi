window.addEventListener('DOMContentLoaded', event => {
    var datatableHtml = document.getElementById('datatable');
    if (datatableHtml) {
        var datatable = new simpleDatatables.DataTable(datatableHtml);
    }

    if (sessionStorage.getItem('search')){
        datatable.search(sessionStorage.getItem('search'));
        sessionStorage.removeItem('search')
    }
});

const modalTitle = document.getElementById("modal-title");
const form = document.getElementById("modal-form");
const modal = new bootstrap.Modal('#modal', {
    keyboard: false
});

document.getElementById("submit-button").addEventListener('click', process_submit);
let modal_mode = 'add';

function add(){
    modalTitle.innerHTML = 'Add Data';
    form.action = "?mode=add";
    modal_mode = 'add';
    
    for (let index = 0; index < form.elements.length; index++) {
        const element = form.elements[index];
        if (element.tagName == "INPUT"){
            element.value = ''
        }
    }
    
    modal.show();
}

function edit(button){
    modalTitle.innerHTML = 'Edit Data';
    form.action = "?mode=edit";
    modal_mode = 'edit';

    let row = button.parentElement.parentElement;
    for (let index = 0; index < form.elements.length; index++) {
        const element = form.elements[index];
        if (element.tagName == "SELECT"){
            element.value = row.childNodes[index-1].childNodes[1].innerHTML;
        }
        if (element.tagName == "INPUT"){
            if (element.type != "file"){
                element.value = row.childNodes[index-1].innerHTML;
            }
        }
    }
    
    modal.show();
}

function process_submit(){
    if (modal_mode == 'add'){
        form.submit();
    }else{
        swal({
            title : "Apakah anda yakin ingin merubah data?",
            text : "data akan diupdate",
            icon : "warning",
            buttons : true,
            dangerMode : true,
        }).then((clicked) => {
            if (clicked){
                form.submit();
            }
        });
    }
}

function erase(button){
    swal({
        title : "Apakah anda yakin ingin menghapus data?",
        text : "data akan hilang",
        icon : "warning",
        buttons : true,
        dangerMode : true,
    }).then((clicked) => {
        if (clicked){
            let aElement = null;
            button.childNodes.forEach(element => {
                if (element.tagName == "A"){
                    aElement = element;
                }
            });
            aElement.click();
        }
    });
}
