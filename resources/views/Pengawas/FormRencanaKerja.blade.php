<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <section class="bg-white border-2 border-background-yellow1Bg rounded-2xl dark:bg-gray-900 w-[90%] md:w-[80%] mx-auto">
        <div class="py-6 px-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center mb-4 sm:mb-0">
                    <svg class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                    </svg>
                    TAMBAH RENCANA KERJA
                </h2>
            </div>
            @if (session('error_duplikasi'))
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    {!! session('error_duplikasi') !!}
                </div>
            @endif
            <form action="{{route('pengawas.submitRencanaKerja')}}" method="POST" class="space-y-4">
                @csrf
                {{-- jenis kegiatan --}}
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="jenis_kegiatan" class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Jenis Kegiatan</label>
                    <div class="w-full sm:w-2/3">
                        <select id="jenis_kegiatan" name="jenis_kegiatan" class="w-full p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" required>
                            <option value="" disabled {{ old('jenis_kegiatan') ? '' : 'selected' }}>Pilih jenis kegiatan</option>
                            <option value="Pemeriksaan" @selected(old('jenis_kegiatan') == 'Pemeriksaan')>Pemeriksaan</option>
                            <option value="Pembinaan" @selected(old('jenis_kegiatan') == 'Pembinaan')>Pembinaan</option>
                            <option value="Pengujian" @selected(old('jenis_kegiatan') == 'Pengujian')>Pengujian</option>
                        </select>
                        @error('jenis_kegiatan')
                            <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                               
                {{-- nama perusahaan --}}
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
                
                {{-- tanggal pelaksanaan --}}
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="tanggal_pelaksanaan" class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Tanggal Pelaksanaan</label>
                    <div class="w-full sm:w-2/3">
                        <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" value="{{ old('tanggal_pelaksanaan') }}" class="w-full p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" required>
                        @error('tanggal_pelaksanaan')
                            <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                
                {{-- keterangan --}}
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="keterangan" class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="4" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" placeholder="Tambahkan keterangan"></textarea>
                </div>                
    
                <div class="mt-6 flex flex-col sm:flex-row justify-end space-x-0 sm:space-x-2">
                    {{-- Button tambah perusahaan --}}
                    <button id="openModalButton" class="px-3 py-3 text-white bg-button-acceptBtn hover:bg-button-hoverBtn focus:ring-4 focus:ring-green-300 rounded-lg shadow-lg flex gap-2 items-center justify-start transition duration-300 w-full sm:w-auto">
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7 7V5" />
                        </svg>
                        <span class="font-semibold text-lg">Tambah Perusahaan</span>
                    </button>

                    {{-- Button batal --}}
                    <button type="button" onclick="window.location.href='{{ route('pengawas.rencanaKerja') }}'" class="px-6 py-3 bg-button-declineBtn text-white rounded-lg hover:bg-button-hoverDeclineBtn focus:ring-4 focus:ring-red-300 shadow-lg flex items-center justify-center gap-3 transition duration-300">
                        <svg class="w-7 h-7 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 9 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>                  
                        <span class="font-semibold text-lg">BATAL</span>
                    </button>
                    
                    {{-- Button simpan --}}
                    <button id="simpanButton" type="button" class="px-6 py-3 text-white bg-button-primaryBtn hover:bg-button-hoverPrimaryBtn rounded-lg shadow focus:ring-4 focus:ring-blue-300 flex items-center mt-4 sm:mt-0 w-full sm:w-auto">
                        <svg class="w-7 h-7 text-white dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z"/>
                        </svg>
                        <span class="font-semibold text-lg">SIMPAN</span>
                    </button>
                </div>
            </form>
        </div>

    </section>

    {{-- Modal tambah perusahaan --}}
    <div id="modalBackground" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden"></div>
    <div id="modal" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg w-full max-w-[90%] sm:w-[500px] p-6 sm:p-8 shadow-lg hidden">
        <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4 sm:mb-6">Tambah Perusahaan</h3>
        <form id="companyForm" action="{{ route('perusahaan.tambahPerusahaan') }}" method="POST" class="space-y-4">
            @csrf

            <div class="flex flex-col sm:flex-row sm:items-center">
                <label for="nama_perusahaan" class="w-full sm:w-1/3 text-base sm:text-lg font-medium text-gray-900">Nama Perusahaan</label>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 text-sm" required>
            </div>
            
            <div class="flex flex-col sm:flex-row sm:items-center">
                <label for="alamat_perusahaan" class="w-full sm:w-1/3 text-base sm:text-lg font-medium text-gray-900">Alamat Perusahaan</label>
                <input type="text" id="alamat_perusahaan" name="alamat_perusahaan" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg text-gray-900" required>
            </div>
            
            <div class="flex flex-col sm:flex-row sm:items-center">
                <label for="kategori_perusahaan" class="w-full sm:w-1/3 text-base sm:text-lg font-medium text-gray-900">Jenis Usaha</label>
                <input type="text" id="kategori_perusahaan" name="kategori_perusahaan" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg text-gray-900" required>
            </div>
            
            <div class="mt-4 sm:mt-6 flex flex-col sm:flex-row sm:justify-end items-center space-y-2 sm:space-y-0 sm:space-x-2">
                <button type="submit" class="w-full sm:w-auto px-6 py-3 text-white bg-button-acceptBtn hover:bg-button-hoverBtn rounded-lg shadow focus:ring-4 focus:ring-green-300">Simpan</button>
                <button type="button" id="closeModalButton" class="w-full sm:w-auto px-6 py-3 text-white bg-button-declineBtn hover:bg-button-hoverDeclineBtn rounded-lg shadow focus:ring-4 focus:ring-red-300">Batal</button>
            </div>
        </form>
    </div>

    {{-- Modal Success --}}
    <div id="successModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg w-[80%] sm:w-[400px] text-center">
            <h3 id="successMessage" class="text-xl font-semibold text-gray-900 mb-4"></h3>
            <button id="closeSuccessModal" class="px-6 py-3 text-white bg-background-Green2Bg hover:bg-background-primaryBg rounded-lg">Tutup</button>
        </div>
    </div>

    {{-- Modal konfirmasi simpan rencana kerja --}}
    <div id="confirmationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold mb-4">Konfirmasi</h2>
            <p>Apakah Anda yakin ingin menyimpan rencana kerja ini?</p>
            <div class="mt-4 flex justify-end space-x-2">
                <button id="cancelButton" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</button>
                <button id="confirmButton" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Ya, Simpan</button>
            </div>
        </div>
    </div>

    <script>
        // Cari perusahaan
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

        // modal tambah perusahaan
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("modal");
            const modalBackground = document.getElementById("modalBackground");
            const openModalButton = document.getElementById("openModalButton");
            const closeModalButton = document.getElementById("closeModalButton");
            const companyForm = document.getElementById("companyForm");
            const alertDiv = document.createElement("div"); // Alert Error di dalam Modal

            // Tambahkan Alert ke dalam form
            alertDiv.className = "p-2 mb-2 text-sm text-red-800 bg-red-100 rounded-lg hidden";
            companyForm.insertBefore(alertDiv, companyForm.firstChild);

            // Fungsi untuk membuka modal
            openModalButton.addEventListener("click", function () {
                modal.classList.remove("hidden");
                modalBackground.classList.remove("hidden");
            });

            // Fungsi untuk menutup modal
            closeModalButton.addEventListener("click", function () {
                modal.classList.add("hidden");
                modalBackground.classList.add("hidden");
                resetForm(); 
            });

            // Fungsi Submit Form dengan Validasi Duplikasi
            companyForm.addEventListener("submit", function (event) {
                event.preventDefault();

                const formData = new FormData(companyForm);

                fetch("{{ route('perusahaan.check') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        alertDiv.textContent = "Nama perusahaan atau alamat perusahaan sudah terdaftar!";
                        alertDiv.classList.remove("hidden"); 
                    } else {
                        alertDiv.classList.add("hidden"); 

                        // Kirim Form untuk Menambahkan Perusahaan
                        fetch("{{ route('perusahaan.tambahPerusahaan') }}", {
                            method: "POST",
                            body: formData,
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Tutup Modal Tambah Perusahaan & Reset Form
                                modal.classList.add("hidden");
                                modalBackground.classList.add("hidden");
                                resetForm();

                                // Tampilkan Modal Sukses
                                document.getElementById("successMessage").innerText = data.success;
                                document.getElementById("successModal").classList.remove("hidden");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                    }
                })
                .catch(error => console.error("Error:", error));
            });

            // Modal Sukses Tambah Perusahaan
            const successModal = document.getElementById("successModal");
            const closeSuccessModalButton = document.getElementById("closeSuccessModal");

            if (successModal && closeSuccessModalButton) {
                closeSuccessModalButton.addEventListener("click", function () {
                    successModal.classList.add("hidden");
                });
            }

            // Fungsi untuk reset form
            function resetForm() {
                companyForm.reset();
                alertDiv.classList.add("hidden");
            }
        });

        // Menampilkan modal konfirmasi simpan rencana kerja
        document.addEventListener("DOMContentLoaded", function () {
            const simpanButton = document.getElementById("simpanButton");
            const modal = document.getElementById("confirmationModal");
            const cancelButton = document.getElementById("cancelButton");
            const confirmButton = document.getElementById("confirmButton");
            const form = document.querySelector("form");

            simpanButton.addEventListener("click", function (event) {
                event.preventDefault(); 
                modal.classList.remove("hidden"); 
            });

            cancelButton.addEventListener("click", function () {
                modal.classList.add("hidden"); 
            });

            confirmButton.addEventListener("click", function () {
                form.submit(); 
            });
        });

    </script>

</x-layout>