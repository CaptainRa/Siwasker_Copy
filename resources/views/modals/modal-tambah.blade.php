<div id="modal-tambah" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/3 max-h-[80vh] flex flex-col">
        <div class="flex justify-between items-center border-b p-4">
            <h3 class="text-xl font-semibold">Tambah Pegawai</h3>
            <button id="close-modal-tambah" class="text-gray-500 hover:text-red-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-4 overflow-y-auto flex-1">
            <form id="formTambah" class="p-4" method="POST" action="{{ route('kasat.tambahPengawas') }}">
                @csrf
                @include('forms.form-pengawas')
                <div class="flex justify-end mt-4">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white mr-2 px-4 py-2 rounded-lg">Tambah</button>
                    <button type="button" id="batalTambah" class="px-4 py-2 bg-button-declineBtn rounded-lg text-white hover:bg-button-hoverDeclineBtn">Batal</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>