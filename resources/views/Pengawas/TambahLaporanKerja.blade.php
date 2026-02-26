<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="flex flex-row mt-5 max-w-7xl mx-auto justify-center">
        <section class="bg-yellow-50 border-2 border-background-yellow1Bg rounded-2xl dark:bg-gray-900 w-full max-w-7xl mx-auto max-h-[80vh] overflow-y-auto p-4">
            <div class="py-4 px-4 sm:px-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center mb-4 sm:mb-0">
                        <svg class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                        </svg>
                        TAMBAH LAPORAN KERJA
                    </h2>
                </div>

                <!-- Form -->
                <form id="FormLaporanKerja" action="{{ route ('pengawas.submitLaporanKerja') }}" method="POST" class="space-y-6 mt-6">
                    @csrf
                    <div class="space-y-6">
                        <!-- Nomor SPT -->
                        <div class="flex flex-wrap items-center md:space-y-0">
                            <label for="nomor_spt" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Nomor SPT</label>
                            
                            <div class="w-full md:w-2/5">
                                <input type="text" id="nomor_spt" name="nomor_spt" value="{{ old('nomor_spt') }}" class="w-full p-3 border-2 border-background-yellow1Bg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg rounded-lg" placeholder="Masukkan Nomor SPT" required>
                                @error('nomor_spt')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/4">
                                <input type="date" id="tanggal_spt" name="tanggal_spt" value="{{ old('tanggal_spt') }}" class="w-full ml-4 p-3 border-2 border-background-yellow1Bg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg rounded-lg" required>
                                @error('tanggal_spt')
                                    <p class="text-red-500 text-sm mt-1 ml-4">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Anggaran -->
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="jenis_anggaran" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Jenis Anggaran</label>
                            
                            <div class="w-full md:w-2/3">
                                <select id="jenis_anggaran" name="jenis_anggaran" class="w-full p-3 border-2 border-background-yellow1Bg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg rounded-lg" required>
                                    <option value="" disabled selected>Pilih Anggaran</option>
                                    <option value="Rencana Kerja (Non Anggaran)" @selected(old('jenis_anggaran') == 'Rencana Kerja (Non Anggaran)')>Non Anggaran</option>
                                    <option value="Rencana Kerja (APBD)" @selected(old('jenis_anggaran') == 'Rencana Kerja (APBD)')>APBD</option>
                                    <option value="Rencana Kerja (APBN)" @selected(old('jenis_anggaran') == 'Rencana Kerja (APBN)')>APBN</option>
                                </select>
                                @error('jenis_anggaran')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Nama Perusahaan -->
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <label for="nama_perusahaan" class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Nama Perusahaan</label>
                            
                            <div class="w-full sm:w-2/3">
                                <select id="nama_perusahaan" name="nama_perusahaan" class="p-3 border-2 border-background-yellow1Bg rounded-lg" required>
                                    <!-- Data akan dimuat dinamis -->
                                </select> 
                                @error('nama_perusahaan')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Jenis Usaha dan Jumlah TK -->
                        {{-- <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="jenis_usaha" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Jenis Usaha</label>
                            <input type="text" id="jenis_usaha" name="jenis_usaha" class="w-full md:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" placeholder="Masukkan Jenis Usaha" required>
                        </div> --}}
                    
                        <!-- Jumlah TK -->
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="tk" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Jumlah TK</label>
                            
                            <div class="w-full md:w-2/3">
                                <input type="number" id="tk" name="tk" min="1" value="{{ old('tk') }}" class="w-full p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" placeholder="Masukkan Jumlah TK" required>
                                @error('tk')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                                <p id="tk-error" class="text-red-500 text-sm mt-1 hidden">Jumlah TK tidak boleh kurang dari 1!</p>
                            </div>
                        </div>
                    
                         <!-- Jenis Pelanggaran (Dapat Ditambah) -->
                         <div id="form-container">
                            <div class="pelanggaran-row flex flex-col sm:flex-row sm:items-start space-y-2">
                                <label class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Jenis Pelanggaran</label>
                                
                                <!-- Dropdown -->
                                <div class="w-full md:w-2/5 mr-4">
                                    <select name="jenis_pelanggaran[]" class="jenis-pelanggaran w-full p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" onchange="toggleInput(this)">
                                        <option value="" disabled selected>Pilih Jenis Pelanggaran</option>
                                        <option value="wlkp" {{ old('jenis_pelanggaran.0') == 'wlkp' ? 'selected' : '' }}>WLKP</option>
                                        <option value="wkwi" {{ old('jenis_pelanggaran.0') == 'wkwi' ? 'selected' : '' }}>WKWI</option>
                                        <option value="tka" {{ old('jenis_pelanggaran.0') == 'tka' ? 'selected' : '' }}>TKA</option>
                                        <option value="kompensasi" {{ old('jenis_pelanggaran.0') == 'kompensasi' ? 'selected' : '' }}>Kompensasi</option>
                                        <option value="tki" {{ old('jenis_pelanggaran.0') == 'tki' ? 'selected' : '' }}>TKI</option>
                                        <option value="ump" {{ old('jenis_pelanggaran.0') == 'ump' ? 'selected' : '' }}>UMP</option>
                                        <option value="lembur" {{ old('jenis_pelanggaran.0') == 'lembur' ? 'selected' : '' }}>Lembur</option>
                                        <option value="thr" {{ old('jenis_pelanggaran.0') == 'thr' ? 'selected' : '' }}>THR</option>
                                        <option value="cutith" {{ old('jenis_pelanggaran.0') == 'cutith' ? 'selected' : '' }}>Cuti TH</option>
                                        <option value="cutihamil" {{ old('jenis_pelanggaran.0') == 'cutihamil' ? 'selected' : '' }}>Cuti Hamil</option>
                                        <option value="pkb" {{ old('jenis_pelanggaran.0') == 'pkb' ? 'selected' : '' }}>PKB</option>
                                        <option value="susu" {{ old('jenis_pelanggaran.0') == 'susu' ? 'selected' : '' }}>SUSU</option>
                                        <option value="jamsos" {{ old('jenis_pelanggaran.0') == 'jamsos' ? 'selected' : '' }}>JAMSOS</option>
                                        <option value="k3" {{ old('jenis_pelanggaran.0') == 'k3' ? 'selected' : '' }}>K3</option>
                                        <option value="lainnya" {{ old('jenis_pelanggaran.0') == 'lainnya' ? 'selected' : '' }}>Lain-lain</option>
                                    </select>
                                    @error('jenis_pelanggaran')
                                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="w-full md:w-1/4">
                                    <input type="number" name="jumlah_pelanggaran[]" 
                                        value="{{ old('jumlah_pelanggaran.0') }}" 
                                        class="jumlah-pelanggaran w-full p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" 
                                        min="1" placeholder="Masukkan Jumlah Pelanggaran" 
                                        required
                                        style="{{ old('jenis_pelanggaran.0') == 'lainnya' ? 'display:none;' : 'display:block;' }}">
                                    
                                    @if ($errors->has('jumlah_pelanggaran.0') && old('jenis_pelanggaran.0') != 'lainnya')
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('jumlah_pelanggaran.0') }}</p>
                                    @endif
                                    <p class="jumlah-error text-red-500 text-sm mt-1 hidden">Jumlah pelanggaran tidak boleh kurang dari 1!</p>
                                
                                    <input type="text" name="keterangan_pelanggaran[]" 
                                        value="{{ old('keterangan_pelanggaran.0') }}" 
                                        class="keterangan-pelanggaran w-full p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" 
                                        placeholder="Masukkan keterangan" 
                                        style="{{ old('jenis_pelanggaran.0') == 'lainnya' ? 'display:block;' : 'display:none;' }}">
                                
                                    @if ($errors->has('keterangan_pelanggaran.0') && old('jenis_pelanggaran.0') == 'lainnya')
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('keterangan_pelanggaran.0') }}</p>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button type="button" id="add-row-button" class="flex items-center px-3 py-2 bg-button-primaryBtn hover:bg-button-hoverPrimaryBtn  text-center dark:bg-blue-600 dark:hover:bg-blue-700 text-white rounded">
                                <svg class="w-6 h-6 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                                Tambah Pelanggaran
                            </button>
                        </div>

                        <!-- NP I -->
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="no_np_I" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Nomor NP I</label>
                            <input type="text" id="no_np_I" name="no_np_I" class="w-full mr-3 md:w-2/5 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" placeholder="Masukkan Nomor NP I" required>
                            <input type="date" id="tanggal_np_I" name="tanggal_np_I" class="w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" required>
                        </div>
                        
                        <!-- NP II -->
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="no_np_II" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Nomor NP II</label>
                            <input type="text" id="no_np_II" name="no_np_II" class="w-full mr-3 md:w-2/5 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" placeholder="Masukkan Nomor NP II">
                            <input type="date" id="tanggal_np_II" name="tanggal_np_II" class="w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" required>
                        </div>
                        
                        <!-- TMP2T -->
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="no_tmp2t" class="w-full md:w-1/3 text-lg font-medium text-gray-900">TMP2T</label>
                            <input type="text" id="no_tmp2t" name="no_tmp2t" class="w-full mr-3 md:w-2/5 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" placeholder="Masukkan Nomor TMP2T">
                            <input type="date" id="tanggal_tmp2t" name="tanggal_tmp2t" class="w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" required>
                        </div>

                        <!-- LHPP -->
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="lhpp" class="w-full md:w-1/3 text-lg font-medium text-gray-900">LHPP</label>
                            <div class="w-full md:w-2/3">
                                <input type="text" id="lhpp" name="lhpp" class="w-full mr-3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" placeholder="Masukkan LHPP">
                            </div>
                        </div>
                        

                        <!-- Keterangan -->
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="keterangan" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Keterangan</label>
                            <div class="w-full md:w-2/3">
                                <select id="keterangan" name="keterangan" class="w-full p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" required>
                                    <option value="" disabled selected>Pilih Keterangan</option>
                                    <option value="On Progress" @selected(old('keterangan') == 'On Progress')>On Progress</option>
                                    <option value="Selesai" @selected(old('keterangan') == 'Selesai')>Selesai</option>
                                </select>
                                @error('keterangan')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </section>

        <div class="flex flex-col space-y-4 ml-4">
            <!-- Tombol Simpan -->
            <button type="button" id="bukaModal" class="px-6 py-3 bg-button-acceptBtn hover:bg-button-hoverBtn focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-700 shadow-lg flex items-center justify-center gap-3 transition duration-300">
                <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z" />
                </svg>
                <span class="text-white font-semibold text-lg">SIMPAN</span>
            </button>
                    
            <!-- Button Batal -->
            <button type="button" onclick="window.location.href='{{ route('pengawas.laporanKerja') }}'" class="px-6 py-3 bg-button-declineBtn text-white rounded-lg hover:bg-button-hoverDeclineBtn focus:ring-4 focus:ring-red-300 shadow-lg flex items-center justify-center gap-3 transition duration-300">
                <svg class="w-7 h-7 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 9 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>                  
                <span class="font-semibold text-lg">BATAL</span>
            </button>
            
        </div>
    </div>

