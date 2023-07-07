let keyword = document.getElementById('keyword');
let tableContainer = document.getElementById('tab');

keyword.addEventListener('keyup', function() {
  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tableContainer.innerHTML = xhr.responseText;
    }
  }

  xhr.open('GET', 'ajax/siswa.php?keyword=' + keyword.value, true);
  xhr.send();
});

let tombolHadir = document.querySelectorAll('.hadir');
let tombolIzin = document.querySelectorAll('.izin');
let tombolAlfa = document.querySelectorAll('.alfa');

tombolHadir.forEach((tombol) => {
  tombol.addEventListener('click', (e) => {
    let absenElement = e.target.parentElement;
    absenElement.innerHTML = "Hadir";

    // Ambil data nis dan tanggal dari elemen di sekitarnya
    let nis = tombol.closest('tr').querySelector('.nis').textContent;
    let tanggal = new Date().toISOString().slice(0, 10); // Ambil tanggal hari ini

    // Panggil fungsi tambahAbsensi untuk memasukkan data absensi ke dalam database
    tambahAbsensi(nis, tanggal);
  });
});

tombolIzin.forEach((tombol) => {
  tombol.addEventListener('click', (e) => {
    let absenElement = e.target.parentElement;
    absenElement.innerHTML = "Izin";

    // Ambil data nis dan tanggal dari elemen di sekitarnya
    let nis = tombol.closest('tr').querySelector('.nis').textContent;
    let tanggal = new Date().toISOString().slice(0, 10); // Ambil tanggal hari ini

    // Panggil fungsi tambahAbsensi untuk memasukkan data absensi ke dalam database
    tambahAbsensi(nis, tanggal);
  });
});

tombolAlfa.forEach((tombol) => {
  tombol.addEventListener('click', (e) => {
    let absenElement = e.target.parentElement;
    absenElement.innerHTML = "Alfa";

    // Ambil data nis dan tanggal dari elemen di sekitarnya
    let nis = tombol.closest('tr').querySelector('.nis').textContent;
    let tanggal = new Date().toISOString().slice(0, 10); // Ambil tanggal hari ini

    // Panggil fungsi tambahAbsensi untuk memasukkan data absensi ke dalam database
    tambahAbsensi(nis, tanggal);
  });
});

const printLink = document.querySelector('.cetak-data');

printLink.addEventListener('click', function(event) {
  event.preventDefault();

  window.print();
});