window.addEventListener("DOMContentLoaded", event => {
    datatable = new DataTable("#datatablehtml");
    const modal_other = new bootstrap.Modal('#modal-other', { keyboard:false});
    const modal_other_title = document.getElementById("modal-other-title");
    const modal_other_container = document.getElementById("modal-other-container");

    const bukti_transfer_img = document.getElementById("bukti-transfer-img");
    const pesan_content = document.getElementById("pesan-content");
    const status_in_other = document.getElementById("status-in-other");

    document.getElementById("export-csv-btn").addEventListener("click", () => exportCSV());
    document.getElementById("submit-form-status-btn").addEventListener("click", () => process_edit_status())
    document.getElementById("filter-date-btn").addEventListener("click", () => {
        datatable.draw();
    })
    document.getElementById("edit-all-btn").addEventListener("click", () => edit_status_selected());
    document.getElementById("clear-filter-date-btn").addEventListener("click", () => clearDates());
    document.querySelectorAll("#show-img-btn").forEach( (e) => {
        e.addEventListener("click", (event) => {
            show_img(event.target.getAttribute('img'));
        });
    });
    document.querySelectorAll("#show-msg-btn").forEach( (e) => {
        e.addEventListener("click", (event) => {
            show_msg(event.target);
        });
    });

    function reset_modal_other(){
        modal_other_container.childNodes.forEach(element => {
            if (element.nodeType != Node.TEXT_NODE){
                element.style.display = "none";
            }
        });
    }

    function show_img(url){
        reset_modal_other();
        if (url != '../'){
            bukti_transfer_img.style.display = "block";
            bukti_transfer_img.src = url;
        }
        else{
            pesan_content.style.display = "block";
            pesan_content.innerText = "Bukti Transfer tidak ada.";
        }
        
        modal_other_title.innerText = "Bukti Transfer";
        modal_other.show();
    }

    function show_msg(tag){
        reset_modal_other();
        pesan_content.style.display = "block";
        pesan_content.innerText = tag.parentElement.childNodes[1].innerText;
        if (pesan_content.innerText == ""){
            pesan_content.innerText = "Pesan tidak ada.";
        }
        
        modal_other_title.innerText = "Pesan Donatur";
        modal_other.show();
    }

    function edit_status_selected(){
        reset_modal_other();
        status_in_other.style.display="block";
        
        status_in_other.childNodes[1].value = JSON.stringify(selecteds);
        console.log(status_in_other.childNodes[1].value);
        
        modal_other_title.innerText = "Edit Status yang diselect";
        modal_other.show();
    }

    function process_edit_status(){
        swal({
            title : "Apakah anda yakin ingin mengedit semua data?",
            text : "Anda akan mengedit data sebanyak x" + selecteds.length,
            icon : "warning",
            buttons : true,
            dangerMode : true,
        }).then((clicked) => {
            if (clicked){
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", status_in_other.action);
                xhttp.onload = function (){
                    if (xhttp.status == 200){
                        swal({title:"data berhasil diubah", icon:"success"}).then(() => {location.reload()});
                    }else{
                        swal({title:"error", text:xhttp.response, icon:"warning"});
                    }
                }
                xhttp.send(new FormData(status_in_other));
            }
        });
    }

    // Filter Tanggal
    let from_date, to_date;

    from_date = new DateTime("#from-date", {
        format: "MMMM Do YYYY"
    });

    to_date = new DateTime("#to-date", {
        format: "MMMM Do YYYY"
    });

    DataTable.ext.search.push(function (settings, data, dataIndex) {
        let from = from_date.val();
        let to = to_date.val();
        let date = new Date(data[10].substr(0, 10));
        
        if (
            (from === null && to === null) ||
            (from === null && date <= to) ||
            (from <= date && to === null) ||
            (from <= date && date <= to)
            
        ){
            return true;
        }
        return false;
    });

    function clearDates(){
        document.getElementById("from-date").value = "";
        document.getElementById("to-date").value = "";
        from_date.val("");
        to_date.val("");

        datatable.draw();
    }
    // Filter Tanggal End

    function exportCSV(){
        var table = datatable.rows().nodes();

        var csvContent = table.map(function(row) {
            let filteredrow = [];
            row.childNodes.forEach(col => {
                // cek kalau kolom adalah td
                if (col.tagName == "TD"){
                    console.log(col.childNodes.length);
                    
                    // cek kalau anak kolom lebih dari satu
                    if (col.childNodes.length < 2){
                        filteredrow.push(col.innerText);
                    }
                    // cek kalau ada tag value dalam table column (untuk yang pake tombol show)
                    else if (col.childNodes[1].tagName == "VALUE"){
                        if (col.childNodes[1].hasAttribute('forcsv')){
                            filteredrow.push(col.childNodes[1].getAttribute("forcsv"));
                        } else{
                            filteredrow.push(col.childNodes[1].innerText);
                        }
                    }
                }
            });
            return filteredrow.join(',');
        }).join('\n');

        // buat link untuk didownload
        var link = document.createElement('a');
        link.href = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csvContent);
        link.download = 'Transaksi.csv';
        link.click();
    }

});