<!-- Modal Konfirmasi -->
<div id="konfirmasiModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
        <p>Apakah Anda yakin ingin menyimpan laporan kerja ini?</p>
        <div class="mt-4 flex justify-end">
            <button id="batalModal" class="px-4 py-2 bg-gray-300 rounded mr-2">Batal</button>
            <button id="konfirmasiSimpan" class="px-4 py-2 bg-blue-600 text-white rounded">Ya, Simpan</button>
        </div>
    </div>
</div>


    <script>
document.getElementById("add-row-button").addEventListener("click", function () {
    const container = document.getElementById("form-container");

    // Buat elemen baru
    const newRow = document.createElement("div");
    newRow.className = "pelanggaran-row flex flex-col sm:flex-row sm:items-center mt-4"; 

    // Label
    const newLabel = document.createElement("label");
    newLabel.className = "w-full sm:w-1/3 text-lg font-medium text-gray-900";
    newLabel.textContent = "Jenis Pelanggaran";

    // Dropdown jenis pelanggaran
    const newSelect = document.createElement("select");
    newSelect.name = "jenis_pelanggaran[]";
    newSelect.required = true;
    newSelect.className = "jenis-pelanggaran  md:w-2/5 mr-5 ml-3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400";
    newSelect.innerHTML = document.querySelector(".jenis-pelanggaran").innerHTML;
    newSelect.setAttribute("onchange", "toggleInput(this)");

    // Input jumlah pelanggaran
    const newInput = document.createElement("input");
    newInput.type = "number";
    newInput.name = "jumlah_pelanggaran[]";
    newInput.min = "1";
    newInput.required = true;
    newInput.placeholder = "Masukkan Jumlah Pelanggaran";
    newInput.className = "jumlah-pelanggaran w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400";

    // Input keterangan pelanggaran (disembunyikan)
    const newText = document.createElement("input");
    newText.type = "text";
    newText.name = "keterangan_pelanggaran[]";
    newText.placeholder = "Masukkan keterangan";
    newText.className = "keterangan-pelanggaran w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400";
    newText.style.display = "none";

    // Tombol hapus
    const deleteButton = document.createElement("button");
    deleteButton.type = "button";
    deleteButton.className = "remove-row "; // Tambah margin kiri agar tidak terlalu dekat
    deleteButton.innerHTML = `
        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/>
        </svg>
    `;
    deleteButton.addEventListener("click", function () {
        newRow.remove();
    });

    // Tambahkan elemen ke row
    newRow.appendChild(newLabel);
    newRow.appendChild(newSelect);
    newRow.appendChild(newInput);
    newRow.appendChild(newText);
    newRow.appendChild(deleteButton);
    container.appendChild(newRow);
});

