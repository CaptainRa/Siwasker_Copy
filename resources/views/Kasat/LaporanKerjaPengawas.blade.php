@php use Illuminate\Support\Str; @endphp
<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="flex flex-col md:flex-row overflow-hidden ml-20 mr-20 mb-5">
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
    
    <div class="bg-white shadow-md border-2 border-background-yellow2Bg rounded-2xl overflow-hidden ml-20 mr-20">
        <div class="w-full p-4 bg-white rounded-2xl">
            
            <div class="overflow-x-auto rounded-2-xl">
                <table class="table-auto min-w-max w-full border-collapse">
                    <thead>
                        <tr class="bg-background-yellow2Bg text-black text-center">
                            <th class="py-3 px-4 rounded-l-2xl">No</th>
                            <th class="py-3 px-4">Nomor SPT</th>
                            <th class="py-3 px-4">Tanggal SPT</th>
                            <th class="py-3 px-4">Nama Perusahaan</th>
                            <th class="py-3 px-4">Alamat Perusahaan</th>
                            <th class="py-3 px-4">Pengawas</th>
                            <th class="py-3 px-4 rounded-r-2xl">Detail</th>
                        </tr>
                    </thead>
                    <tbody id="laporanSelected">
                        @foreach ($laporan_kerja as $index => $data)
                        <tr class="border-b border-background-yellow2Bg text-center">
                            <td class="py-3 px-4">{{ $index + 1}}</td>
                            <td class="py-3 px-4">{{ $data->nomor_spt}}</td>
                            <td class="py-3 px-4">{{ $data->tanggal_spt}}</td>
                            <td class="py-3 px-4">{{ $data->nama_perusahaan}}</td>
                            <td class="py-3 px-4">{{ Str::limit ($data->perusahaan->alamat_perusahaan, 50)}}</td>
                            <td class="py-3 px-4">{{ $data->pengawas->nama}}</td>
                            <td class="py-3 px-4">
                                <button class="open-modal bg-button-acceptBtn hover:bg-button-hoverBtn text-white py-2 px-4 rounded-md"
                                    data-pengawas="{{$data->pengawas->nama}}"
                                    data-nomor="{{ $data->nomor_spt}}"
                                    data-tanggal="{{ $data->tanggal_spt}}"
                                    data-jenis="{{$data->jenis_anggaran}}"
                                    data-nama="{{$data->nama_perusahaan}}"
                                    data-tk="{{$data->tk}}"
                                    data-pelanggaran='{!! json_encode(
                                        collect($data)
                                            ->only(["wlkp", "wkwi", "tka", "kompensasi", "tki", "ump", "lembur", "thr", "cutith", "cutihamil", "pkb", "susu", "jamsos", "k3", "lainnya"])
                                            ->filter(fn($value) => is_numeric($value) ? $value > 0 : !empty($value))
                                            ->toArray()
                                    ) !!}'
                                    data-tanggal-np-I="{{$data->tanggal_np_I}}"
                                    data-no-np-I="{{$data->no_np_I}}"
                                    data-tanggal-np-II="{{$data->tanggal_np_II}}"
                                    data-no-np-II="{{$data->no_np_II}}"
                                    data-tanggal-tmp2t="{{$data->tanggal_tmp2t}}"
                                    data-no-tmp2t="{{$data->no_tmp2t}}">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div id="side-modal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden backdrop-blur-sm">
        <div class="w-1/3 max-h-[95vh] bg-white shadow-lg rounded-lg transform translate-x-full transition-transform duration-300 ease-in-out p-6 mt-6 mb-6 mr-2 overflow-y-auto fixed right-0"
            id="modal-content">

            <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <h2 class="text-lg font-bold mb-4">Detail Laporan</h2>

            <div class="space-y-1 text-sm">
                <div class="grid gap-1">
                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Pengawas:</p>
                        <p id="modal-pengawas" class="text-left"></p>
                    </div>
                    
                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Nomor SPT:</p>
                        <p id="modal-nomor" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Tanggal SPT:</p>
                        <p id="modal-tanggal" class="text-left"></p>
                    </div>
                    
                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Jenis Anggaran:</p>
                        <p id="modal-jenis" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Nama Perusahaan:</p>
                        <p id="modal-nama" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Jumlah Tenaga Kerja:</p>
                        <p id="modal-tk" class="text-left"></p>
                    </div>
                    
                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Pelanggaran:</p>
                        <p id="modal-pelanggaran-container" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Tanggal NP I:</p>
                        <p id="modal-tanggal-np-I" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Nomor NP I:</p>
                        <p id="modal-no-np-I" class="text-left"></p>
                    </div>
                 
                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Tanggal NP II:</p>
                        <p id="modal-tanggal-np-II" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Nomor NP II:</p>
                        <p id="modal-no-np-II" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Tanggal TMP2T:</p>
                        <p id="modal-tanggal-tmp2t" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Nomor TMP2T:</p>
                        <p id="modal-no-tmp2t" class="text-left"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>

    document.addEventListener("DOMContentLoaded", function(){
        const body = document.body
        const openButtons = document.querySelectorAll(".open-modal");
        const closeButton = document.getElementById("close-modal");
        const sideModal = document.getElementById("side-modal");
        const modalContent = document.getElementById("modal-content");
        const pelanggaranContainer = document.getElementById("modal-pelanggaran-container");

        openButtons.forEach(button => {
            button.addEventListener("click", function(){
                document.getElementById("modal-pengawas").textContent = this.dataset.pengawas;
                document.getElementById("modal-nomor").textContent = this.dataset.nomor;
                document.getElementById("modal-tanggal").textContent = this.dataset.tanggal;
                document.getElementById("modal-jenis").textContent = this.dataset.jenis;
                document.getElementById("modal-nama").textContent = this.dataset.nama;
                document.getElementById("modal-tk").textContent = this.dataset.tk;
                document.getElementById("modal-tanggal-np-I").textContent = this.dataset.tanggalNpI;
                document.getElementById("modal-no-np-I").textContent = this.dataset.noNpI;
                document.getElementById("modal-tanggal-np-II").textContent = this.dataset.tanggalNpII;
                document.getElementById("modal-no-np-II").textContent = this.dataset.noNpII;
                document.getElementById("modal-tanggal-tmp2t").textContent = this.dataset.tanggalTmp2t;
                document.getElementById("modal-no-tmp2t").textContent = this.dataset.noTmp2t;

                if (pelanggaranContainer) {
                    pelanggaranContainer.innerHTML = "";

                    const pelanggaran = JSON.parse(this.dataset.pelanggaran);
                
                    const wrapper = document.createElement("div");
                    wrapper.classList.add("grid", "gap-2", "w-full");

                    Object.keys(pelanggaran).forEach(key => {
                        const value = pelanggaran[key];

                        const div = document.createElement("div");
                        div.classList.add("flex", "items-center", "gap-4", "bg-gray-100", "px-3", "py-2", "rounded-md");

                        const label = document.createElement("p");
                        label.classList.add("text-black", "font-medium", "w-[150px]");
                        label.textContent = key.toUpperCase().replace("_", " ") + ":";

                        const valueText = document.createElement("p");
                        valueText.classList.add("px-3", "py-1", "rounded-md", "bg-background-red4Bg", "text-background-red1Bg");
                        valueText.textContent = value;

                        div.appendChild(label);
                        div.appendChild(valueText);
                        wrapper.appendChild(div);
                    });

                    pelanggaranContainer.appendChild(wrapper);
                }

                sideModal.classList.remove("hidden");
                body.classList.add("overflow-hidden");

                setTimeout(() => {    
                    sideModal.classList.add("flex");
                    modalContent.classList.remove("translate-x-full");
                    modalContent.classList.add("translate-x-0");
                }, 10);
            });
        });

        function closeModal(){
            modalContent.classList.remove("translate-x-0");
            modalContent.classList.add("translate-x-full");

            setTimeout(() => {
                sideModal.classList.remove("flex");
                sideModal.classList.add("hidden");
                body.classList.remove("overflow-hidden");
            }, 300);
        }

        closeButton.addEventListener("click", closeModal);
        sideModal.addEventListener("click", function(e){
            if (e.target === sideModal) {
                closeModal();
            }
        });
    });

    //search function
    const searchInput = document.getElementById("searchInput");
    const resetSearch = document.getElementById("resetSearch");
    const laporanSelected = document.getElementById("laporanSelected");
    searchInput.addEventListener('input', function(){
        const searchTerm = searchInput.value.toLowerCase();
        const rows = laporanSelected.querySelectorAll('tr');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let found = false;

            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                    found = true;
                }
            });

            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    resetSearch.addEventListener('click', function(){
        searchInput.value = '';
        const rows = laporanSelected.querySelectorAll('tr');
        rows.forEach(row => {
            row.style.display = '';
        });
    });


</script>
