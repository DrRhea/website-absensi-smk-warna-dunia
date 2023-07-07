let startDate = document.getElementById('startDate');
let endDate = document.getElementById('endDate');
let tableContainer = document.getElementById('tab');

startDate.addEventListener('change', fetchAbsenData);
endDate.addEventListener('change', fetchAbsenData);

function fetchAbsenData() {
  let selectedStartDate = startDate.value;
  let selectedEndDate = endDate.value;
  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tableContainer.innerHTML = xhr.responseText;
    }
  }

  xhr.open('GET', `ajax/lihat-tanggal.php?startDate=${selectedStartDate}&endDate=${selectedEndDate}`, true);
  xhr.send();
}

const printLink = document.querySelector('.cetak-data');

printLink.addEventListener('click', function(event) {
  event.preventDefault();

  window.print();
});
