<x-layout>
    <title>Aduan</title>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-white border-2 border-background-yellow1Bg rounded-2xl w-[80%] mx-auto">
        <div class="py-6 px-6">
            {{-- Header and Search --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-xl font-bold text-gray-900 flex items-center mb-4 sm:mb-0">Tambah Aduan</h2>
            </div>
            {{-- Validation Nama Perusahaan --}}
            @if($errors->has('nama_perusahaan'))
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    {!! $errors->first('nama_perusahaan') !!}
                </div>
            @endif
            {{-- Form --}}
            <form action="{{ route('tu.submitAduan') }}" method="POST" class="space-y-2">
                @csrf
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="kode_aduan" class="w-full sm:w-1/3 text-lg text-gray-900">Kode Aduan</label>
                    <input type="text" id="kode_aduan" name="kode_aduan" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 text-sm" value="{{ old('kode_aduan') }}">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="tanggal" class="w-full sm:w-1/3 text-lg text-gray-900">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 text-sm" value="{{ old('tanggal') }}">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="kanal" class="w-full sm:w-1/3 text-lg text-gray-900">Kanal</label>
                    <input type="text" id="kanal" name="kanal" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 text-sm" value="{{ old('kanal') }}">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="perusahaan" class="w-full sm:w-1/3 text-lg text-gray-900">Nama Perusahaan</label>
                    <select id="perusahaan" name="perusahaan" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 text-sm">
                        <option value="" disabled selected>Pilih Perusahaan</option>
                        @foreach ($perusahaan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_perusahaan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="topik" class="w-full sm:w-1/3 text-lg text-gray-900">Topik</label>
                    <input type="text" id="topik" name="topik" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 text-sm" value="{{ old('topik') }}">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="kontak" class="w-full sm:w-1/3 text-lg text-gray-900">Kontak</label>
                    <input type="text" id="kontak" name="kontak" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 text-sm" value="{{ old('kontak') }}">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="isi_aduan" class="w-full sm:w-1/3 text-lg text-gray-900">Isi Aduan</label>
                    <textarea id="isi_aduan" name="isi_aduan" rows="4" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 text-sm">{{ old('isi_aduan') }}</textarea>
                </div>

                {{-- Buttons --}}
                <div class="flex flex-row justify-between pt-2 items-center py-3">
                    <button type="button" id="openModal" class="px-7 py-3 text-white bg-button-primaryBtn hover:bg-button-hoverPrimaryBtn focus:ring-4 focus:ring-green-300 rounded-lg shadow-lg flex gap-2 items-center justify-start transition duration-300 w-full sm:w-auto">Tambah Perusahaan</button>
                    <div class="flex flex-row space-x-2">
                        <a href='/aduan' id="close" class="px-7 py-3 text-white bg-button-declineBtn hover:bg-button-hoverDeclineBtn focus:ring-4 focus:ring-green-300 rounded-lg shadow-lg flex gap-2 items-center justify-start transition duration-300 w-full sm:w-auto">Batal</a>
                        <button type="submit" id="submitAduan" class="px-3 py-3 text-white bg-button-acceptBtn hover:bg-button-hoverBtn focus:ring-4 focus:ring-green-300 rounded-lg shadow-lg flex gap-2 items-center justify-start transition duration-300 w-full sm:w-auto">Tambah Aduan</button>
                    </div>
                </div>
            </form>        
        </div>
    </section>

    {{-- Modal Tambah Perusahaan --}}
    <div id="modalBackground" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden"></div>
    <div id="modal" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg w-full max-w-[90%] sm:w-[500px] p-6 sm:p-8 shadow-lg hidden">
        <h3 class="text-xl sm:text-3xl font-bold text-gray-900 mb-4 sm:mb-6">Tambah Perusahaan</h3>
        <form id="formPerusahaan" action="{{ route('perusahaan.tambahPerusahaan') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col sm:flex-row sm:items-center">
                <label for="nama_perusahaan" class="w-full sm:w-1/3 text-sm sm:text-lg font-medium text-gray-900">Nama Perusahaan</label>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="w-full sm:w-2/3 px-3 py-1 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 text-sm" value="{{ old('nama_perusahaan') }}" required>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center">
                <label for="alamat_perusahaan" class="w-full sm:w-1/3 text-sm sm:text-lg font-medium text-gray-900">Alamat Perusahaan</label>
                <input type="text" id="alamat_perusahaan" name="alamat_perusahaan" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg text-gray-900" required>
            </div>
            
            <div class="flex flex-col sm:flex-row sm:items-center">
                <label for="kategori_perusahaan" class="w-full sm:w-1/3 text-sm sm:text-lg font-medium text-gray-900">Jenis Usaha</label>
                <input type="text" id="kategori_perusahaan" name="kategori_perusahaan" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg text-gray-900" required>
            </div>

            <div class="mt-4 sm:mt-6 flex flex-col sm:flex-row sm:justify-end items-center space-y-2 sm:space-y-0 sm:space-x-2">
                <button type="button" id="submit" class="w-full sm:w-auto px-6 py-3 text-white bg-button-acceptBtn hover:bg-button-hoverBtn rounded-lg shadow focus:ring-4 focus:ring-green-300">Simpan</button>
                <button type="button" id="closeModal" class="w-full sm:w-auto px-6 py-3 text-white bg-button-declineBtn hover:bg-button-hoverDeclineBtn rounded-lg shadow focus:ring-4 focus:ring-red-300">Batal</button>
            </div>
        </form>
    </div>

    {{-- Modal Success --}}
    <div id="successModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 id="successMessage" class="text-xl font-semibold text-gray-900 mb-4"></h3>
            <button id="closeSuccessModal" class="px-6 py-3 text-white bg-background-Green2Bg hover:bg-background-primaryBg rounded-lg">Tutup</button>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#perusahaan').select2({
                placeholder: "Pilih atau cari perusahaan",
                allowclear: true,
                width: 'resolve',
                ajax: {
                    url: '/perusahaan',
                    dataType: 'json',
                    delay: 250,
                    data:function(params){
                        return { search: params.term };
                    },
                    processResults: function(data){
                        return {
                            results: data.map(item => ({
                                id:item.id,
                                text: item.text,
                                alamat: item.alamat
                            }))
                        };
                    }
                },

                templateResult: function(data) {
                    if (!data.id){
                        return data.text;
                    }

                    var $container = $(`
                        <div>
                            <strong>${data.text}</strong>
                            <small style="color: gray;">${data.alamat || 'Alamat Tidak Tersedia'}</small>
                        </div>
                    `);
                    return $container;
                },
                templateSelection: function(data){
                    return data.text;
                }
            });
        });
        
        
        // Tambah perusahaan
        document.addEventListener("DOMContentLoaded", function(){
            const modal = document.getElementById('modal');
            const modalBackground = document.getElementById('modalBackground');
            const openModal = document.getElementById('openModal');
            const closeModal = document.getElementById('closeModal');
            const formPerusahaan = document.getElementById('formPerusahaan');
            const alertDiv = document.createElement('div');

            // Alert error
            alertDiv.className = "p-2 mb-2 text-sm text-red-800 bg-red-100 rounded-lg hidden";
            formPerusahaan.insertBefore(alertDiv, formPerusahaan.firstChild);

            // Open Modal
            openModal.addEventListener("click", function(){
                modal.classList.remove('hidden');
                modalBackground.classList.remove('hidden');
            });

            // Close Modal
            closeModal.addEventListener("click", function(){
                modal.classList.add("hidden");
                modalBackground.classList.add("hidden");
                resetForm();
            });

            // Submit form cek duplikasi
            document.getElementById('submit').addEventListener('click', function(event){
                event.preventDefault();
                const formData = new FormData(formPerusahaan);
                
                fetch('{{ route('perusahaan.check') }}', {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.exists) {
                        alertDiv.textContent = "Nama perusahaan atau alamat perusahaan sudah terdaftar!";
                        alertDiv.classList.remove("hidden");
                    } else {
                        alertDiv.classList.add("hidden");

                        // Tambah Perusahaan
                        fetch('{{ route('perusahaan.tambahPerusahaan') }}', {
                            method: "POST",
                            body: formData,
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success){
                                // Tutup Modal
                                modal.classList.add('hidden');
                                modalBackground.classList.add('hidden');
                                resetForm();

                                // Tampil Modal
                                document.getElementById("successMessage").innerText = data.success;
                                document.getElementById("successModal").classList.remove("hidden");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                    }
                })
                .catch(error => console.error("Error:", error));
            });

            const successModal = document.getElementById("successModal");
            const closeSuccessModal = document.getElementById("closeSuccessModal");

            if(successModal && closeSuccessModal){
                closeSuccessModal.addEventListener("click", function(){
                    successModal.classList.add("hidden");
                });
            }

            // Reset Form
            function resetForm(){
                formPerusahaan.reset();
                alertDiv.classList.add("hidden");
            }
        });
    </script>
</x-layout>