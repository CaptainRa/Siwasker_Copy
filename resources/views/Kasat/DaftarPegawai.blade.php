@php use Illuminate\Support\Str; @endphp
<x-layout>
    @include('components.toast')
   
    <x-slot:title>{{$title}}</x-slot:title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Tombol Tambah --}}
    <div class="flex justify-end mb-4 px-8">
        <button id="btnTambahPengawas" class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-button-acceptBtn hover:bg-button-hoverBtn rounded-lg text-center dark:bg-green-500 dark:hover:bg-green-600">
            <svg class="w-6 h-6 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
            </svg>
            <span class="font-semibold text-lg mr-2">TAMBAH</span>
        </button>
    </div>

    {{-- Tabel Data Pengawas --}}
    <div class="bg-white shadow-md border-2 border-background-yellow2Bg rounded-lg overflow-hidden ml-8 mr-8">
        <div class="w-full p-4 bg-white rounded-lg">
            <div class="overflow-x-auto border-b border-background-yellow2Bg rounded-lg max-h-[600px]">
                <table class="table-auto min-w-max w-full border-collapse">
                    <thead>
                        <tr class="bg-background-yellow2Bg text-black text-center rounded-full">
                            <th class="py-3 px-4 rounded-l-full">No</th>
                            <th class="py-3 px-4">NIP</th>
                            <th class="py-3 px-4">Nama</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Jenis Kelamin</th>
                            <th class="py-3 px-4">Subjek</th>
                            <th class="py-3 px-4">Jabatan</th>
                            <th class="py-3 px-4">Pangkat</th>
                            <th class="py-3 px-4">Golongan</th>
                            <th class="py-3 px-4 rounded-r-full">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pegawai as $index => $data)
                            <tr class="text-center">
                                <td class="py-3 px-4 border-b border-background-yellow2Bg">{{ $index + 1 }}</td>
                                <td class="py-3 px-4 border-b border-background-yellow2Bg">{{ $data->nip }}</td>
                                <td class="py-3 px-4 border-b border-background-yellow2Bg">{{ $data->name }}</td>
                                <td class="py-3 px-4 border-b border-background-yellow2Bg">{{ $data->email }}</td>
                                <td class="py-3 px-4 border-b border-background-yellow2Bg">{{ $data->jenis_kelamin }}</td>
                                <td class="py-3 px-4 border-b border-background-yellow2Bg">{{ Str::studly ($data->role)}}</td>
                                <td class="py-3 px-4 border-b border-background-yellow2Bg">{{ $data->jabatan }}</td>
                                <td class="py-3 px-4 border-b border-background-yellow2Bg">{{ $data->pangkat }}</td>
                                <td class="py-3 px-4 border-b border-background-yellow2Bg">{{ $data->golongan }}</td>
                                <td class="flex px-4 py-3 border-b border-background-yellow2Bg gap-3 text-center justify-center">
                                    <button type="button" onclick="openModalEdit({{ json_encode($data) }})" class="bg-background-yellow2Bg px-3 py-2 rounded-lg text-black hover:bg-button-hoverPendingBtn">
                                        Edit
                                    </button>
                                    <button type="button" onclick="openModalHapus('{{ $data->nip }}')" class="bg-button-declineBtn px-3 py-2 rounded-lg text-white hover:bg-button-hoverDeclineBtn">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="py-4 text-center text-gray-500">
                                    Data pegawai belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                        <script src="{{ asset('js/modal.js') }}"></script>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  

    {{-- Modal Tambah--}}
    @include('modals.modal-tambah')

    {{-- Modal Edit--}}
    @include('modals.modal-edit')

    <!-- Modal Konfirmasi -->
    <div id="popup-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-25 backdrop-blur-sm hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
            <!-- Tombol Close -->
            <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700" onclick="closeModalKonfirmasi()">✖</button>
            
            <div class="text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 id="modal-text" class="mb-5 text-lg font-normal text-gray-500"></h3>
                <form id="modal-form" method="POST">
                    @csrf
                    <div id="modal-hidden-inputs"></div>
                    <button type="submit" id="modal-action-button" class="py-2 px-5 font-medium rounded-md text-white focus:outline-none"></button>
                    <button type="button" onclick="closeModalKonfirmasi()" class="py-2 px-5 bg-gray-300 hover:bg-gray-400 rounded-md text-gray-700">Batal</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>

