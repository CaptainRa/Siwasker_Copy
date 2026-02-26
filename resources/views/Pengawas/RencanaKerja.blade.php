<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div id="printable-section">
        <div class="only-print">
            <div class="flex items-center mb-4">
                <img src="image/jateng.png" alt="Jateng" class="w-1/6">
                <div class="w-full text-center mr-44">
                    <p>PEMERINTAH PROVINSI JAWA TENGAH</p>
                    <p class="font-bold">DINAS TENAGA KERJA DAN TRANSMIGRASI</p>
                    <p class="text-lg font-bold">SATUAN PENGAWASAN KETENAGAKERJAAN</p>
                    <p class="text-lg font-bold">WILAYAH SEMARANG</p>
                    <p class="">Jl. MT.Haryono Nomor 876 Semarang Telpon 024-672056 Semarang</p>
                    <p class="">Surel : satkerwasnaker@gmail.com</p>
                </div>
            </div>
            <hr class="mt-1 border-[0.5px] border-black">
            <hr class="mt-1 border-2 border-black">
            <div class="my-4 ">
                <p class="font-bold text-center">RENCANA KERJA PENGAWAS KETENAGAKERJAAN</p>
                <div class="flex justify-center gap-2">
                    <div>
                        <p>PROVINSI</p>
                    </div>
                    <div>
                        <p>:</p>
                    </div>
                    <div>
                        <p>JAWA TENGAH</p>
                    </div>
                </div>
            </div>
        </div>
            <div class="mb-4">
            <table class="w-auto text-left text-black border-collapse user-info text-md">
                <tbody>
                    <tr>
                        <td class="pr-4 font-semibold">Nama / NIP</td>
                        <td class="font-normal">: {{ Auth::user()->name ?? '-' }} / {{ Auth::user()->nip ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4 font-semibold">Pangkat / Golongan</td>
                        <td class="font-normal">: {{ Auth::user()->pangkat ?? '-' }} / {{ Auth::user()->golongan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4 font-semibold">Jabatan</td>
                        <td class="font-normal">: {{ Auth::user()->jabatan ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mb-4 space-x-4">
            {{-- Tombol Tambah --}} 
            <a href="/rencana-kerja/tambah-rencana-kerja" class="no-print px-5 py-2.5 text-sm font-medium bg-button-acceptBtn hover:bg-button-hoverBtn text-white inline-flex items-center focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-700">
                <svg class="w-6 h-6 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                </svg> 
                <span class="mr-2 text-lg font-semibold">TAMBAH</span>
            </a>
        
            {{-- Tombol Cetak --}}
            <button type="button" onclick="handlePrint()" class="no-print px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-button-primaryBtn hover:bg-button-hoverPrimaryBtn focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-6 h-6 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
                </svg>
                <span class="mr-2 text-lg font-semibold">CETAK</span>
            </button>
    
        </div>
        <div class="relative overflow-x-auto max-h-[450px] overflow-y-auto">
            <table class="w-full text-left text-black border border-gray-400 work-plan text-md dark:text-gray-400">
                <thead class="work-plan text-black uppercase border text-md bg-background-yellow3Bg border-gray-4 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400">
                    <tr>
                        <th rowspan="2" scope="col" class="px-4 py-3 font-semibold text-center border border-gray-400">No</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 font-semibold text-center border border-gray-400">Jenis Kegiatan</th>
                        <th colspan="2" scope="col" class="px-4 py-3 font-semibold text-center border border-gray-400">Pelaksanaan</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 font-semibold text-center border border-gray-400">Keterangan</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 font-semibold text-center border border-gray-400 no-print">Action</th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-4 py-3 font-semibold text-center border border-gray-400">Nama dan Alamat Perusahaan</th>
                        <th scope="col" class="px-4 py-3 font-semibold text-center border border-gray-400">Tanggal Pelaksanaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rencanaKerja as $rencana)
                    
                    <tr class="bg-white border-b border-gray-400 dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-3 text-center border border-gray-400">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 text-center border border-gray-400">{{ $rencana->jenis_kegiatan }}</td>
                        <td class="px-4 py-3 text-center border border-gray-400">
                            {{ $rencana->perusahaan->nama_perusahaan ?? 'Tidak ada' }}, 
                            {{ $rencana->perusahaan->alamat_perusahaan ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-center border border-gray-400">
                            {{ \Carbon\Carbon::parse($rencana->tanggal_pelaksanaan)->locale('id')->translatedFormat('j F Y') ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-center border border-gray-400">{{ $rencana->keterangan ?? '-' }}</td>
                        <td class="flex justify-center gap-3 px-4 py-3 text-center no-print">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('pengawas.editRencanaKerja', ['id' => $rencana->id]) }}" 
                               class="@if($rencana->status === 'sudah disetujui') pointer-events-none opacity-50 @endif">
                                <svg class="w-6 h-6 text-background-yellow1Bg dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                            </a>
                        
                            {{-- Tombol Hapus --}}
                            <form action="{{ route('pengawas.deleteRencanaKerja', ['id' => $rencana->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @if($rencana->status !== 'sudah disetujui')
                                    <button type="button" class="deleteButton text-background-red1Bg dark:text-white">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                        </svg>
                                    </button>
                                @else
                                    <button type="button" class="opacity-50 cursor-not-allowed" disabled>
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                        </svg>
                                    </button>
                                @endif
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
                
                </tbody>            
            </table>
        </div>
        <div class="my-10 only-print">
            <div class="flex items-end text-center">
                <div class="w-1/2">
                    <p>Mengetahui,</p>
                    <p>Plt. Kepala Satuan</p>
                    <p>Pengawasan Ketenagakerjaan</p>
                    <p>Wilayah Semarang</p>
                    <p>Kepala Bidang</p>
                    <br>
                    <br>
                    <br>
                    <p class="text-lg font-bold underline">MOH. WACHJU ALAMSYAH, S.H</p>
                    <p>Pembina Tingkat I</p>
                    <p>NIP. 19680505 199703 1 007</p>
                </div>
                <div class="w-1/2">
                    <p>Semarang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y')  }}</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>Pelaksana Tugas</p>
                    <br>
                    <br>
                    <br>
                    <p class="text-lg font-bold underline ">ADINDA AQMARINA SABILA, S.Tr.T.</p>
                    <p>Penata Muda</p>
                    <p>NIP. 19970426 202203 2 012</p>
                </div>
            </div>
        </div>
    </div>    
    </div>

    {{-- Modal konfirmasi hapus --}}
    <div id="deleteConfirmationModal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="p-6 bg-white rounded-lg shadow-lg w-96">
            <h2 class="mb-4 text-xl font-semibold">Konfirmasi Hapus</h2>
            <p>Apakah Anda yakin ingin menghapus rencana kerja ini?</p>
            <div class="flex justify-end mt-4 space-x-2">
                <button id="cancelDeleteButton" class="px-4 py-2 text-white bg-gray-400 rounded hover:bg-gray-500">Batal</button>
                <button id="confirmDeleteButton" class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">Ya, Hapus</button>
            </div>
        </div>
    </div>

    {{-- modal notifikasi --}}
    <div id="notificationModal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="p-6 bg-white rounded-lg shadow-lg w-96">
            <h2 id="notificationTitle" class="mb-4 text-xl font-semibold"></h2>
            <p id="notificationMessage"></p>
            <div class="flex justify-end mt-4">
                <button id="closeNotificationButton" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Tutup</button>
            </div>
        </div>
    </div>



    <script>
            // CETAK
            function handlePrint() {
                const printableSection = document.getElementById('printable-section');
                if (!printableSection) {
                    alert('Bagian yang akan dicetak tidak ditemukan!');
                    return;
                }

                const printElements = document.querySelectorAll('.only-print');
                printElements.forEach(el => el.style.display = 'block');

                const originalContent = document.body.innerHTML; 
                const printContent = printableSection.innerHTML; 

                document.body.innerHTML = printContent; 
                window.print(); 
                document.body.innerHTML = originalContent; 
                printElements.forEach(el => el.style.display = 'none');
                window.location.reload(); 
            }

            document.addEventListener("DOMContentLoaded", function () {
                // MODAL KONFIRMASI HAPUS
                const deleteButtons = document.querySelectorAll(".deleteButton");
                const deleteModal = document.getElementById("deleteConfirmationModal");
                const cancelDeleteButton = document.getElementById("cancelDeleteButton");
                const confirmDeleteButton = document.getElementById("confirmDeleteButton");
                let formToSubmit = null;

                deleteButtons.forEach(button => {
                    button.addEventListener("click", function (event) {
                        event.preventDefault();
                        formToSubmit = this.closest("form");
                        deleteModal.classList.remove("hidden");
                    });
                });

                cancelDeleteButton.addEventListener("click", function () {
                    deleteModal.classList.add("hidden");
                });

                confirmDeleteButton.addEventListener("click", function () {
                    if (formToSubmit) {
                        formToSubmit.submit();
                    }
                });

                // MODAL NOTIFIKASI
                const notificationModal = document.getElementById("notificationModal");
                const notificationTitle = document.getElementById("notificationTitle");
                const notificationMessage = document.getElementById("notificationMessage");
                const closeNotificationButton = document.getElementById("closeNotificationButton");

                closeNotificationButton.addEventListener("click", function () {
                    notificationModal.classList.add("hidden");
                });

                
                @if (session('success'))
                    notificationTitle.innerText = "Berhasil!";
                    notificationMessage.innerText = "{{ session('success') }}";
                    notificationModal.classList.remove("hidden");
                @elseif (session('error'))
                    notificationTitle.innerText = "Gagal!";
                    notificationMessage.innerText = "{{ session('error') }}";
                    notificationModal.classList.remove("hidden");
                @endif
            });
    </script>

</x-layout>