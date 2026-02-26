<x-layout>
  <x-slot:title>{{$title}}</x-slot:title>
    <div class="flex flex-col md:flex-row justify-between mx-4 py-3">
        <div id="tombol-tambah" class="flex items-stretch">
            <a href="{{ route('tu.formAduan') }}" class="bg-button-primaryBtn hover:bg-button-hoverPrimaryBtn rounded-lg shadow-lg w-full flex-1 text-white text-center py-3 px-10">Tambah</a>
        </div>
        <div class="relative flex items-center" id="search">
            <input type="text" id="searchInput" placeholder="Cari kata kunci.."
            class="border-solid border-2 border-background-yellow2Bg text-md rounded-lg pr-10 py-2 focus:ring-background-yellow2Bg focus:border-background-yellow2Bg focus:ring-2">
              <button type="button" id="resetSearch" class="absolute right-1 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                  <path d="M6 6L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6 15L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button> 
            </input>
        </div>
    </div>

    <div class="flex flex-col md:flex-row justify-between py-3 px-8 my-3">
        <div>
            <form id="view">
              <input type="radio" value="semua" name="status" id="semua" checked>
              <label for="semua" class="mr-4">Semua</label>

              <input type="radio" value="sudah" name="status" id="sudah">
              <label for="sudah" class="mr-4">Belum Dijadwalkan</label>

              <input type="radio" value="belum" name="status" id="belum">
              <label for="belum" class="mr-4">Belum Diajukan</label>
            </form>
        </div>
        <div>
          <form action="{{ route('tu.kirimSemuaAduan') }}" method="POST">
            @csrf
              <button type="submit" class="bg-button-acceptBtn hover:bg-button-hoverBtn rounded-lg shadow-lg flex-1 text-white text-center py-2 px-10
              hover:text-grey-400">Kirim Semua</button>
          </form>
        </div>
    </div>

    {{-- Tabel Aduan --}}
    <div class="bg-white shadow-md border-2 border-background-yellow2Bg rounded-lg overflow-hidden">
      <div class="w-full p-4 bg-white rounded-lg">
        <div class="overflow-x-auto overflow-y-auto border-b border-background-yellow2Bg rounded-lg overflow-hidden">
          <table class="table-auto min-w-max w-full border-collapse">
            <thead class="sticky top-0 bg-background-yellow2Bg">
              <tr class="bg-background-yellow2Bg text-black text-center rounded-md">
                <th class="py-2 px-3">Nomor Aduan</th>
                <th class="py-2 px-3">Topik</th>
                <th class="py-2 px-3">Perusahaan</th>
                <th class="py-2 px-3">Pengawas</th>
                <th class="py-2 px-3">Aksi</th>
              <tr>
            </thead>
            <tbody id="aduanSelected">
              {{-- Dynamic Content --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Modal Detail Aduan --}}
    <div id="background-modal" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden"></div>
    <div id="modal" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg w-full max-w-[90%] sm:w-[800px] p-6 sm:p-8 shadow-lg hidden">
    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 sm:mb-6">Detail Aduan</h3>

    <div class="text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between py-1">
      <label class="w-full sm:w-1/3 text-sm text-gray-900">Nomor Aduan:</label>
      <input id="modal-kode" type="text" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg" readonly>
    </div>

    <div class="text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between py-1">
      <label class="w-full sm:w-1/3 text-sm text-gray-900">Topik:</label>
      <input id="modal-topik" type="text" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg" readonly>
    </div>

    <div class="text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between py-1">
      <label class="w-full sm:w-1/3 text-sm text-gray-900">Aduan:</label>
      <textarea id="modal-aduan" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg" readonly rows="3"></textarea>
    </div>

    <div class="text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between py-1 focus:border-background-yellow1Bg focus:ring-background-yellow1Bg">
      <label class="w-full sm:w-1/3 text-sm text-gray-900">Perusahaan:</label>
      <input id="modal-perusahaan" type="text" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg" readonly>
    </div>

    <div class="text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between py-1">
      <label class="w-full sm:w-1/3 text-sm text-gray-900">Kontak:</label>
      <input id="modal-kontak" type="text" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg" readonly>
    </div>

    <div class="text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between py-1">
      <label class="w-full sm:w-1/3 text-sm text-gray-900">Kanal:</label>
      <input id="modal-kanal" type="text" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg" readonly>
    </div>

    <div class="text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between py-1">
      <label class="w-full sm:w-1/3 text-sm text-gray-900">Status:</label>
      <input id="modal-status" type="text" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg" readonly>
    </div>

    <div class="text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between py-1">
      <label class="w-full sm:w-1/3 text-sm text-gray-900">Keterangan:</label>
      <input id="modal-keterangan" type="text" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg" readonly>
    </div>

    <div class="text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between py-1">
      <label class="w-full sm:w-1/3 text-sm text-gray-900">Pengawas:</label>
      <input id="modal-pengawas" type="text" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg" readonly>
    </div>

    <div class="mt-4 sm:mt-6 flex flex-col sm:flex-row sm:justify-end items-center space-y-2 sm:space-y-0 sm:space-x-2">
      <button type="button" id="closeDetail" class="w-full sm:w-auto px-6 py-3 text-white bg-button-declineBtn hover:bg-button-hoverDeclineBtn rounded-lg shadow focus:ring-4 focus:ring-red-300">Tutup</button>
    </div>
  </div>

  {{-- Modal Success --}}
  <div id="successModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h3 id="successMessage" class="text-xl font-semibold text-gray-900 mb-4">Aduan Berhasil Dikirimkan</h3>
        <a href="/aduan">
            <button id="closeSuccessModal" class=" px-6 py-3 text-white bg-button-declineBtn hover:bg-button-hoverDeclineBtn rounded-lg">Tutup</button>
        </a>
    </div>
  </div>
  
    <script>
      
      const statusVal = document.getElementsByName('status');
      var selectedVal = null;
      statusVal.forEach((radio) => {
        if(radio.checked){
          selectedVal = radio.value;
          console.log(selectedVal);
          fetch(`/status-aduan-selected?status=${selectedVal}`)
              .then(response => {
                if(!response.ok){
                  throw new Error('Network response was not okay');
                }
                return response.json(); 
              })
              .then(data => {
                const isi = document.getElementById('aduanSelected');
                isi.innerHTML = '';
                const now = new Date();
                data.forEach(item => {
                  const createdAt = new Date(item.created_at);
                  const isNew = (now - createdAt) < (1 * 60 * 60 *1000);
                  const rowClass = isNew ? 'bg-yellow-100' : '';

                  const pengawasExist = item.name != '' ? item.name : 'Belum Ada Pengawas';

                  let link ='';
                  link = `/aduan/kirim-aduan/${item.id}`;

                  const row = `
                  <tr class="${rowClass}">
                      <td class='py-3 px-3 text-sm text-center'>${item.kode}</td>
                      <td class='py-3 px-3 text-sm max-w-[15rem] text-left'>${item.topik}</td>
                      <td class='py-3 px-3 text-sm max-w-[15rem] text-left'>${item.perusahaan}</td>
                      <td class='py-3 px-3 text-sm max-w-xs text-left'>${pengawasExist}</td>
                      <td class='py-3 px-3 text-sm text-center'>
                        <div class="flex flex-row space-x-2">
                          <button class="openDetail bg-button-primaryBtn hover:bg-button-hoverPrimaryBtn rounded-lg shadow-lg text-sm text-white text-center py-2 px-4"
                            data-kode="${item.kode}" data-topik="${item.topik}" data-aduan="${item.aduan}" data-perusahaan="${item.perusahaan}" data-kontak="${item.kontak}" data-kanal="${item.kanal}" data-status="${item.status}" data-keterangan="${item.keterangan}" data-pengawas="${pengawasExist}"
                          >Detail</button>
                          <form action="${link}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="${item.id}">
                            <button type="submit" class="bg-button-acceptBtn hover:bg-button-hoverBtn rounded-lg shadow-lg text-sm text-white text-center py-3 px-4">Kirim</button>
                          </form>
                        </div>
                      </td>
                    </tr>`
                  isi.innerHTML += row;
                });
              })
        }
        radio.addEventListener('change', (event) => {
          if(event.target.checked){
            selectedVal = event.target.value;
            fetch(`/status-aduan-selected?status=${selectedVal}`)
              .then(response => {
                if(!response.ok){
                  throw new Error('Network response was not okay');
                }
                return response.json(); 
              })
              .then(data => {
                const isi = document.getElementById('aduanSelected');
                isi.innerHTML = '';
                const now = new Date();
                data.forEach(item => {
                  const createdAt = new Date(item.created_at);
                  const isNew = (now - createdAt) < (1 * 60 * 60 *1000);
                  const rowClass = isNew ? 'bg-yellow-100' : '';

                  const pengawasExist = item.name != '' ? item.name : 'Belum Ada Pengawas';

                  let link ='';
                  link = `/aduan/kirim-aduan/${item.id}`;

                  const row = `
                  <tr class="${rowClass}">
                      <td class='py-3 px-3 text-sm text-center'>${item.kode}</td>
                      <td class='py-3 px-3 text-sm max-w-[15rem] text-left'>${item.topik}</td>
                      <td class='py-3 px-3 text-sm max-w-[15rem] text-left'>${item.perusahaan}</td>
                      <td class='py-3 px-3 text-sm max-w-xs text-left'>${pengawasExist}</td>
                      <td class='py-3 px-3 text-sm text-center'>
                        <div class="flex flex-row space-x-2">
                          <button class="openDetail bg-button-primaryBtn hover:bg-button-hoverPrimaryBtn rounded-lg shadow-lg text-sm text-white text-center py-2 px-4"
                            data-kode="${item.kode}" data-topik="${item.topik}" data-aduan="${item.aduan}" data-perusahaan="${item.perusahaan}" data-kontak="${item.kontak}" data-kanal="${item.kanal}" data-status="${item.status}" data-keterangan="${item.keterangan}" data-pengawas="${pengawasExist}"
                          >Detail</button>
                          <form action="${link}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="${item.id}">
                            <button type="submit" class="bg-button-acceptBtn hover:bg-button-hoverBtn rounded-lg shadow-lg text-sm text-white text-center py-3 px-4">Kirim</button>
                          </form>
                        </div>
                      </td>
                    </tr>`
                  isi.innerHTML += row;
                });
              })
        .catch(error => console.error('Error:', error));
          }
        });
      });

      document.addEventListener("DOMContentLoaded", function(){
        const modal = document.getElementById('modal');
        const backgroundModal = document.getElementById('background-modal');
        const closeDetail = document.getElementById('closeDetail');

        document.getElementById('aduanSelected').addEventListener('click', function(event){
          if(event.target.classList.contains('openDetail')){
            document.getElementById('modal-kode').value = event.target.getAttribute('data-kode');
            document.getElementById('modal-topik').value = event.target.getAttribute('data-topik');
            document.getElementById('modal-aduan').value = event.target.getAttribute('data-aduan');
            document.getElementById('modal-perusahaan').value = event.target.getAttribute('data-perusahaan');
            document.getElementById('modal-kontak').value = event.target.getAttribute('data-kontak');
            document.getElementById('modal-kanal').value = event.target.getAttribute('data-kanal');
            document.getElementById('modal-status').value = event.target.getAttribute('data-status');
            document.getElementById('modal-keterangan').value = event.target.getAttribute('data-keterangan');
            document.getElementById('modal-pengawas').value = event.target.getAttribute('data-pengawas');

            modal.classList.remove('hidden');
            backgroundModal.classList.remove('hidden');
          }
        });

        // Close Detail
        closeDetail.addEventListener('click', function(){
          modal.classList.add('hidden');
          backgroundModal.classList.add('hidden');
        });
      });

      //search function
      const searchInput = document.getElementById('searchInput');
      const resetSearch = document.getElementById('resetSearch');
      const isi = document.getElementById('aduanSelected');
      searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase();
        const rows = isi.querySelectorAll('tr');
        // console.log(rows);

        rows.forEach(row => {
          const cells = row.querySelectorAll('td');
          let found = false;

          cells.forEach(cell => {
            if (cell.textContent.toLowerCase().includes(searchTerm)) {
              found = true;
            }
          });

          // console.log(found);

          if (found) {
            row.style.display = '';
            // console.log('FOUND');
          } else {
            row.style.display = 'None';
            // console.log('NOT FOUND');
          }
        });
      });
      resetSearch.addEventListener('click', function() {
        searchInput.value = '';
        const rows = isi.querySelectorAll('tr');
        rows.forEach(row => {
          row.style.display = '';
        });
      });

    </script>

</x-layout>