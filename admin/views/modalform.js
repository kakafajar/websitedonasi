const modalTitle = document.getElementById("modal-title");
const form = document.getElementById("modal-form");
const modal = new bootstrap.Modal('#modal', {
    keyboard: false
});

document.getElementById("submit-button").addEventListener('click', process_edit);

function add(){
    modalTitle.innerHTML = 'Add Data';
    form.action = "?mode=add";
    
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

    let row = button.parentElement.parentElement;
    for (let index = 0; index < form.elements.length; index++) {
        const element = form.elements[index];
        if (element.tagName == "INPUT"){
            element.value = row.childNodes[index-1].innerHTML;
        }
    }
    
    modal.show();
}

function process_edit(){
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
