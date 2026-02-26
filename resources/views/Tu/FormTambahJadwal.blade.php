<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Modal Tambah Jadwal --}}
    <div id="modal-tambahJadwal" class="fixed top-1/2 left-1/2 -translate-y-40 -translate-x-60 bg-white rounded-lg w-full max-w-[50%] shadow-lg border-2 border-background-yellow2Bg flex flex-col justify-items-center">
        <h3 class="text-xl px-6 py-4 font-bold">Tambah Jadwal</h3> 
        <form action="{{ route('tu.tambahJadwal') }}" method="POST">
            @csrf
            <div id="tipe_kegiatan" class="px-6 pt-1 pb-2 flex flex-row justify-between items-center">
                <label for="tipe" class="text-base">Tipe Kegiatan</label>
                <select id="tipe" name="tipe" class="border-background-yellow2Bg border-2 rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-sm w-2/3">
                    <option value="" disabled selected class="text-gray-400">Pilih Tipe Kegiatan</option>
                    <option value="aduan">Aduan</option> 
                    <option value="lainnya">Lain-lain</option> 
                </select>
            </div>


            <div id="aduan" class="hidden">
                <div class="px-6 pt-1 pb-2 flex flex-row justify-between items-center">                
                    <label for="kode_aduan">Kode Aduan</label>
                    <select id="kode_aduan" name="kode_aduan" class="border-background-yellow2Bg border-2 rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-sm w-2/3">
                        <option value="" disabled selected class="text-gray-400">Pilih kode aduan</option>
                        @foreach ( $aduan as $each )
                            <option value="{{ $each->kode }}">{{ $each->kode }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="detail-aduan">
                </div>
            </div>

            <div id="lainnya" class="hidden" >
                <div class="px-6 pt-1 pb-2 flex flex-row justify-between items-center">                
                    <label for="pegawai">Nama Perusahaan</label>
                    <select id="pegawai" name="pegawai" class="border-background-yellow2Bg border-2 rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-sm w-2/3">
                        <option value="" disabled selected class="text-gray-400">Pilih nama pegawai</option>
                        @foreach($pengawas as $each)
                            <option value="{{ $each->nip }}">{{ $each->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="px-6 pt-1 pb-2 flex flex-row justify-between items-center">                
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan-kegiatan" name="keterangan" class="border-background-yellow2Bg border-2 rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-sm w-2/3" rows=5></textarea>
                </div>

                <div class="px-6 pt-1 pb-2 flex flex-row justify-between items-center">
                    <label for="tanggalPelaksanaan">Tanggal Pelaksanaan</label>
                    <input id="tanggalPelaksanaan" name="tanggal" type="date" class="border-background-yellow2Bg border-2 rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-sm w-2/3"></input>
                </div>
            </div>

            <div class="px-6 pt-2 pb-4 flex flex-row justify-end items-center">
                <div class="px-4 py-1.5">
                    <a href="{{ route('tu.jadwalKerjaPengawas') }}" class="bg-button-declineBtn hover:bg-button-hoverDeclineBtn py-3 px-4 text-white rounded-lg">Batal</a>
                </div>
                <div class="py-1.5">
                    <button id="submit" type="submit" class="bg-button-acceptBtn hover:bg-button-hoverBtn py-2 px-4 text-white rounded-lg">Tambah Jadwal</button>
                </div>
            </div>
        </form>
    </div>

    {{-- Modal Success --}}
    <div id="successModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 id="successMessage" class="text-xl font-semibold text-gray-900 mb-4">Jadwal Berhasil Ditambahkan</h3>
            <a href="/jadwal-kerja-pengawas">
                <button id="closeSuccessModal" class="px-6 py-3 text-white bg-background-Green2Bg hover:bg-background-primaryBg rounded-lg">Tutup</button>
            </a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
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
                                id: item.id,
                                text: item.text,
                                alamat: item.alamat
                            }))
                        };
                    }
                },

                templateResult: function(data){
                    if(!data.id){
                        return data.text;
                    }

                    var $container = $(`
                        <div>
                            <strong>${data.text}</strong>
                            <small class="text-gray-400">${data.alamat || 'Alamat Tidak Tersedia'}</small>
                        </div>
                    `);
                    return $container;
                },
                templateSelection: function(data){
                    return data.text;
                }
            });
        });

        // Show Modal
        const submitButton = document.getElementById("submit");
        submitButton.addEventListener("click", function (event) {
            event.preventDefault();

            // Collect form data
            const form = document.querySelector("form");
            const formData = new FormData(form);

            fetch('{{ route('tu.tambahJadwal') }}', {
                method: 'POST',
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        const successModal = document.getElementById("successModal");
                        successModal.classList.remove("hidden");
                    } else {
                        alert(data.message || "Gagal menambahkan jadwal");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat mengirim data.");
                });
        });

        // Close Modal
        const successModal = document.getElementById("successModal");
        const closeSuccessModal = document.getElementById("closeSuccessModal");

        if (successModal && closeSuccessModal) {
            closeSuccessModal.addEventListener("click", function () {
                successModal.classList.add("hidden");
            });
        }

        // Toggle Tipe Kegiatan
        const tipe = document.getElementById('tipe');
        const tipeAduan = document.getElementById('aduan');
        const rencanaKerja = document.getElementById('rk');
        const lainnya = document.getElementById('lainnya');
        tipe.addEventListener('change', function(){
            console.log(tipe.value);
            if (tipe.value == 'aduan') {
                tipeAduan.classList.remove('hidden');
                lainnya.classList.add('hidden');
            } else if (tipe.value == 'lainnya') {
                tipeAduan.classList.add('hidden');
                lainnya.classList.remove('hidden');
            }
            
        });
        

        // Aduan Detail
        const aduan = document.getElementById('kode_aduan');
        aduan.addEventListener('change', function(){
            const kode = this.value;
            console.log(kode);
            fetch(`aduan-selected?kode=${kode}`)
                .then(response => response.json())
                .then(data => {
                    const body = document.getElementById('detail-aduan');
                    body.innerHTML = '';
                    const isi = `
                        <div class="flex flex-row justify-between items-center px-6">
                            {{-- Topik --}}
                            
                                <label for="topik" class="text-base mr-6">Topik</label>
                                <input id="topik" name="topik" type="text" class="border-background-yellow2Bg border-2 rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-sm w-3/5" value="${data.topik}" readonly></input>
                            

                            {{-- Tanggal --}}
                            
                                <label for="tanggalAduan" class="text-base ml-8 mr-6" required>Tanggal Pelaksanaan</label>
                                <input id="tanggalAduan" name="tanggalAduan" type="date" class="border-background-yellow2Bg border-2 rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-sm w-3/5"></input>
                        </div>

                        {{-- Jenis Kegiatan --}}

                        {{-- Aduan --}}
                        <div class="px-6 pt-1 pb-2 flex flex-row justify-between items-center">
                            <label for="aduan" class="text-base">Aduan</label>
                            <textarea id="aduan" name="aduan" type="text" class="border-background-yellow2Bg border-2 rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-sm w-2/3" rows=3 readonly>${data.aduan}</textarea>
                        </div>

                        {{-- Perusahaan --}}
                        <div class="px-6 pt-1 pb-2 flex flex-row justify-between items-center">
                            <label for="perusahaanAduan" class="text-base">Nama Perusahaan</label>
                            <input id="perusahaanAduan" name="perusahaanAduan" type="text" class="border-background-yellow2Bg border-2 rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-sm w-2/3" value="${data.perusahaan}" readonly></input>
                        </div>

                        {{-- Pengawas --}}
                        <div class="px-6 pt-1 pb-2 flex flex-row justify-between items-center">
                            <label for="pengawas" class="text-base">Nama Pengawas</label>
                            <input id="pengawas" name="pengawas" type="text" class="border-background-yellow2Bg border-2 rounded-lg focus:border-background-yellow1Bg focus:ring-background-yellow1Bg text-sm w-2/3" value="${data.name}" readonly></input>
                        </div>`

                    body.innerHTML += isi;
            });
        });
    </script>
</x-layout>