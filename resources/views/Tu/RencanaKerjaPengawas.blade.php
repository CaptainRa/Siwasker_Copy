<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    {{-- Dropdown Select Pengawas --}}
    <div class="flex flex-col md:flex-row justify-between py-8">
        @csrf
        <select id="nama_pengawas" name="nama_pengawas" class="border-solid border-3 border-background-yellow1Bg rounded-xl">
            <option value="" class="text-grey-400" disabled selected>Cari atau pilih nama pengawas</option>
            @foreach ($pengawas as $each)
                <option value="{{ $each->nip }}">{{ $each->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="relative overflow-x-auto max-h-[450px] overflow-y-auto">
        <table class="work-plan w-full text-md text-left text-black border border-white">
            <thead class="work-plan text-md text-black uppercase bg-background-yellow2Bg border border-white-4">
                <tr>
                    <th rowspan="2" scope="col" class="px-4 py-3 text-center border border-white font-semibold">No</th>
                    <th rowspan="2" scope="col" class="px-4 py-3 text-center border border-white font-semibold">Jenis Kegiatan</th>
                    <th colspan="2" scope="col" class="px-4 py-3 text-center border border-white font-semibold">Pelaksanaan</th>
                    <th rowspan="2" scope="col" class="px-4 py-3 text-center border border-white font-semibold">Keterangan</th>
                </tr>
                <tr>
                    <th scope="col" class="px-4 py-3 text-center border border-white font-semibold">Nama Perusahaan</th>
                    <th scope="col" class="px-4 py-3 text-center border border-white font-semibold">Tanggal Pelaksanaan</th>
                </tr>
            </thead>
            <tbody id='RKSelected'>
                {{-- Dynamic Content --}}
            </tbody>
        </table>
    </div>

    <script>
        const selected = document.getElementById('nama_pengawas');
        console.log(selected.value);
        selected.addEventListener('change', function(){
            const pengawasNip = this.value;
            fetch(`/rencana-kerja-selected?pengawas_nip=${pengawasNip}`)
                .then(response => response.json())
                .then(data => {
                    const body = document.getElementById('RKSelected');
                    body.innerHTML = '';
                    data.forEach((item, index) => {
                        const row = `<tr>
                            <td class='py-3 px-4 text-center border border-white'>${index + 1}</td>
                            <td class='py-3 px-4 text-center border border-white'>${item.jenis_kegiatan}</td>
                            <td class='py-3 px-4 text-center border border-white'>${item.nama_perusahaan}</td>
                            <td class='py-3 px-4 text-center border border-white'>${item.tanggal_pelaksanaan}</td>
                            <td class='py-3 px-4 text-center border border-white'>${item.keterangan}</td>
                        </tr>`
                        body.innerHTML += row;
                    });
                });
        });
    </script>
</x-layout>