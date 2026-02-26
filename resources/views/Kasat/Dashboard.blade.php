<x-layout>
  <x-slot:title>{{$title}}</x-slot:title>
  <div class="grid grid-cols-4 gap-6 mt-6 px-8">
    <!-- Bungkus 3 Card + Jumlah Pegawai & Jadwal Hari Ini -->
    <div class="col-span-3">
      <div class="grid grid-cols-3 gap-6">
        <!-- Daftar Rencana Kerja Pengawas -->
        <div class="bg-background-yellow2Bg rounded-xl shadow-lg">
          <div class="bg-background-yellow2Bg rounded-t-xl py-3 px-4">
            <h2 class="font-bold text-white text-center text-md">Daftar Rencana Kerja</h2>
          </div>
          <div class="bg-white py-6 px-4 rounded-b-xl text-center">
            <p class="text-4xl font-bold">{{$rencana_belum}}</p>
            <p class="text-lg font-semibold">Belum Disetujui</p>
          </div>
        </div>
        <div class="bg-background-red2Bg rounded-xl shadow-lg">
          <div class="bg-background-red2Bg rounded-t-xl py-3 px-4">
            <h2 class="font-bold text-white text-center text-md">Daftar Rencana Kerja</h2>
          </div>
          <div class="bg-white py-6 px-4 rounded-b-xl text-center">
            <p class="text-4xl font-bold">{{$rencana_tidak}}</p>
            <p class="text-lg font-semibold">Tidak Disetujui</p>
          </div>
        </div>
        <div class="bg-background-Green2Bg rounded-xl shadow-lg">
          <div class="bg-background-Green2Bg rounded-t-xl py-3 px-4">
            <h2 class="font-bold text-white text-center text-md">Daftar Rencana Kerja</h2>
          </div>
          <div class="bg-white py-6 px-4 rounded-b-xl text-center">
            <p class="text-4xl font-bold">{{$rencana_sudah}}</p>
            <p class="text-lg font-semibold">Sudah Disetujui</p>
          </div>
        </div>
      </div>

      <!-- Jumlah Pegawai & Jadwal Hari Ini -->
      <div class="col-span-2 grid grid-cols-2 gap-6 mt-6 px-8">
        <div class="bg-background-red2Bg rounded-lg shadow-md flex flex-col items-center p-4 w-full">
          <h2 class="font-bold text-white text-md">Jumlah Pegawai</h2>
          <div class="bg-white rounded-lg shadow-md p-4 w-full max-w-sm flex justify-center">
            <canvas id="roleChart" style="width: 150px; height: 150px;"></canvas>
          </div>
        </div>
        
        <div class="flex-1 min-w-[400px] max-w-[500px] max-h-[250px] overflow-y-auto">
          <h2 class="text-base font-bold text-black">Hari ini</h2>
          <ol class="relative border-s border-gray-200 dark:border-gray-700 mt-3 ml-2">
              @if ($rencanaKerjaHariIni->isNotEmpty())
                  @foreach ($rencanaKerjaHariIni as $item)
                      <li class="mb-4 ms-6">
                          <div class="absolute w-4 h-4 bg-background-Green2Bg rounded-full mt-1.5 -start-2 border border-gray-200"></div>
                          <div class="p-3 bg-background-Green4Bg border border-background-primaryBg rounded-md shadow-sm">
                              <h3 class="text-black font-bold text-sm">
                                  {{ $item->jenis_kegiatan }} - {{ $item->perusahaan->nama_perusahaan }}
                              </h3>
                              <p class="text-xs font-light mt-1 text-gray-800">
                                  {{ $item->perusahaan->alamat_perusahaan }}
                              </p>
                          </div>
                      </li>
                  @endforeach
              @else
                  <p class="text-gray-600 ml-2 mt-2">Tidak ada rencana kerja untuk hari ini.</p>
              @endif
          </ol>
        </div>
      </div>
    </div>
    
    <!-- Kalender -->
    <div class="bg-background-red2Bg text-white rounded-3xl shadow-lg p-6 flex-1 min-w-[250px] max-w-[350px]">
      <div class="flex justify-between items-center mb-2">
          <button id="prev-month" class="text-white hover:text-gray-700">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
              </svg>
          </button>
          <h2 id="month-year" class="text-lg font-semibold">Januari</h2>
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
  
  {{-- Tabel Aduan --}}
  <div class="mt-6 px-8">
    <div class="bg-background-red2Bg rounded-xl shadow-lg w-full overflow-hidden">
      <div class="py-3 px-4 text-white font-bold text-center">Daftar Aduan</div>
      <table class="table-auto w-full text-center text-sm md:text-base bg-white">
        <thead>
          <tr class="border-b">
            <th class="py-3 px-4">Kode</th>
            <th class="py-3 px-4">Topik</th>
            <th class="py-3 px-4">Perusahaan</th>
            <th class="py-3 px-4">Waktu</th>
            <th class="py-3 px-4">Status</th>
            <th class="py-3 px-4">Pengawas</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($aduan->sortByDesc('waktu')->take(3) as $data)
            <tr class="border-b">
              <td class="py-3 px-4">{{ $data->kode }}</td>
              <td class="py-3 px-4 truncate max-w-xs" title="{{ $data->topik }}">{{ $data->topik }}</td>
              <td class="py-3 px-4 truncate max-w-xs">{{ $data->perusahaan }}</td>
              <td class="py-3 px-4">{{ $data->waktu }}</td>
              <td class="py-3 px-4">{{ $data->status }}</td>
              <td class="py-3 px-4">{{ $data->pengawas->nama }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('roleChart').getContext('2d');
  var roleChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: ['Pengawas', 'TU', 'Kasat'],
          datasets: [{
              data: [{{ $pengawas }}, {{ $tu }}, {{ $kasat }}],
              backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
              hoverOffset: 4
          }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,  
      }
  });

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

</script>
