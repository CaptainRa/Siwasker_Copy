<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <section class="bg-white border-2 border-yellow-400 rounded-2xl dark:bg-gray-900 w-[80%] md:w-[60%] mx-auto mt-10">
        <div class="py-6 px-6">
            @if (session('error_duplikasi'))
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    {!! session('error_duplikasi') !!}
                </div>
            @endif
            <h2 class="flex justify-start items-center space-x-2 mb-4 text-xl font-bold text-gray-900 dark:text-white">
                <svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                </svg>
                  EDIT RENCANA KERJA
            </h2>
            <form action="{{ route('pengawas.updateRencanaKerja', $rencana_kerja->id) }}" method="POST" class="space-y-4">

                @csrf
                @method('PUT')
            
                {{-- Jenis Kegiatan --}}
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="jenis_kegiatan" class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Jenis Kegiatan</label>
                    <select id="jenis_kegiatan" name="jenis_kegiatan" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" required>
                        <option value="" disabled>Pilih jenis kegiatan</option>
                        <option value="Pemeriksaan" {{ $rencana_kerja->jenis_kegiatan == 'Pemeriksaan' ? 'selected' : '' }}>Pemeriksaan</option>
                        <option value="Pembinaan" {{ $rencana_kerja->jenis_kegiatan == 'Pembinaan' ? 'selected' : '' }}>Pembinaan</option>
                        <option value="Pengujian" {{ $rencana_kerja->jenis_kegiatan == 'Pengujian' ? 'selected' : '' }}>Pengujian</option>
                    </select>
                </div>
            
                {{-- Nama Perusahaan --}}
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="nama_perusahaan" class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Nama Perusahaan</label>
                    <select id="nama_perusahaan" name="nama_perusahaan" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900" required>
                        <option value="" disabled>Pilih perusahaan</option>
                        @foreach($perusahaans as $perusahaan)
                            <option value="{{ $perusahaan->id }}" {{ $rencana_kerja->nama_perusahaan == $perusahaan->nama_perusahaan ? 'selected' : '' }}>
                                {{ $perusahaan->nama_perusahaan }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                {{-- Tanggal Pelaksanaan --}}
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="tanggal_pelaksanaan" class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Tanggal Pelaksanaan</label>
                    <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" value="{{ $rencana_kerja->tanggal_pelaksanaan }}" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" required>
                </div>
            
                {{-- Keterangan --}}
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="keterangan" class="w-full sm:w-1/3 text-lg font-medium text-gray-900">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="4" class="w-full sm:w-2/3 p-3 border-2 border-background-yellow1Bg rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-gray-900 placeholder-gray-400" placeholder="Tambahkan keterangan">{{ $rencana_kerja->keterangan }}</textarea>
                </div>
                         

                <div class="mt-6 flex justify-end items-center space-x-2">
                    {{-- Button Batal --}}
                    <button type="button" onclick="window.location.href='{{ route('pengawas.rencanaKerja') }}'" class="px-6 py-3 bg-button-declineBtn text-white rounded-lg hover:bg-button-hoverDeclineBtn focus:ring-4 focus:ring-red-300 shadow-lg flex items-center justify-center gap-3 transition duration-300">
                        <svg class="w-7 h-7 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 9 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>                  
                        <span class="font-semibold text-lg">BATAL</span>
                    </button>
                    
                    {{-- Button Simpan --}}
                    <button id="simpanButton" type="button" class="px-6 py-3 text-white bg-background-yellow1Bg hover:bg-yellow-600 rounded-lg shadow focus:ring-4 focus:ring-yellow-300 flex items-center">
                        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                        </svg>
                        <span class="font-semibold text-lg">SIMPAN</span>
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- Modal Konfirmasi --}}
    <div id="confirmModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-semibold text-gray-900">Konfirmasi Perubahan</h2>
            <p class="mt-2 text-gray-600">Apakah Anda yakin ingin mengupdate rencana kerja ini?</p>
            <div class="mt-4 flex justify-end space-x-2">
                <button id="cancelButton" class="px-4 py-2 text-gray-600 bg-gray-200 rounded-md">Batal</button>
                <button id="confirmButton" class="px-4 py-2 text-white bg-yellow-500 hover:bg-yellow-600 rounded-md">Ya, Update</button>
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

        // Menampilkan modal konfirmasi
        document.addEventListener("DOMContentLoaded", function () {
            const simpanButton = document.getElementById("simpanButton");
            const modal = document.getElementById("confirmModal");
            const cancelButton = document.getElementById("cancelButton");
            const confirmButton = document.getElementById("confirmButton");
            const form = document.querySelector("form");

            // Tampilkan modal saat tombol Simpan diklik
            simpanButton.addEventListener("click", function (event) {
                event.preventDefault(); 
                modal.classList.remove("hidden"); 
            });

            // Tutup modal saat tombol Batal diklik
            cancelButton.addEventListener("click", function () {
                modal.classList.add("hidden"); 
            });

            // Submit form 
            confirmButton.addEventListener("click", function () {
                form.submit(); 
            });
        });
    </script>
</x-layout>