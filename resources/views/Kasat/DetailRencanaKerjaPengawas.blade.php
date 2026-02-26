<x-layout>
    @include('components.toast')


    <x-slot:title>{{$title}}</x-slot:title>
    <div class="mb-4">
        <table class="w-auto text-md text-left text-black border-collapse">
            <tbody>
                <tr>
                    <td class="pr-4 font-semibold">Nama / NIP</td>
                    <td class="font-normal">: {{ $pengawas->name ?? '-' }} / {{ $pengawas->nip ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="pr-4 font-semibold">Pangkat / Golongan</td>
                    <td class="font-normal">: {{ $pengawas->pangkat ?? '-' }} / {{ $pengawas->golongan ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="pr-4 font-semibold">Jabatan</td>
                    <td class="font-normal">: {{ $pengawas->jabatan ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
   
    <div class="relative overflow-x-auto max-h-96 overflow-y-auto">
        {{-- TABEL --}}
        <table class="w-full text-md text-left text-black border border-gray-300 dark:text-gray-400">
            <thead class="text-md text-black uppercase bg-background-yellow3Bg border-t-2 border-b-2 border-background-yellow2Bg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400">
                <tr>
                    <th rowspan="2" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">No</th>
                    <th rowspan="2" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Jenis Kegiatan</th>
                    <th colspan="2" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Pelaksanaan</th>
                    <th rowspan="2" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Keterangan</th>
                    <th rowspan="2" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Status</th>
                    <th rowspan="2" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Action</th>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Nama dan Alamat Perusahaan</th>
                    <th class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Tanggal Pelaksanaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rencana_kerja as $rencana)
                    <tr class="bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-3 text-center border border-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 text-center border border-gray-300">{{ $rencana->jenis_kegiatan }}</td>
                        <td class="px-4 py-3 text-center border border-gray-300">
                            {{ $rencana->perusahaan->nama_perusahaan ?? 'Tidak ada' }}, {{ $rencana->perusahaan->alamat_perusahaan ?? '-'}}
                        </td>
                        <td class="px-4 py-3 text-center border border-gray-300">
                            {{ \Carbon\Carbon::parse($rencana->tanggal_pelaksanaan)->format('d F Y') }}
                        </td>
                        <td class="px-4 py-3 text-center border border-gray-300">{{ $rencana->keterangan ?? '-' }}</td>
                        <td class="px-4 py-3 text-center border border-gray-300">
                            @if($rencana->status == 'sudah disetujui')
                                <span class="bg-button-acceptBtn text-white py-1 px-4 rounded-full whitespace-nowrap">Sudah Disetujui</span>
                            @elseif($rencana->status == 'tidak disetujui')
                                <span class="bg-button-declineBtn text-white py-1 px-4 rounded-full whitespace-nowrap">Tidak Disetujui</span>
                            @else
                                <span class="bg-button-loginBtn text-gray-700 py-1 px-4 rounded-full whitespace-nowrap">Belum Disetujui</span>
                            @endif
                        </td> 
                        <td class="px-4 py-3 text-center border">
                            <div class="flex justify-center items-center gap-2 h-full">
                                <button 
                                    class="focus:outline-none bg-button-declineBtn text-white hover:bg-button-hoverDeclineBtn py-1 px-4 focus:ring-4 focus:ring-red-300 font-medium rounded-md dark:hover:bg-button-hoverDeclineBtn dark:focus:ring-red-400"
                                    onclick="openModal('{{ route('kasat.ubahStatusRencanaKerja', ['id'=>$rencana->id, 'status'=>'tidak disetujui'])}}', 'tolak')">    
                                    Tolak
                                </button>
                                
                                <button 
                                    class="focus:outline-none bg-button-acceptBtn text-white hover:bg-button-hoverBtn py-1 px-4 focus:ring-4 focus:ring-green-300 font-medium rounded-md dark:hover:bg-button-hoverBtn dark:focus:ring-green-400"
                                    onclick="openModal('{{ route('kasat.ubahStatusRencanaKerja', ['id'=>$rencana->id, 'status'=>'sudah disetujui'])}}', 'setujui')">
                                    Setujui
                                </button>
                                
                            </div>
                        </td>                       
                    </tr>
                @endforeach
            </tbody>            
        </table>    
    </div>
    <div class="mt-6 flex justify-end gap-4">
        <button type="button" 
            class="focus:outline-none bg-button-declineBtn text-white hover:bg-button-hoverDeclineBtn py-2.5 px-5 focus:ring-4 focus:ring-red-300 font-medium rounded-md dark:hover:bg-button-hoverDeclineBtn dark:focus:ring-red-400"
            onclick="openModal('{{ route('kasat.ubahSemuaStatusRencanaKerja', ['status'=>'tidak disetujui'])}}', 'tolak_semua')">
            Tolak Semua
        </button>
        <button type="button" 
            class="focus:outline-none bg-button-acceptBtn text-white hover:bg-button-hoverBtn py-2.5 px-5 focus:ring-4 focus:ring-green-300 font-medium rounded-md dark:hover:bg-button-hoverBtn dark:focus:ring-green-400"
            onclick="openModal('{{ route('kasat.ubahSemuaStatusRencanaKerja', ['status'=>'sudah disetujui'])}}', 'setujui_semua')">
            Setujui Semua
        </button>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="popup-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-25 backdrop-blur-sm hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
            <!-- Tombol Close -->
            <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700" onclick="closeModal()">✖</button>
            
            <div class="text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 id="modal-text" class="mb-5 text-lg font-normal text-gray-500"></h3>
                <form id="modal-form" method="POST">
                    @csrf
                    <button type="submit" id="modal-action-button" class="py-2 px-5 font-medium rounded-md text-white focus:outline-none"></button>
                    <button type="button" onclick="closeModal()" class="py-2 px-5 bg-gray-300 hover:bg-gray-400 rounded-md text-gray-700">Batal</button>
                </form>
            </div>
        </div>
    </div>


</x-layout>

<script>
    function openModal(url, action) {
        let modalText = document.getElementById('modal-text');
        let actionButton = document.getElementById('modal-action-button');
        
        if (action === 'setujui') {
            modalText.textContent = 'Apakah Anda yakin ingin menyetujui rencana kerja ini?';
            actionButton.textContent = 'Setujui';
            actionButton.className = 'py-2 px-5 bg-green-600 hover:bg-green-700 focus:ring-green-300 font-medium rounded-md text-white focus:outline-none';
        } else if (action === 'tolak') {
            modalText.textContent = 'Apakah Anda yakin menolak rencana kerja ini?';
            actionButton.textContent = 'Tolak';
            actionButton.className = 'py-2 px-5 bg-red-600 hover:bg-red-700 focus:ring-red-300 font-medium rounded-md text-white focus:outline-none';
        } else if (action === 'setujui_semua'){
            modalText.textContent = 'Apakah Anda yakin ingin menyetujui semua rencana kerja?';
            actionButton.textContent = 'Setujui Semua';
            actionButton.className = 'py-2 px-5 bg-green-600 hover:bg-green-700 focus:ring-green-300 font-medium rounded-md text-white focus:outline-none';
        } else if (action === 'tolak_semua'){
            modalText.textContent = 'Apakah Anda yakin menolak semua rencana kerja?';
            actionButton.textContent = 'Tolak Semua';
            actionButton.className = 'py-2 px-5 bg-red-600 hover:bg-red-700 focus:ring-red-300 font-medium rounded-md text-white focus:outline-none';
        }
        
        document.getElementById('modal-form').action = url;
        document.getElementById('popup-modal').classList.remove('hidden');
    }
    
    function closeModal() {
        document.getElementById('popup-modal').classList.add('hidden');
    }
</script>
    
