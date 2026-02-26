<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="flex flex-col gap-10 mt-6 ml-5">

        <div class="flex flex-wrap gap-x-20 gap-y-6 justify-start items-start">
            <div class="flex flex-wrap gap-5 justify-start items-start">
                {{-- Rencana kerja disetujui --}}
                <div class="flex items-center justify-between p-4 border-2 bg-white border-green-500 rounded-lg shadow-md w-64">
                    <div class="ml-3">
                        <p class="text-sm text-gray-600">Rencana Kerja</p>
                        <h2 class="text-3xl font-bold">{{ $rencanaDisetujui }}</h2>
                        <p class="text-md font-bold text-green-600">DISETUJUI</p>
                    </div>
                    <div class="w-12 h-12 flex mr-3 items-center justify-center bg-green-500 rounded-full">
                        <svg class="w-7 h-7 text-white" 
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                        </svg> 
                    </div>
                </div>
            
                {{-- Rencana kerja belum disetujui --}}
                <div class="flex items-center justify-between p-4 border-2 bg-white border-yellow-500 rounded-lg shadow-md w-64">
                    <div class="ml-3">
                        <p class="text-sm text-gray-600">Rencana Kerja</p>
                        <h2 class="text-3xl font-bold">{{ $rencanaBelumDisetujui }}</h2>
                        <p class="text-md font-bold text-yellow-600">BELUM DISETUJUI</p>
                    </div>
                    <div class="w-12 h-12 mr-3 flex items-center justify-center bg-yellow-500 rounded-full">
                        <svg class="w-7 h-7 text-white" 
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            
                {{-- Rencana kerja tidak disetujui --}}
                <div class="flex items-center justify-between p-4 border-2 bg-white border-red-500 rounded-lg shadow-md w-64">
                    <div class="ml-3">
                        <p class="text-sm text-gray-600">Rencana Kerja</p>
                        <h2 class="text-3xl font-bold">{{ $rencanaTidakDisetujui }}</h2>
                        <p class="text-md font-bold text-red-600">TIDAK DISETUJUI</p>
                    </div>
                    <div class="w-12 h-12 mr-3 flex items-center justify-center bg-red-500 rounded-full">
                        <svg class="w-7 h-7 text-white" 
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>

                {{-- Aduan sesuai pengawas --}}
                <div class="flex items-center justify-between p-4 border-2 bg-white border-red-500 rounded-lg shadow-md w-64">
                    <div class="ml-3">
                        <p class="text-sm text-gray-600">Laporan</p>
                        <h2 class="text-3xl font-bold">{{ $aduan }}</h2>
                        <p class="text-md font-bold text-red-600">ADUAN</p>
                    </div>
                    <div class="w-12 h-12 mr-3 flex items-center justify-center bg-red-500 rounded-full">
                        <svg class="w-7 h-7 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11 4a1 1 0 0 0-1 1v10h10.459l.522-3H16a1 1 0 1 1 0-2h5.33l.174-1H16a1 1 0 1 1 0-2h5.852l.117-.67v-.003A1.983 1.983 0 0 0 20.06 4H11ZM9 18c0-.35.06-.687.17-1h11.66c.11.313.17.65.17 1v1a1 1 0 0 1-1 1H10a1 1 0 0 1-1-1v-1Zm-6.991-7a17.8 17.8 0 0 0 .953 6.1c.198.54 1.61.9 2.237.9h1.34c.17 0 .339-.032.495-.095a1.24 1.24 0 0 0 .41-.27c.114-.114.2-.25.254-.396a1.01 1.01 0 0 0 .055-.456l-.242-2.185a1.073 1.073 0 0 0-.395-.71 1.292 1.292 0 0 0-.819-.286H5.291c-.12-.863-.17-1.732-.145-2.602-.024-.87.024-1.74.145-2.602H6.54c.302 0 .594-.102.818-.286a1.07 1.07 0 0 0 .396-.71l.24-2.185a1.01 1.01 0 0 0-.054-.456 1.088 1.088 0 0 0-.254-.397 1.223 1.223 0 0 0-.41-.269A1.328 1.328 0 0 0 6.78 4H4.307c-.3-.001-.592.082-.838.238a1.335 1.335 0 0 0-.531.634A17.127 17.127 0 0 0 2.008 11Z" clip-rule="evenodd"/>
                          </svg>
                    </div>
                </div>
            </div>
            
            {{-- Timeline Hari Ini --}}
            <div class="flex-1 min-w-[250px] max-w-[350px] max-h-[300px] overflow-y-auto">
                <h2 class="text-base font-bold text-black">Hari ini</h2>
                <ol class="relative border-s border-gray-200 dark:border-gray-700 mt-3 ml-2">
                    
                    {{-- Menampilkan Rencana Kerja yang sudah disetujui jika ada --}}
                    @foreach ($rencanaKerjaHariIni as $item)
                        <li class="mb-4 ms-6">
                            <div class="absolute w-4 h-4 bg-green-500 rounded-full mt-1.5 -start-2 border border-gray-200"></div>
                            <div class="p-3 bg-green-100 border border-green-400 rounded-md shadow-sm">
                                <h3 class="text-black font-bold text-sm">
                                    {{ $item->jenis_kegiatan }} - {{ $item->perusahaan->nama_perusahaan }}
                                </h3>
                                <p class="text-xs font-light mt-1 text-gray-800">
                                    {{ $item->perusahaan->alamat_perusahaan }}
                                </p>
                            </div>
                        </li>
                    @endforeach

                    {{-- Menampilkan Aduan jika ada --}}
                    @foreach ($aduanHariIni as $item)
                        <li class="mb-4 ms-6">
                            <div class="absolute w-4 h-4 bg-red-500 rounded-full mt-1.5 -start-2 border border-gray-200"></div>
                            <div class="p-3 bg-red-100 border border-red-400 rounded-md shadow-sm">
                                <h3 class="text-black font-bold text-sm">
                                    Aduan - {{ $item->topik }}
                                </h3>
                                <p class="text-xs font-light mt-1 text-gray-800">
                                    {{ $item->perusahaan }}
                                </p>
                            </div>
                        </li>
                    @endforeach

                    {{-- Jika tidak ada Rencana Kerja maupun Aduan--}}
                    @if ($rencanaKerjaHariIni->isEmpty() && $aduanHariIni->isEmpty())
                        <li class="mb-4 ms-6">
                            <div class="absolute w-4 h-4 bg-gray-500 rounded-full mt-1.5 -start-2 border border-gray-200"></div>
                            <div class="p-3 bg-gray-100 border border-gray-400 rounded-md shadow-sm">
                                <h3 class="text-black font-bold text-sm">
                                    Tidak ada kegiatan untuk hari ini
                                </h3>
                                <p class="text-xs font-light mt-1 text-gray-800">
                                    Tidak ada rencana kerja atau aduan yang tercatat hari ini.
                                </p>
                            </div>
                        </li>
                    @endif

                </ol>
            </div>
        </div>
        
        <div class="flex flex-wrap gap-x-36 gap-y-6 justify-start items-start">
            {{-- Diagram batang untuk menampilkan jumlah pelanggaran selama setahun --}}
            <div class="p-3 bg-white rounded-xl shadow-md w-full md:w-[750px]">
                <canvas id="pelanggaranChart"></canvas>
            </div>
            

            {{-- kalender --}}
            <div class="bg-background-red2Bg text-white rounded-2xl shadow-lg p-6 flex-1 min-w-[250px] max-w-[350px]">
                <div class="flex justify-between items-center mb-2">
                    <button id="prev-month" class="text-white hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <h2 id="month-year" class="text-lg font-semibold"></h2>
                    <button id="next-month" class="text-white hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                <div class="grid grid-cols-7 text-center text-sm font-medium">
                    <div>Su</div>
                    <div>Mo</div>
                    <div>Tu</div>
                    <div>We</div>
                    <div>Th</div>
                    <div>Fr</div>
                    <div>Sa</div>
                </div>
                <div id="calendar-dates" class="grid grid-cols-7 gap-y-2 mt-2 p-1 ml-3 gap-x-4 text-center">
                    <!-- Calendar dates will populate here -->
                </div>
            </div>
        </div>

    </div>
    
    <script>
        const calendarDates = document.getElementById("calendar-dates");
        const monthYear = document.getElementById("month-year");
        const prevMonthBtn = document.getElementById("prev-month");
        const nextMonthBtn = document.getElementById("next-month");

        let currentYear = new Date().getFullYear();
        let currentMonth = new Date().getMonth();
        const today = new Date();

        function updateCalendar(year, month) {
        // Update bulan dan tahun di header
        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        monthYear.textContent = `${monthNames[month]} ${year}`;

        // Cari jumlah hari di bulan
        const firstDay = new Date(year, month, 1).getDay(); // Hari pertama
        const daysInMonth = new Date(year, month + 1, 0).getDate(); // Total hari

        // Kosongkan grid
        calendarDates.innerHTML = "";

        // Tambahkan kotak kosong sebelum tanggal 1
        for (let i = 0; i < firstDay; i++) {
            const emptyDiv = document.createElement("div");
            calendarDates.appendChild(emptyDiv);
        }

        // Tambahkan tanggal
        for (let day = 1; day <= daysInMonth; day++) {
            const dateDiv = document.createElement("div");
            dateDiv.textContent = day;
            dateDiv.className = "w-8 h-8 flex justify-center items-center rounded-full cursor-pointer";

            // Tandai hari ini
            if (
            year === today.getFullYear() &&
            month === today.getMonth() &&
            day === today.getDate()
            ) {
            dateDiv.classList.add("bg-background-secondaryBg", "text-black");
            } else {
            dateDiv.classList.add("hover:bg-gray-700", "hover:text-white");
            }

            calendarDates.appendChild(dateDiv);
        }
        }

        // Navigasi bulan
        prevMonthBtn.addEventListener("click", () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        updateCalendar(currentYear, currentMonth);
        });

        nextMonthBtn.addEventListener("click", () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        updateCalendar(currentYear, currentMonth);
        });

        // Inisialisasi kalender
        updateCalendar(currentYear, currentMonth);


        // bar chart untuk menampilkan jumlah pelanggaran
        document.addEventListener("DOMContentLoaded", function() {
            var dataPelanggaran = @json($pelanggaran);
            var ctx = document.getElementById('pelanggaranChart').getContext('2d');
            var chartInstance;

            function createChart() {
                if (chartInstance) {
                    chartInstance.destroy(); // Hapus chart lama sebelum membuat yang baru
                }
                chartInstance = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['WLKP', 'WKWI', 'TKA', 'Kompensasi', 'TKI', 'UMP', 'Lembur', 'THR', 'Cuti Tahunan', 'Cuti Hamil', 'PKB', 'Susu', 'Jamsos', 'K3', 'Lainnya'],
                        datasets: [{
                            label: 'Jumlah Pelanggaran',
                            data: [dataPelanggaran.wlkp, dataPelanggaran.wkwi, dataPelanggaran.tka, dataPelanggaran.kompensasi, dataPelanggaran.tki, dataPelanggaran.ump, dataPelanggaran.lembur, dataPelanggaran.thr, dataPelanggaran.cutith, dataPelanggaran.cutihamil, dataPelanggaran.pkb, dataPelanggaran.susu, dataPelanggaran.jamsos, dataPelanggaran.k3, dataPelanggaran.lainnya],
                            backgroundColor: 'rgba(75, 192, 192, 0.5)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Buat chart pertama kali
            createChart();

            var resizeObserver = new ResizeObserver(() => {
                createChart();
            });

            resizeObserver.observe(document.getElementById('pelanggaranChart').parentElement);
        });

    </script>
</x-layout>