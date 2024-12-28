var selecteds = [];
var datatable;
window.addEventListener('DOMContentLoaded', event => {
    const modal = new bootstrap.Modal('#modal', {
        keyboard: false
    });
    const modal_title = document.getElementById("modal-title");
    const modal_form = document.getElementById("modal-form");
    // inisialisasi modal
    
    var selected_options = document.getElementById("selected-options");
    var selected_counters = document.getElementById("selected-counters");
    
    // datatable
    var datatableHtml = document.getElementById('datatablehtml');
    if (datatableHtml) {
        datatable = new DataTable('#datatablehtml', {
            scrollX : true,
            columnDefs: [{ orderable: false, targets: 0 }],
            order : [[1, 'desc']]
        });
    }

    if (sessionStorage.getItem('search')){
        datatable.search(sessionStorage.getItem('search')).draw();
        sessionStorage.removeItem('search')
    }
    // datatable end
    
    // untuk menampilkan form add data
    document.getElementById("add-data-btn").addEventListener("click", () => add());
    // untuk submit form add data
    document.getElementById("submit-button").addEventListener('click', (e) => {
        if (modal_form.checkValidity()){
            process_submit_btn();
        }else{
            modal_form.reportValidity();
        }
    });
    // untuk menghapus semua yang di select/checkbox
    document.getElementById("delete-all-btn").addEventListener("click", (e) => delete_all_selected(e.target));
    // untuk menselect semua checkbox
    document.getElementById("all-data-checkbox").addEventListener("click", (e) => select_all_checkbox(e.target));
    
    // untuk mengedit baris di tabel
    document.querySelectorAll("#edit-data-btn").forEach((e) => {
        e.addEventListener("click", (event) => edit(event.target));
    });
    // untuk menghapus baris di tabel
    document.querySelectorAll("#delete-data-btn").forEach((e) => {
        e.addEventListener("click", (event) => process_delete(event.target));
    });
    // untuk menselect checkbox di tabel
    document.querySelectorAll("#data-checkbox").forEach((e) => {
        e.addEventListener("click", (event) => select_checkbox(event.target, event.target.getAttribute('data-id')));
    })
    
    // submit mode dipake untuk tau prosesnya ke swal atau langsung submit form
    // kalau submit berarti langsung submit
    // kalau swal berarti tanya dulu ke user, yakin gk mau ngeditnya
    let submit_mode = 'submit';
    // untuk menampilkan form add data
    function add(){
        // merubah title dari modal(popup)
        modal_title.innerHTML = 'Add Data';
        // merubah variable get ke php
        modal_form.action = "?mode=add";
        // merubah mode
        submit_mode = 'submit';
        
        // mengkosong kan semua input di form modal
        for (let index = 0; index < modal_form.elements.length; index++) {
            const element = modal_form.elements[index];
            if (element.tagName == "INPUT"){
                element.value = ''
            }
        }
        
        // menampilkan modal
        modal.show();
    }

    // untuk menampilkan form edit
    function edit(button){
        // merubah title jadi edit
        modal_title.innerHTML = 'Edit Data';
        // merubah variable get ke edit (untuk php)
        modal_form.action = "?mode=edit";
        // merubah submit mode, yang artinya swal untuk menanyakan ke user terlebih dahulu
        submit_mode = 'swal';

        // mengambil tr, button adalah button edit didalam baris/tr
        // mengapa parent elementnya dua kali?, karena button ada didalam td
        let row = button.parentElement.parentElement;

        // fungsi dari loop ini adalah untuk mengambil data dari tabel, lalu masukan ke
        // input form.
        // length - 2 untuk menskip tombol close dan save changes
        for (let index = 1; index < modal_form.elements.length - 2; index++) {
            // mengambil input
            const input = modal_form.elements[index];
            // dikali 2 untuk mendapatkan kolom dari table (selisih 2 karna ada #text)
            // ditambah satu untuk menskip
            const tableColumn = row.childNodes[(index*2)+1];
            // console.log(tableColumn);
            // cek kalau kolom adalah td, bukan text
            if (tableColumn.tagName == "TD"){
                // jika mempunyai tag value, maka dapatkan nilai dari tag value
                // jika tidak, maka langsung dapatkan dari td
                
                if (tableColumn.childNodes.length > 2 && tableColumn.childNodes[1].tagName == "VALUE"){
                    input.value = tableColumn.childNodes[1].innerText;
                }else{
                    input.value = tableColumn.innerText;
                }
                
            }
        }
        
        modal.show();
    }

    // untuk memproses add/edit form
    function process_submit_btn(){
        // cek jika submit mode adalah submit,
        // jika iya maka langsung submit,
        if (submit_mode == 'submit'){
            process_modal_form();
        // jika tidak maka tanya dulu ke user
        }else{
            swal({
                title : "Apakah anda yakin ingin merubah data?",
                text : "data akan diupdate",
                icon : "warning",
                buttons : true,
                dangerMode : true,
            }).then((clicked) => {
                // jika di klik iya/yakin maka submit form
                if (clicked){
                    process_modal_form();
                }
            });
        }
    }

    function process_modal_form(){
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", modal_form.action);
        xhttp.onload = function(){
            // kalau berhasil, munculkan swal data telah dihapus
            // lalu refresh agar datatable me refresh
            if (xhttp.status == 200){
                swal({title : "proses berhasil", icon : 'success'})
                .then(() => {
                    location.reload();
                });
            } else{
                // jika gagal maka tampilkan error
                swal({title : "error",text: xhttp.responseText, icon : "warning"});
            }
        }
        xhttp.send(new FormData(modal_form));
    }

    // untuk memproses delete baris di tabel
    function process_delete(button){
        swal({
            title : "Apakah anda yakin ingin menghapus data?",
            text : "data akan hilang",
            icon : "warning",
            buttons : true,
            dangerMode : true,
        }).then((clicked) => {
            if (clicked){
                // membuat ajax request ke php untuk menghapus data
                // variablenya dari tag button, attribute get-var
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "?mode=delete&id=" + button.getAttribute("data-id"));
                xhttp.onload = function(){
                    // kalau berhasil, munculkan swal data telah dihapus
                    // lalu refresh agar datatable me refresh
                    if (xhttp.status == 200){
                        swal({title : "data telah dihapus", icon : 'success'})
                        .then(() => {
                            location.reload();
                        });
                    } else{
                        // jika gagal maka tampilkan error
                        swal({title : "error",text: xhttp.responseText, icon : "warning"});
                    }
                }
                xhttp.send();
            }
        });
    }

    // untuk men select checkbox baris dari tabel
    function select_checkbox(tag, id){
        // cek jika checkbox di centang dan jika tidak ada di array selecteds
        // jika kondisi benar, masukan ke array selecteds
        if (tag.checked == true && selecteds.indexOf(id) == -1){
            selecteds.push(id);
        }else{
        // jika checkbox tidak di centang, tapi di array masih ada, maka hapus dari array
            selecteds.splice(selecteds.indexOf(id), 1);
        }

        // ganti text di deket "delete all selected" menjadi x"banyaknya yang di select"
        selected_counters.innerText = "x" + selecteds.length;
        // jika ada yang di centang, maka tampilkan tombol/opsi untuk yang di centang
        // jika gk ada yang di centang, maka sembunyikan
        if (selecteds.length > 0){
            selected_options.style.display = "flex";
        }else{
            selected_options.style.display = "none";
        }
    }

    // untuk mencentang semua checkbox
    function select_all_checkbox(tag){
        // ambil semua checkbox
        let all_checkboxes = Array.from(document.querySelectorAll("#data-checkbox"));
        
        // ganti mode checkbox yang tidak sama dengan 
        // checkbox yang ada di atas/di header/tableheader/th
        // ini artinya akan mengecentang/gk di centang semuanya
        all_checkboxes.forEach(element => {
            if (tag.checked != element.checked){
                element.click();
            }
        });
    }

    // menghapus semua yang dicentang
    function delete_all_selected(button){
        // bertanya ke user apakaha yakin ingin menghapus data sebanyak ini
        swal({
            title : "Apakah anda yakin ingin menghapus semua data?",
            text : "data sebanyak x"+ selecteds.length +" akan hilang",
            icon : "warning",
            buttons : true,
            dangerMode : true,
        }).then((clicked) => {
            if (clicked){
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "?mode=delete_all_selected");
                xhttp.onload = function() {
                    if (xhttp.status == 200){
                        swal({title : "semua data berhasil dihapus", icon: 'success'}).then(() => {location.reload()});
                    }else{
                        swal({title : "error",text: xhttp.responseText, icon : "warning"});
                    }
                }
                let fd = new FormData()
                fd.append("ids", JSON.stringify(selecteds));
                xhttp.send(fd);
            }
        });
    }
});