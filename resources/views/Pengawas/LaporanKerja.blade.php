<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    
    <div class="flex flex-col md:flex-row md:justify-between items-center gap-2 mb-4">
        <div class="w-full flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            {{-- Cari --}}
            <form action="{{ route('pengawas.laporanKerja') }}" method="GET" class="w-full md:w-auto">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative w-full md:w-[400px] !important">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    {{-- Cari berdasarkan nomor spt, jenis anggaran, nama/alamat/kategori perusahaan --}}
                    <input type="text" name="search" value="{{ request('search') }}" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-background-yellow1Bg focus:border-background-yellow1Bg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari..." required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-background-yellow2Bg hover:bg-button-hoverPendingBtn focus:ring-4 focus:outline-none focus:ring-background-yellow1Bg font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
            </form>
    
            <div class="flex gap-2 w-full md:w-auto justify-end">
                {{-- Button cetak --}}
                <button type="button" onclick="handlePrint()" 
                    class="no-print px-5 py-2.5 text-sm font-medium text-white flex items-center w-auto bg-button-primaryBtn hover:bg-button-hoverPrimaryBtn focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-6 h-6 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
                    </svg>
                    <span class="text-lg font-semibold">CETAK</span>
                </button>
    
                {{-- Button tambah --}}
                <a href="/laporan-kerja/tambah-laporan-kerja" 
                    class="px-5 py-2.5 text-sm font-medium text-white flex items-center w-auto bg-button-acceptBtn hover:bg-button-hoverBtn focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-700">
                    <svg class="w-6 h-6 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                    </svg> 
                    <span class="text-lg font-semibold">TAMBAH</span>
                </a>
            </div>
        </div>
    </div>
    
    
    <div id="printable-section" class="laporan-kerja">

        <div class="only-print">
            <div class="flex items-center mb-4">
                <img src="image/jateng.png" alt="Jateng" class="w-1/12 ml-10">
                <div class="w-full text-center mr-52">
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
                <p class="font-bold text-center">LAPORAN KERJA PENGAWAS KETENAGAKERJAAN</p>
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
        <div class="relative overflow-x-auto max-h-[470px] ">
            @if(request('search') && request('search') !== '')
                <p class="text-gray-600">Menampilkan hasil pencarian untuk: <strong>{{ request('search') }}</strong></p>
            @endif
            {{-- TABEL --}}
            <table class="work-plan w-full text-md text-left text-black border border-gray-300 dark:text-gray-400">
                <thead class="work-plan text-md text-black uppercase bg-background-yellow3Bg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400">
                    <tr>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">No</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Nomor dan Tanggal SPT</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Anggaran / Non Anggaran</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Nama Perusahaan</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Alamat Perusahaan</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Jenis Usaha</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Jumlah Tk</th>
                        <th colspan="15" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Jenis Pelanggaran Norma Ketenagakerjaan</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Nomor dan Tanggal NP I</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Nomor dan Tanggal NP II</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Nomor dan Tanggal TMP2T</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">LHPP</th>
                        <th rowspan="2" scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Keterangan</th>
                        <th rowspan="2" scope="col" class="no-print px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Action</th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">WLKP</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">WKWI</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">TKA</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Uang Kompensasi</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">TKI</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">UMP</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Uang Lembur</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">THR</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Cuti Th</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Cuti Hamil/Melahirkan</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">PP/PKB</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">SUSU</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Jaminan Sosial</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">K3</th>
                        <th scope="col" class="px-4 py-3 text-center border-2 border-background-yellow2Bg font-semibold">Lain-Lain</th>
                    </tr>
                </thead>
                
                <tbody class="bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700">
                    @if($laporanKerja->count() > 0)
                        @foreach ($laporanKerja as $laporan)
                            <tr class="bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-3 text-center border border-gray-300">
                                    {{ ($laporanKerja->currentPage() - 1) * $laporanKerja->perPage() + $loop->iteration }}
                                </td>
                                
                                <td class="px-4 py-3 text-center border border-gray-300">
                                    {{ $laporan->nomor_spt }} <br> 
                                    {{ $laporan->tanggal_spt ? \Carbon\Carbon::parse($laporan->tanggal_spt)->locale('id')->translatedFormat('j F Y') : '-' }}
                                </td>
                                                                    
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->jenis_anggaran }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->nama_perusahaan }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->perusahaan->alamat_perusahaan }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">
                                    {{ $laporan->perusahaan && $laporan->perusahaan->kategori_perusahaan ? $laporan->perusahaan->kategori_perusahaan : '-' }}
                                </td>
                                
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->tk }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->wlkp }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->wkwi }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->tka }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->kompensasi }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->tki }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->ump }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->lembur }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->thr }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->cutith }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->cutihamil }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->pkb }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->susu }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->jamsos }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->k3 }}</td>
                                <td class="px-4 py-3 text-center border border-gray-300">
                                    {{ isset($laporan->lainnya) && $laporan->lainnya !== '' ? $laporan->lainnya : '-' }}
                                </td>
                                <td class="px-4 py-3 text-center border border-gray-300">
                                    {{ $laporan->no_np_I }} <br> 
                                    {{ $laporan->tanggal_np_I ? \Carbon\Carbon::parse($laporan->tanggal_np_I)->locale('id')->translatedFormat('j F Y') : '-' }}
                                </td>
                                <td class="px-4 py-3 text-center border border-gray-300">
                                    {{ $laporan->no_np_II }} <br> 
                                    {{ $laporan->tanggal_np_II ? \Carbon\Carbon::parse($laporan->tanggal_np_II)->locale('id')->translatedFormat('j F Y') : '-' }}
                                </td>
                                <td class="px-4 py-3 text-center border border-gray-300">
                                    {{ $laporan->no_tmp2t }} <br> 
                                    {{ $laporan->tanggal_tmp2t ? \Carbon\Carbon::parse($laporan->tanggal_tmp2t)->locale('id')->translatedFormat('j F Y') : '-' }}
                                </td>
                                <td class="px-4 py-3 text-center border border-gray-300">
                                    {{ $laporan->lhpp }}
                                </td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $laporan->keterangan ?? '-' }}</td>
                                <td class="no-print flex px-4 py-3 gap-3 text-center justify-center">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('pengawas.editLaporanKerja', ['id' => $laporan->id]) }}"
                                    class="{{ $laporan->keterangan === 'Selesai' ? 'pointer-events-none opacity-50' : '' }}">
                                        <svg class="w-6 h-6 text-background-yellow1Bg dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                        </svg>
                                    </a>
                                
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('pengawas.deleteLaporanKerja', ['id' => $laporan->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="button" 
                                            class="deleteButton text-background-red1Bg dark:text-white {{ $laporan->keterangan === 'Selesai' ? 'pointer-events-none opacity-50' : '' }}" 
                                            {{ $laporan->keterangan === 'Selesai' ? 'disabled' : '' }}>
                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    
                                </td>
                                
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="22" class="px-4 py-3 text-center">Data tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
                @php
                    $displayTotals = request('per_page') === 'all' ? $totalAll : $totals;
                @endphp
                <tfoot class="bg-background-yellow3Bg dark:bg-gray-700">
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center font-bold border-t-2 border-gray-300">Total</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['wlkp'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['wkwi'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['tka'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['kompensasi'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['tki'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['ump'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['lembur'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['thr'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['cutith'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['cutihamil'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['pkb'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['susu'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['jamsos'] ?? 0}}</td>
                        <td class="px-4 py-3 text-center border border-gray-300 font-semibold">{{ $displayTotals['k3'] ?? 0}}</td>
                        <td colspan="6"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="my-10 only-print" style="page-break-before: always;">
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
    
        {{-- pagination --}}
        <div class="no-print flex items-center justify-between mt-3">
            {{-- Dropdown Per Page --}}
            <div>
                <select id="perPage" class="border border-gray-300 rounded-md text-sm px-2 py-1 focus:outline-none focus:ring focus:border-gray-400">
                    <option value="5" {{ request('per_page', 5) == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('per_page', 5) == 10 ? 'selected' : '' }}>10</option>
                    <option value="15" {{ request('per_page', 5) == 15 ? 'selected' : '' }}>15</option>
                    <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>Semua</option>
                </select>
            </div>

            {{-- Pagination Navigation --}}
            <nav class="flex items-center space-x-2">
                {{-- Tombol Previous --}}
                @if ($laporanKerja->onFirstPage())
                    <span class="px-3 py-2 text-gray-400 cursor-not-allowed">
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                    </span>
                @else
                    <a href="{{ $laporanKerja->previousPageUrl() }}&per_page={{ request('per_page', 5) }}" class="px-3 py-2 rounded-md hover:bg-gray-300 transition"><svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg></a>
                @endif

                {{-- Nomor Halaman --}}
                @php
                    $totalPages = $laporanKerja->lastPage();
                    $currentPage = $laporanKerja->currentPage();
                @endphp

                {{-- Tampilkan halaman pertama --}}
                @if ($currentPage > 3)
                    <a href="{{ $laporanKerja->url(1) }}&per_page={{ request('per_page', 5) }}" class="px-3 py-2 rounded-md bg-gray-100 hover:bg-gray-300 transition">1</a>
                    @if ($currentPage > 4)
                        <span class="px-3 py-2 text-gray-500">...</span>
                    @endif
                @endif

                {{-- Tampilkan halaman di sekitar halaman aktif --}}
                @for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++)
                    @if ($i == $currentPage)
                        <span class="px-4 py-2 rounded-md bg-gray-300 font-bold">{{ $i }}</span>
                    @else
                        <a href="{{ $laporanKerja->url($i) }}&per_page={{ request('per_page', 5) }}" class="px-3 py-2 rounded-md bg-gray-100 hover:bg-gray-300 transition">{{ $i }}</a>
                    @endif
                @endfor

                {{-- Tampilkan halaman terakhir --}}
                @if ($currentPage < $totalPages - 2)
                    @if ($currentPage < $totalPages - 3)
                        <span class="px-3 py-2 text-gray-500">...</span>
                    @endif
                    <a href="{{ $laporanKerja->url($totalPages) }}&per_page={{ request('per_page', 5) }}" class="px-3 py-2 rounded-md bg-gray-100 hover:bg-gray-300 transition">{{ $totalPages }}</a>
                @endif

                {{-- Tombol Next --}}
                @if ($laporanKerja->hasMorePages())
                    <a href="{{ $laporanKerja->nextPageUrl() }}&per_page={{ request('per_page', 5) }}" class="px-3 py-2 rounded-md hover:bg-gray-300 transition"><svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg></a>
                @else
                    <span class="px-3 py-2 text-gray-400 cursor-not-allowed"><svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg></span>
                @endif
            </nav>
        </div>

    </div>

    
    {{-- Modal Konfirmasi hapus --}}
    <div id="deleteConfirmationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold mb-4">Konfirmasi Hapus</h2>
            <p>Apakah Anda yakin ingin menghapus laporan kerja ini?</p>
            <div class="mt-4 flex justify-end space-x-2">
                <button id="cancelDeleteButton" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</button>
                <button id="confirmDeleteButton" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Ya, Hapus</button>
            </div>
        </div>
    </div>


    {{-- modal notifikasi --}}
    <div id="notificationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 id="notificationTitle" class="text-xl font-semibold mb-4"></h2>
            <p id="notificationMessage"></p>
            <div class="mt-4 flex justify-end">
                <button id="closeNotificationButton" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tutup</button>
            </div>
        </div>
    </div>
    
    <script>
        // mengatur paginate
        document.getElementById('perPage').addEventListener('change', function () {
            let params = new URLSearchParams(window.location.search);
            params.set('per_page', this.value);
            params.set('page', 1); 
            window.location.search = params.toString();
        });

        // KONFIRMASI HAPUS
        document.addEventListener("DOMContentLoaded", function () {
            const deleteButtons = document.querySelectorAll(".deleteButton");
            const deleteModal = document.getElementById("deleteConfirmationModal");
            const cancelDeleteButton = document.getElementById("cancelDeleteButton");
            const confirmDeleteButton = document.getElementById("confirmDeleteButton");
            let formToSubmit = null;

            deleteButtons.forEach(button => {
                button.addEventListener("click", function (event) {
                    if (this.disabled) return; 
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
                    deleteModal.classList.add("hidden"); 
                    formToSubmit.submit();
                }
            });
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

        // HANDLE SEARCH
        document.addEventListener("DOMContentLoaded", function () {
            // Hapus parameter "search" dari URL saat halaman dimuat
            const url = new URL(window.location.href);
            if (url.searchParams.has('search')) {
                url.searchParams.delete('search');
                window.history.replaceState({}, document.title, url.pathname);
            }
        });

        // CETAK 
        function handlePrint() {
            const urlParams = new URLSearchParams(window.location.search);
            
            if (urlParams.get('per_page') !== 'all') {
                urlParams.set('per_page', 'all');
                window.location.search = urlParams.toString(); 
                return; 
            }

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
    </script>
</x-layout>