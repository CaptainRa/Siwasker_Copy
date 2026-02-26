<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="flex flex-row mt-5 max-w-7xl mx-auto justify-center">
        <section class="bg-yellow-50 border-2 border-background-yellow1Bg rounded-2xl dark:bg-gray-900 w-full max-w-7xl mx-auto max-h-[80vh] overflow-y-auto p-4">
            <div class="py-4 px-4 sm:px-6">

                <form id="FormLaporanKerja" action="{{ route('pengawas.updateLaporanKerja', ['id' => $laporan->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-5">
                        {{-- nomor dan tanggal spt --}}
                        <div class="flex flex-wrap items-center md:space-y-0">
                            <label for="nomor_spt" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Nomor SPT</label>
                            <input type="text" id="nomor_spt" name="nomor_spt" class="w-full mr-4 md:w-2/5 p-3 border-2 border-background-yellow1Bg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg  rounded-lg"  value="{{ $laporan->nomor_spt }}" required>
                            <input type="date" id="tanggal_spt" name="tanggal_spt" class="w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg  focus:border-background-yellow1Bg focus:ring-background-yellow1Bg rounded-lg" value="{{ $laporan->tanggal_spt }}" required>
                        </div>
                    
                        {{-- jenis anggaran --}}
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="jenis_anggaran" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Jenis Anggaran</label>
                            <select id="jenis_anggaran" name="jenis_anggaran" class="w-full md:w-2/3 p-3 border-2 border-background-yellow1Bg  focus:border-background-yellow1Bg focus:ring-background-yellow1Bg rounded-lg" required>
                                <option value="" disabled selected>Pilih Anggaran</option>
                                <option value="Rencana Kerja (Non Anggaran)" {{ $laporan->jenis_anggaran == 'Rencana Kerja (Non Anggaran)' ? 'selected' : '' }}>Non Anggaran</option>
                                <option value="Rencana Kerja (APBD)" {{ $laporan->jenis_anggaran == 'Rencana Kerja (APBD)' ? 'selected' : '' }}>APBD</option>
                                <option value="Rencana Kerja (APBN)" {{ $laporan->jenis_anggaran == 'Rencana Kerja (APBN)' ? 'selected' : '' }}>APBN</option>
                            </select>
                        </div>

                        {{-- nama perusahaan --}}
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <label for="nama_perusahaan" class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Nama Perusahaan</label>
                            <select id="nama_perusahaan" name="nama_perusahaan" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" required>
                                <option value="" disabled>Pilih perusahaan</option>
                                @foreach($perusahaans as $perusahaan)
                                    <option value="{{ $perusahaan->id }}" {{ $laporan->nama_perusahaan == $perusahaan->nama_perusahaan ? 'selected' : '' }}>
                                        {{ $perusahaan->nama_perusahaan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jumlah Tenaga Kerja --}}
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="tk" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Jumlah TK</label>
                            
                            <div class="w-full md:w-2/3">
                                <input type="number" id="tk" name="tk" min="1" value="{{ $laporan->tk }}" class="w-full p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" placeholder="Masukkan Jumlah TK" required>
                            </div>
                        </div>
                        
                        {{-- Jenis pelanggaran --}}
                        <div id="form-container">
                            @foreach($pelanggaranTampil as $pelanggaran)
                            <div class="pelanggaran-row flex flex-col sm:flex-row sm:items-center mt-4">
                                <label class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Jenis Pelanggaran</label>
                                <select name="jenis_pelanggaran[]" class="jenis-pelanggaran md:w-2/5 mr-5 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400 required" onchange="toggleInput(this)">
                                    <option value="" disabled>Pilih Jenis Pelanggaran</option>
                                    @foreach($jenisPelanggaran as $key => $value)
                                        <option value="{{ $key }}" {{ ($pelanggaran['key'] ?? '') == ($key ?? '') ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                        
                                <input type="number" name="jumlah_pelanggaran[]" 
                                class="jumlah-pelanggaran w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" 
                                min="1" placeholder="Masukkan Jumlah Pelanggaran" 
                                value="{{ $pelanggaran['jumlah'] }}" 
                                style="{{ $pelanggaran['key'] == 'lainnya' ? 'display:none;' : '' }}" 
                                {{ $pelanggaran['key'] == 'lainnya' ? '' : 'required' }}>
                                
                                <input type="text" name="keterangan_pelanggaran[]" 
                                class="keterangan-pelanggaran w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" 
                                placeholder="Masukkan keterangan" 
                                value="{{ $pelanggaran['keterangan'] }}" 
                                style="{{ $pelanggaran['key'] != 'lainnya' ? 'display:none;' : '' }}">
                            </div>
                            @endforeach
                        </div>
                        <div class="flex items-center space-x-2">
                            <button type="button" id="add-row-button" class="flex items-center px-3 py-2 bg-button-primaryBtn hover:bg-button-hoverPrimaryBtn  text-center dark:bg-blue-600 dark:hover:bg-blue-700 text-white rounded">
                                <svg class="w-6 h-6 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                                Tambah Pelanggaran
                            </button>
                        </div>

                        {{-- NP I --}}
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="no_np_I" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Nomor NP I</label>
                            <input type="text" id="no_np_I" name="no_np_I" class="w-full mr-4 md:w-2/5 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" value="{{ $laporan->no_np_I }}">
                            <input type="date" id="tanggal_np_I" name="tanggal_np_I" class="w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" value="{{ $laporan->tanggal_np_I }}">
                        </div>
                        
                        {{-- NP II --}}
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="no_np_II" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Nomor NP II</label>
                            <input type="text" id="no_np_II" name="no_np_II" class="w-full mr-4 md:w-2/5 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" value="{{ $laporan->no_np_II }}">
                            <input type="date" id="tanggal_np_II" name="tanggal_np_II" class="w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" value="{{ $laporan->tanggal_np_II }}">
                        </div>
                        
                        {{-- TMP2T --}}
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="no_tmp2t" class="w-full md:w-1/3 text-lg font-medium text-gray-900">TMP2T</label>
                            <input type="text" id="no_tmp2t" name="no_tmp2t" class="w-full mr-4 md:w-2/5 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" value="{{ $laporan->no_tmp2t }}">
                            <input type="date" id="tanggal_tmp2t" name="tanggal_tmp2t" class="w-full md:w-1/4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" value="{{ $laporan->tanggal_tmp2t }}">
                        </div>

                        {{-- LHPP --}}
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="lhpp" class="w-full md:w-1/3 text-lg font-medium text-gray-900">LHPP</label>
                            <div class="w-full md:w-2/3">
                                <input type="text" id="lhpp" name="lhpp" class="w-full mr-4 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" value="{{ $laporan->lhpp }}">
                            </div>
                        </div>
                        
                        {{-- Keterangan --}}
                        <div class="flex flex-wrap items-center space-y-2 md:space-y-0">
                            <label for="keterangan" class="w-full md:w-1/3 text-lg font-medium text-gray-900">Keterangan</label>
                            <select id="keterangan" name="keterangan" class="w-full md:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" required>
                                <option value="On Progress" {{ $laporan->keterangan == 'On Progress' ? 'selected' : '' }}>On Progress</option>
                                <option value="Selesai" {{ $laporan->keterangan == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <div class="flex flex-row space-x-4 justify-end">
                            {{-- Button Batal --}}
                            <button type="button" onclick="window.location.href='{{ route('pengawas.laporanKerja') }}'" class="px-6 py-3 bg-button-declineBtn text-white rounded-lg hover:bg-button-hoverDeclineBtn focus:ring-4 focus:ring-red-300 shadow-lg flex items-center justify-center gap-3 transition duration-300">
                                <svg class="w-7 h-7 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 9 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>                  
                                <span class="font-semibold text-lg">BATAL</span>
                            </button>

                            {{-- Button Simpan --}}
                            <button type="submit" id="submit-button" class="px-6 py-3 bg-button-acceptBtn hover:bg-button-hoverBtn focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-700 shadow-lg flex items-center justify-center gap-3 transition duration-300">
                                <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z" />
                                </svg>
                                <span class="text-white font-semibold text-lg">SIMPAN</span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </section>
    </div>

    {{-- Modal Konfirmasi --}}
    <div id="confirmation-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-lg font-semibold text-gray-800">Konfirmasi</h2>
            <p class="text-gray-600 mt-2">Apakah Anda yakin ingin menyimpan perubahan?</p>
            <div class="mt-4 flex justify-end gap-2">
                <button id="cancel-button" class="px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500 transition">
                    Batal
                </button>
                <button id="confirm-button" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                    Simpan
                </button>
            </div>
        </div>
    </div>


    <script>
        // Fungsi untuk memperbarui opsi di semua dropdown
        function updateDropdownOptions() {
            // Ambil semua dropdown pelanggaran
            const selects = document.querySelectorAll(".jenis-pelanggaran");
            
            // Kumpulkan semua nilai yang telah dipilih
            let selectedValues = new Set();
            selects.forEach(select => {
                if (select.value) {
                    selectedValues.add(select.value);
                }
            });

            // Perbarui opsi di setiap dropdown
            selects.forEach(select => {
                const options = select.querySelectorAll("option");
                options.forEach(option => {
                    if (option.value !== "" && selectedValues.has(option.value) && option.value !== select.value) {
                        option.hidden = true; // Sembunyikan opsi yang sudah dipilih di dropdown lain
                    } else {
                        option.hidden = false; // Tampilkan kembali opsi yang tidak dipilih
                    }
                });
            });
        }

        // Tambahkan event listener ke semua dropdown saat berubah
        document.addEventListener("change", function(event) {
            if (event.target.classList.contains("jenis-pelanggaran")) {
                updateDropdownOptions();
            }
        });

        // Tambahkan event listener ke tombol tambah row
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
            newSelect.className = "jenis-pelanggaran md:w-2/5 mr-5 ml-3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400";
            newSelect.setAttribute("onchange", "toggleInput(this)");

            // Tambahkan opsi default "Pilih Jenis Pelanggaran"
            newSelect.innerHTML = `<option value="" disabled selected>Pilih Jenis Pelanggaran</option>`;
            
            // Ambil semua opsi dari dropdown pertama dan tambahkan ke dropdown baru
            const firstSelect = document.querySelector(".jenis-pelanggaran");
            if (firstSelect) {
                firstSelect.querySelectorAll("option:not(:first-child)").forEach(option => {
                    newSelect.innerHTML += `<option value="${option.value}">${option.textContent}</option>`;
                });
            }

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
            deleteButton.className = "remove-row";
            deleteButton.innerHTML = `
                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/>
                </svg>
            `;
            deleteButton.addEventListener("click", function () {
                newRow.remove();
                updateDropdownOptions();
            });

            // Tambahkan elemen ke row
            newRow.appendChild(newLabel);
            newRow.appendChild(newSelect);
            newRow.appendChild(newInput);
            newRow.appendChild(newText);
            newRow.appendChild(deleteButton);
            container.appendChild(newRow);

            // Perbarui opsi dropdown setelah menambahkan baris baru
            setTimeout(updateDropdownOptions, 100);
        });


        // Fungsi untuk menampilkan input keterangan jika "Lain-lain" dipilih
        function toggleInput(selectElement) {
            const row = selectElement.closest(".pelanggaran-row");
            const jumlahInput = row.querySelector(".jumlah-pelanggaran");
            const keteranganInput = row.querySelector(".keterangan-pelanggaran");

            if (selectElement.value === "lainnya") {
                jumlahInput.style.display = "none";
                jumlahInput.removeAttribute("required");

                keteranganInput.style.display = "block";
                keteranganInput.setAttribute("required", "true");
            } else {
                jumlahInput.style.display = "block";
                jumlahInput.setAttribute("required", "true");

                keteranganInput.style.display = "none";
                keteranganInput.removeAttribute("required");
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

        // Menampilkan modal 
        document.addEventListener("DOMContentLoaded", function () {
            const submitButton = document.getElementById("submit-button");
            const modal = document.getElementById("confirmation-modal");
            const cancelButton = document.getElementById("cancel-button");
            const confirmButton = document.getElementById("confirm-button");
            const form = document.getElementById("FormLaporanKerja");

            // Ketika tombol SIMPAN diklik, tampilkan modal
            submitButton.addEventListener("click", function (event) {
                event.preventDefault(); 
                modal.classList.remove("hidden");
            });

            // Jika tombol Batal diklik, sembunyikan modal
            cancelButton.addEventListener("click", function () {
                modal.classList.add("hidden");
            });

            // Jika tombol Simpan diklik, submit form
            confirmButton.addEventListener("click", function () {
                form.submit();
            });
        });
    </script>
</x-layout>