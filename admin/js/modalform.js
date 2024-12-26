var datatable;
window.addEventListener('DOMContentLoaded', event => {
    var datatableHtml = document.getElementById('datatablehtml');
    if (datatableHtml) {
        datatable = new DataTable('#datatablehtml', {
            scrollX : true,
            columnDefs: [{ orderable: false, targets: 0 }],
            order : [[1, 'desc']]
        });
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

var selected_options = document.getElementById("selected-options");
var selected_counters = document.getElementById("selected-counters");

var selecteds = [];

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
        const tableElement = row.childNodes[index];

        if (element.tagName == "SELECT" || element.tagName == "TEXTAREA"){
            element.value = tableElement.childNodes[1].innerHTML;
        }
        else if (element.tagName == "INPUT"){
            if (element.type != "file"){
                element.value = tableElement.innerHTML;
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

function selected_changed(tag, id){
    if (tag.checked == true && selecteds.indexOf(id) == -1){
        selecteds.push(id);
    }else{
        selecteds.splice(selecteds.indexOf(id), 1);
    }

    selected_counters.innerText = "x" + selecteds.length;
    if (selecteds.length > 0){
        selected_options.style.display = "flex";
    }else{
        selected_options.style.display = "none";
    }
}

function select_all_checkbox(tag){
    let all_selecteds = Array.from(document.getElementsByClassName("selected-checkbox"));
    
    all_selecteds.forEach(element => {
        if (tag.checked != element.checked){
            element.click();
        }
    });
}

function delete_all_selected(button){
    swal({
        title : "Apakah anda yakin ingin menghapus semua data?",
        text : "data sebanyak x"+ selecteds.length +" akan hilang",
        icon : "warning",
        buttons : true,
        dangerMode : true,
    }).then((clicked) => {
        if (clicked){
            button.childNodes.forEach(element => {
                console.log(element.tagName);
                
                if (element.tagName == "FORM"){
                    element.childNodes[1].value = JSON.stringify(selecteds);
                    element.submit();
                }
            });
        }
    });
}