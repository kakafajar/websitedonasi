const ctx_uang_bulan = document.getElementById('chart-uang-bulan');
const perbulan_button = document.getElementById('perbulan');
const perbulan_options = document.getElementById('perbulan-options');

const ctx_uang_tahun = document.getElementById('chart-uang-tahun');
const pertahun_button = document.getElementById('pertahun');
const pertahun_options = document.getElementById('pertahun-options');
const pertahun_dari_opsi = document.getElementById('pertahun-dari-opsi');
const pertahun_ke_opsi = document.getElementById('pertahun-ke-opsi');

const chart_uang_bulan = new Chart(ctx_uang_bulan, {
    type: 'bar',
    data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
            label: "Jumlah Donasi",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: [],
        }],
    }
});

const chart_uang_tahun = new Chart(ctx_uang_tahun, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            label: "Jumlah Donasi",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: [],
        }],
    }
});

perbulan();

function perbulan(){
    perbulan_button.classList.remove('btn-primary');
    perbulan_button.classList.add('btn-secondary');
    
    pertahun_button.classList.remove('btn-secondary');
    pertahun_button.classList.add('btn-primary');

    ctx_uang_bulan.removeAttribute('hidden');
    ctx_uang_tahun.setAttribute('hidden', 'hidden');

    perbulan_options.style.display = 'flex';
    pertahun_options.style.display = 'none';
}

function pertahun(){
    perbulan_button.classList.remove('btn-secondary');
    perbulan_button.classList.add('btn-primary');
    
    pertahun_button.classList.remove('btn-primary');
    pertahun_button.classList.add('btn-secondary');
    
    ctx_uang_bulan.setAttribute('hidden', 'hidden');
    ctx_uang_tahun.removeAttribute('hidden');

    perbulan_options.style.display = 'none';
    pertahun_options.style.display = 'flex';
}

pilih_tahun_perbulan(document.getElementById("perbulan-tahun-opsi"));
function pilih_tahun_perbulan(select){
    let tahun = select.children[select.selectedIndex].innerHTML.trim();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            ubah_data_chart(this, chart_uang_bulan);
        }
    }
    xhttp.open("GET", "index.php?tahun-perbulan=" + tahun, true);
    xhttp.send();
}

pilih_range_pertahun();
function pilih_range_pertahun(){
    let dari_tahun = pertahun_dari_opsi.children[pertahun_dari_opsi.selectedIndex].innerHTML.trim();
    let ke_tahun = pertahun_ke_opsi.children[pertahun_ke_opsi.selectedIndex].innerHTML.trim();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            ubah_data_chart(this, chart_uang_tahun);
        }
    }
    xhttp.open("GET", "index.php?dari-pertahun=" + dari_tahun + "&ke-pertahun=" + ke_tahun, true);
    xhttp.send();
}

function ubah_data_chart(response, chart){
    let parser = new DOMParser();
    let xmlDoc = parser.parseFromString(response.responseText,'text/xml');
    let rawLabels = xmlDoc.getElementsByTagName('LABEL');
    let rawDatas = xmlDoc.getElementsByTagName('DATA');
    let labels = [];
    let datas = [];

    for (let index = 0; index < rawLabels.length; index++) {
        labels.push(rawLabels[index].innerHTML);
    }
    for (let index = 0; index < rawDatas.length; index++) {
        datas.push(rawDatas[index].innerHTML);
    }
    if (labels.length > 0){
        chart.data.labels = labels;
    }
    chart.data.datasets[0].data = datas;
    chart.update();
}