{{-- JavaScript --}}
<script>
  
    document.addEventListener('DOMContentLoaded', () => {
        // Ambil elemen tombol dan modal
        const btnTambah = document.getElementById('btnTambahPengawas');
        const modalTambah = document.getElementById('modal-tambah');
        const modalEdit = document.getElementById('modal-edit');
        const modalKonfirmasi = document.getElementById('popup-modal');

        const btnCloseTambah = document.getElementById("close-modal-tambah");
        const btnCloseEdit = document.getElementById("close-modal-edit");
        const btnBatalTambah = document.getElementById("batalTambah");
        const btnBatalEdit = document.getElementById("modal-edit")?.querySelector("#batalEdit");

        const formTambah = document.getElementById("formTambah");
        const formEdit = document.getElementById("formEdit");
        const modalText = document.getElementById('modal-text');
        const modalActionButton = document.getElementById('modal-action-button');
        const modalForm = document.getElementById('modal-form');

        // Function untuk membuka dan menutup modal tambah
        function openModalTambah() {
            modalTambah.classList.remove('hidden');
        }
        function closeModalTambah() {
            modalTambah.classList.add('hidden');
        }

        // Function untuk membuka dan menutup modal edit
        window.openModalEdit = function(data) {
            formEdit.setAttribute("action", `/daftar-pegawai/edit/${data.nip}`);
            formEdit.setAttribute("data-nip", data.nip);
            formEdit.querySelector('[name="nama"]').value = data.name;
            formEdit.querySelector('[name="nip"]').value = data.nip;
            formEdit.querySelector('[name="email"]').value = data.email;
            formEdit.querySelector('[name="jenis_kelamin"]').value = data.jenis_kelamin;
            formEdit.querySelector('[name="jabatan"]').value = data.jabatan;
            formEdit.querySelector('[name="pangkat"]').value = data.pangkat;
            formEdit.querySelector('[name="golongan"]').value = data.golongan;
            formEdit.querySelector('[name="role"]').value = data.role;
            formEdit.querySelector('[name="password"]').value = data.password;

            modalEdit.classList.remove('hidden');
        }
        function closeModalEdit() {
            modalEdit.classList.add('hidden');
        }

        // Function untuk membuka modal konfirmasi
        function openModalKonfirmasi(type) {
            modalKonfirmasi.classList.remove('hidden');
            modalActionButton.classList.remove("bg-green-600", "hover:bg-green-700", "bg-blue-600", "hover:bg-blue-700", "bg-red-600", "hover:bg-red-700");

            let form = (type === "tambah") ? formTambah : formEdit;
            modalText.innerText = type === "tambah" ? "Apakah Anda yakin ingin menambahkan akun pegawai ini?" : "Apakah Anda yakin ingin mengedit akun pegawai ini?";
            modalActionButton.innerText = type === "tambah" ? "Tambah" : "Simpan";
            modalActionButton.classList.add(...(type === "tambah" ? ["bg-green-600", "hover:bg-green-700"] : ["bg-blue-600", "hover:bg-blue-700"]));

            modalForm.setAttribute("action", form.getAttribute("action"));
            modalForm.setAttribute("method", "POST");

            document.getElementById('modal-hidden-inputs').innerHTML = type === "edit" ? `
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="nip" value="${form.getAttribute("data-nip")}">
            ` : "";
            

            let inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                let hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = input.name;
                hiddenInput.value = input.value;
                document.getElementById('modal-hidden-inputs').appendChild(hiddenInput);
            });
        }

        // Function untuk membuka dan menutup modal konfirmasi
        window.openModalHapus = function(nip) {
            modalText.innerText = "Apakah Anda yakin ingin menghapus akun pengawai ini?";
            modalActionButton.innerText = "Hapus";
            modalActionButton.classList.add("bg-red-600", "hover:bg-red-700");
            modalForm.setAttribute("action", `/daftar-pegawai/hapus/${nip}`);
            modalForm.setAttribute("method", "DELETE");
            modalKonfirmasi.classList.remove('hidden');
        }

        window.closeModalKonfirmasi = function () {
            modalKonfirmasi.classList.add('hidden');
        }


        // Event listener tombol tambah
        if (btnTambah) btnTambah.addEventListener("click", openModalTambah);
        if (btnCloseTambah) btnCloseTambah.addEventListener("click", closeModalTambah);
        if (btnBatalTambah) btnBatalTambah.addEventListener("click", closeModalTambah);

        // Event listener tombol edit
        if (btnCloseEdit) btnCloseEdit.addEventListener("click", closeModalEdit);
        if (btnBatalEdit) btnBatalEdit.addEventListener("click", closeModalEdit);

        // Event listener untuk modal konfirmasi sebelum submit
        if (formTambah) {
            formTambah.addEventListener("submit", function (event) {
                event.preventDefault();
                closeModalTambah();
                setTimeout(() => openModalKonfirmasi("tambah"), 300);
            });
        }

        if (formEdit) {
            formEdit.addEventListener("submit", function (event) {
                event.preventDefault();
                closeModalEdit();
                setTimeout(() => openModalKonfirmasi("edit"), 300);
            });
        }

        modalActionButton.addEventListener("click", function (event) {
            event.preventDefault();
            let formData = new FormData(modalForm);
            fetch(modalForm.getAttribute("action"), {
                method: modalForm.getAttribute("method"),
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    "Accept": "application/json"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // alert(data.message); // Menampilkan pesan sukses
                closeModalKonfirmasi(); // Menutup modal konfirmasi
                location.reload(); // Reload halaman agar data terbaru muncul
            })
            .catch(error => console.error("Error:", error));
        });
    });

</script>