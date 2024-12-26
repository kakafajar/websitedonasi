<style>
    tr:has(td):has(value.row-pending){
        /* border-color:rgb(142, 142, 142); */
        background-image:linear-gradient(to top, rgba(255, 156, 168, 0.4), white);
    }
    tr:has(td):has(value.row-confirmed){
        /* border-color:rgb(142, 142, 142); */
        background-image:linear-gradient(to top, rgba(167, 255, 214, 0.62), white);
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.4/css/dataTables.dateTime.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="modal fade" tabindex="-1" id="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="modal-form" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row row-cols-2">
                            <label for="form-id">Id</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-id" name="id" readonly>
                            </div>
                            
                            <label for="form-donatur">Donatur</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-nama" name="nama">
                            </div>
                            
                            <label for="form-email">Email</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-email" name="email">
                            </div>

                            <label for="form-no-hp">No HP</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-no-hp" name="no-hp">
                            </div>

                            <label for="form-model">Model Pembayaran</label>
                            <div class="col">
                                <select class="form-select col" name="model" id="form-model">
                                    <?php foreach($models as $model) { ?>
                                        <option value="<?=$model->get_id()?>"><?=$model->get_nama()?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <label for="form-jumlah">Jumlah</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-jumlah" name="jumlah">
                            </div>
                            
                            <label for="form-pesan">Pesan</label>
                            <div class="col">
                                <textarea class="form-control" name="pesan" id="form-pesan"></textarea>
                            </div>
                            
                            <label for="form-bukti">Bukti Transfer</label>
                            <div class="col">
                                <input class="form-control" type="file" id="form-bukti" name="bukti">
                            </div>
                            
                            <label for="form-status">Status</label>
                            <div class="col">
                                <select class="form-select" name="status" id="form-status">
                                    <option value="pending">Pending</option>
                                    <option value="finished">Confirmed</option>
                                </select>
                            </div>
                            
                            <label for="form-tanggal">Tanggal</label>
                            <div class="col">
                                <input class="form-control" type="datetime-local" id="form-tanggal" name="tanggal">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit-button">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modal-other">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-other-title">Bukti Transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container" id="modal-other-container">
                    <p id="pesan-content"></p>
                    <img id="bukti-transfer-img" src="" alt="" height="500px">
                    <form action="?mode=edit_status_selected" method="post" id="status-in-other">
                        <input type="text" name="ids" style="display:none">
                        <select class="form-select" name="status" id="form-status">
                            <option value="pending">Pending</option>
                            <option value="finished">Confirmed</option>
                        </select>
                        <button type="button" class="btn btn-primary w-100 mt-2" onclick="process_edit_status()">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
        <div class="card mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                
            </div>
            <div class="card-body">
                <div class="d-flex mb-3">
                    <button class="btn btn-primary" onclick="add()">Add Data</button>
                    <button class="btn btn-secondary" onclick="exportCSV()">Export CSV</button>
                </div>
                <div class="d-flex ">
                    <div class="d-flex me-2 align-items-center">
                        <label for="from">Dari</label>
                        <input type="text" id="from-date" class="form-control">
                    </div>
                    <div class="d-flex me-2 align-items-center">
                        <label for="to">Ke</label>
                        <input type="text" id="to-date" class="form-control">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="refreshDatatable()">Filter</button>
                    <button type="button" class="btn btn-primary" onclick="clearDates()">Clear</button>
                </div>
                <div class="mb-3 align-items-center" id="selected-options" style="display:none;">
                    <button class="btn btn-danger" onclick="delete_all_selected(this)">
                        <form action="?mode=deleteselected" method="post" style="display:none;">
                            <input type="text" name="ids">
                        </form>
                        Delete yang dipilih
                    </button>
                    <button class="btn btn-primary me-2" onclick="edit_status_selected()">Edit Status yang dipilih</button>
                    <h6 id="selected-counters">x25</h6>
                </div>
                <table id="datatablehtml" class="table cell-border hover">
                    <thead>
                        <th>
                            <input class="form-check-input" type="checkbox" onclick="select_all_checkbox(this)">
                        </th>
                        <th>Id</th>
                        <th>Donatur</th>
                        <th>Email Donatur</th>
                        <th>No HP Donatur</th>
                        <th>Model Pembayaran</th>
                        <th>Jumlah</th>
                        <th>Pesan</th>
                        <th>Bukti Transfer</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($transactions as $transaction) { ?>
                            <tr>
                                <td>
                                    <input class="form-check-input selected-checkbox" type="checkbox" onclick="selected_changed(this, '<?=$transaction->get_id()?>')">
                                </td>
                                <td><?=$transaction->get_id()?></td>
                                <td><?=$transaction->get_donatur()?></td>
                                <td><?=$transaction->get_email()?></td>
                                <td><?=$transaction->get_no_hp()?></td>
                                <td>
                                    <value style="display:none;" forcsv="<?=$transaction->get_model()->get_nama()?>"><?=$transaction->get_model()->get_id()?></value>
                                    <a href="" onclick="search_on_table(this, '<?=$transaction->get_model()->get_id()?>', 'modelpembayaran.php')"><?=$transaction->get_model()->get_nama()?></a>
                                </td>
                                <td><?=$transaction->get_jumlah()?></td>
                                <td>
                                    <value style="display:none;"><?=$transaction->get_pesan()?></value>
                                    <button class="btn btn-primary" onclick="
                                        showmsg(this)
                                    ">Show</button>
                                </td>
                                <td>
                                    <button class="btn btn-primary" 
                                    onclick="
                                    showimg('../<?= $transaction->get_bukti_transfer() ?>')
                                    ">Show</button>
                                </td>
                                <td>
                                    <value class="
                                        <?php if ($transaction->get_status() == 'pending') {?>
                                            row-pending
                                        <?php } else { ?>
                                            row-confirmed
                                        <?php } ?>
                                    "><?=$transaction->get_status()?></value>
                                </td>
                                <td><?=$transaction->get_tanggal()?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="edit(this)">Edit</button>
                                    <button class="btn btn-danger" onclick="erase(this)">
                                        <a href="?mode=delete&id=<?=$transaction->get_id()?>" onclick="event.stopPropagation()"></a>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script src='js/modalform.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.4/js/dataTables.dateTime.min.js"></script>
<script>
    const modal_other = new bootstrap.Modal('#modal-other', { keyboard:false});
    const modal_other_title = document.getElementById("modal-other-title");
    const modal_other_container = document.getElementById("modal-other-container");

    const bukti_transfer_img = document.getElementById("bukti-transfer-img");
    const pesan_content = document.getElementById("pesan-content");
    const status_in_other = document.getElementById("status-in-other");
    
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

    function refreshDatatable(){
        datatable.draw();
    }

    function reset_modal_other(){
        modal_other_container.childNodes.forEach(element => {
            if (element.nodeType != Node.TEXT_NODE){
                element.style.display = "none";
            }
        });
    }

    function showimg(url){
        reset_modal_other();
        pesan_content.style.display = "block";
        pesan_content.innerText = "Bukti Transfer tidak ada.";
        if (url != '../'){
            bukti_transfer_img.style.display = "block";
            bukti_transfer_img.src = url;
        }
        
        modal_other_title.innerText = "Bukti Transfer";
        modal_other.show();
    }

    function showmsg(tag){
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
                status_in_other.submit();
            }
        });
    }

</script>