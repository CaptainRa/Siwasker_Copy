<x-layout>
    @include('components.toast')
    <x-slot:title>{{$title}}</x-slot:title>
    {{--Search--}}
    <div class="flex flex-col md:flex-row md:justify-between items-center gap-2 mb-4">
        <div class="w-full flex flex-col md:flex-row md:items-center md:justify-between gap-6">
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
    </div>
    
    <div class="bg-white shadow-md border-2 border-background-yellow2Bg rounded-lg overflow-hidden">
        <div class="w-full p-4 bg-white rounded-lg">    
            <div class="overflow-x-auto overflow-y-auto border-b border-background-yellow2Bg rounded-lg overflow-hidden mb-2 max-h-[550px]">
                <table class="table-auto min-w-max w-full border-collapse">
                    <thead class="sticky top-0 bg-background-yellow2Bg">
                        <tr class="bg-background-yellow2Bg text-black text-center rounded-md">
                            <th class="py-3 px-4">Nomor Aduan</th>
                            <th class="py-3 px-4">Topik</th>
                            <th class="py-3 px-4">Aduan</th>
                            <th class="py-3 px-4">Perusahaan</th>
                            <th class="py-3 px-4">Waktu</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4">Pengawas</th>
                            <th class="py-3 px-4">Aksi</th>
                        </tr>
                    </thead>    
                    <tbody id="aduanSelected">
                        @foreach ($aduan as $data)
                        <tr class="border-b border-b-background-yellow2Bg">
                            <td class="py-3 px-4 whitespace-nowrap">{{ $data->kode}}</td>
                            <td class="py-3 px-4 truncate max-w-xs" title="{{ $data->topik}}">{{ $data->topik}}</td>
                            <td class="py-3 px-4 truncate max-w-xs" title="{{ $data->aduan}}">{{ $data->aduan}}</td>
                            <td class="py-3 px-4 truncate max-w-xs">{{ $data->perusahaan}}</td>
                            <td class="py-3 px-4 whitespace-nowrap">{{ $data->waktu}}</td>
                            <td class="py-3 px-4 whitespace-nowrap">{{ $data->status}}</td>
                            <td class="py-3 px-4"> 
                                <select name="pengawas" 
                                    class="pengawas-dropdown bg-white border border-background-yellow2Bg text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    data-kode="{{ $data->kode }}" {{ $data->status == 'Selesai' ? 'disabled' : '' }}>
                                    <option value="" disabled selected>Pilih Pengawas</option>
                                    @foreach ($pengawas as $pengawasItem)    
                                        <option value="{{ $pengawasItem->nip}}" {{ $data->pengawas && $data->pengawas->nip == $pengawasItem->nip ? 'selected':''}}>
                                            {{ $pengawasItem->name }}
                                        </option>
                                    @endforeach
                                </select>                    
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <button class="open-modal text-center text-white text-sm bg-button-primaryBtn hover:bg-button-hoverPrimaryBtn hover: rounded-lg py-2 px-3" 
                                        data-kode="{{ $data->kode}}" 
                                        data-topik="{{$data->topik}}"
                                        data-aduan="{{$data->aduan}}"
                                        data-perusahaan="{{$data->perusahaan}}"
                                        data-kontak="{{$data->kontak}}"
                                        data-kanal="{{$data->kanal}}"
                                        data-waktu="{{$data->waktu}}"
                                        data-status="{{$data->status}}"
                                        data-keterangan="{{$data->keterangan}}"
                                        data-pengawas="{{$data->pengawas ? $data->pengawas->nama : 'Belum ditentukan'}}">
                                        Detail                      
                                    </button> 
                                    
                                    <form action="/aduan/jadwalkan-aduan/{{ $data->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="kode" value="{{ $data->id }}">
                                        <button type="submit" id="jadwalkan" class="text-center text-white text-sm bg-button-acceptBtn hover:bg-button-hoverBtn hover: rounded-lg py-2 px-3" >
                                            Kirim
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--Modal--}}
    <div id="side-modal" 
        class="fixed inset-0 bg-black bg-opacity-50 hidden backdrop-blur-sm">
        <div class="w-1/3 max-h-[120vh] bg-white shadow-lg rounded-lg transform translate-x-full transition-transform duration-300 ease-in-out p-6 mt-6 mb-6 mr-2 overflow-y-auto fixed right-0"
            id="modal-content">

            <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <h2 class="text-lg font-bold mb-4">Detail Aduan</h2>
            
            <div class="space-y-1 text-sm">
                <div class="grid gap-1">
                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Nomor Aduan:</p>
                        <p id="modal-kode" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Topik:</p>
                        <p id="modal-topik" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Aduan:</p>
                        <p id="modal-aduan" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Perusahaan:</p>
                        <p id="modal-perusahaan" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Kontak:</p>
                        <p id="modal-kontak" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Kanal:</p>
                        <p id="modal-kanal" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Waktu:</p>
                        <p id="modal-waktu" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 py-2 px-3 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Status:</p>
                        <p id="modal-status" class="text-left"></p>
                    </div>

                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Keterangan</p>
                        <p id="modal-keterangan" class="text-left"></p>
                    </div>
                    <div class="flex gap-2 bg-gray-200 px-3 py-2 rounded-md">
                        <p class="text-black font-semibold min-w-[150px]">Pengawas:</p>
                        <p id="modal-pengawas" class="text-left"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
    $(document).ready(function(){
        $('.pengawas-dropdown').change(function(){
            var kodeAduan = $(this).data('kode');
            var nipPengawas = $(this).val();
            var token = "{{ csrf_token() }}";

            // if (!kodeAduan) {
            //     console.error("Kode Aduan kosong! Cek di Blade template.");
            //     alert("Terjadi kesalahan, kode aduan tidak ditemukan.");
            //     return;
            // }

            // console.log("Mengirim request untuk Kode Aduan: " + kodeAduan);

            $.ajax({
                url: "/aduan/" + kodeAduan + "/update-pengawas",
                type: "PUT",
                data: {
                    _token: token,
                    pengawas: nipPengawas
                },
                success: function(response){
                    console.log("Pengawas berhasil diperbarui!");
                },
                error: function(xhr){
                    console.error("Gagal memperbarui pengawas:", xhr);
                    alert("Gagal memperbarui pengawas!");
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function(){
        const body = document.body
        const openButtons = document.querySelectorAll(".open-modal");
        const closeButton = document.getElementById("close-modal");
        const sideModal = document.getElementById("side-modal");
        const modalContent = document.getElementById("modal-content");

        openButtons.forEach(button => {
            button.addEventListener("click", function(){
                document.getElementById("modal-kode").textContent = this.dataset.kode;
                document.getElementById("modal-topik").textContent = this.dataset.topik;
                document.getElementById("modal-aduan").textContent = this.dataset.aduan;
                document.getElementById("modal-perusahaan").textContent = this.dataset.perusahaan;
                document.getElementById("modal-kontak").textContent = this.dataset.kontak;
                document.getElementById("modal-kanal").textContent = this.dataset.kanal;
                document.getElementById("modal-waktu").textContent = this.dataset.waktu;
                document.getElementById("modal-status").textContent = this.dataset.status;
                document.getElementById("modal-keterangan").textContent = this.dataset.keterangan;
                document.getElementById("modal-pengawas").textContent = this.dataset.pengawas;

                sideModal.classList.remove("hidden");
                body.classList.add("overflow-hidden");

                setTimeout(() => {
                    sideModal.classList.remove("hidden");
                    modalContent.classList.remove("translate-x-full");
                    modalContent.classList.add("translate-x-0");
                }, 10);
            });
        });
    

        function closeModal(){
            modalContent.classList.remove("translate-x-0");
            modalContent.classList.add("translate-x-full");
            
            setTimeout(() => {
                sideModal.classList.add("flex");
                sideModal.classList.add("hidden");
                body.classList.remove("overflow-hidden");
            }, 300);
        }

        closeButton.addEventListener("click", closeModal);
        sideModal.addEventListener("click", function(event){
            if (event.target === sideModal) {
                closeModal();
            }
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