// Fungsi untuk menampilkan input keterangan jika "Lain-lain" dipilih
function toggleInput(selectElement) {
    var jumlahInput = selectElement.closest('.pelanggaran-row').querySelector('.jumlah-pelanggaran');
    var keteranganInput = selectElement.closest('.pelanggaran-row').querySelector('.keterangan-pelanggaran');

    if (selectElement.value === "lainnya") {
        jumlahInput.style.display = 'none';
        jumlahInput.value = ''; // Kosongkan agar tidak dikirim
        keteranganInput.style.display = 'block';
    } else {
        jumlahInput.style.display = 'block';
        keteranganInput.style.display = 'none';
        keteranganInput.value = ''; // Kosongkan agar tidak dikirim
    }
}



// Fungsi hapus baris
function removeRow(button) {
    button.closest(".pelanggaran-row").remove();
}


        // cari perusahaan
        $(document).ready(function() {
        $('#nama_perusahaan').select2({
            placeholder: "Pilih atau cari perusahaan...",
            allowClear: true,
            width: 'resolve',
            ajax: {
                url: '/perusahaan',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return { search: params.term };
                },
                processResults: function(data) {
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.text,
                            alamat: item.alamat 
                        }))
                    };
                }
            },
            templateResult: function(data) {
                if (!data.id) {
                    return data.text; 
                }
                
                var $container = $(`
                    <div>
                        <strong>${data.text}</strong><br>
                        <small style="color: gray;">${data.alamat || 'Alamat tidak tersedia'}</small>
                    </div>
                `);
                
                return $container;
            },
            templateSelection: function(data) {
                return data.text; 
            }
        });
    });


    // submit form
    document.getElementById('bukaModal').addEventListener('click', function() {
        document.getElementById('konfirmasiModal').classList.remove('hidden');
    });

    document.getElementById('batalModal').addEventListener('click', function() {
        document.getElementById('konfirmasiModal').classList.add('hidden');
    });

    document.getElementById('konfirmasiSimpan').addEventListener('click', function() {
        document.getElementById('FormLaporanKerja').submit();
    });

    </script>
    
</x-layout>
