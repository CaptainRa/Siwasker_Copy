<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    {{-- Dropdown Select Pengawas --}}
    <div class="flex flex-col md:flex-row justify-between py-8">
        <a href={{ route('tu.formTambahJadwal') }} class="bg-button-primaryBtn py-2.5 self-center px-8 rounded-lg text-white hover:bg-button-hoverPrimaryBtn">Tambah Jadwal</a>
        <div>
            <input type="radio" value="aduan" name="tipe" id="aduan" class="bg-background-red1Bg" disabled>
            <label for="semua" class="mr-4">Aduan</label>

            <input type="radio" value="rk" name="tipe" id="rk" class="bg-background-yellow1Bg" disabled>
            <label for="semua" class="mr-4">Rencana Kerja</label>

            <input type="radio" value="lain" name="tipe" id="lain" class="bg-background-Green2Bg" disabled>
            <label for="semua" class="mr-4">Lain-lain</label>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <button onclick="prevMonth()" class="text-background-yellow2Bg hover:bg-button-hoverPendingBtn hover:text-white p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                    <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <h3 id="monthYear" class="text-lg font-semibold text-gray-800"></h3>
            <button onclick="nextMonth()" class="text-background-yellow2Bg hover:bg-button-hoverPendingBtn hover:text-white p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                    <path d="M9 18l6-6-6-6" stroke="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="rounded" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <div id="calendar" class="w-full border rounded-lg shadow-sm overflow-hidden" style="min-height: 500px;"></div>
    </div>

    {{-- Modal Detail if Aduan--}}
    <div id="eventModalAduan" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Detail Kegiatan</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold">Jenis Kegiatan</label>
                    <input id="modalJenisAduan" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
              <div>
                    <label class="block text-sm font-semibold">Kode Aduan</label>
                    <input id="modalKodeAduan" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2"></input>
                </div>
                <div>
                    <label class="block text-sm font-semibold">Nama Perusahaan</label>
                    <input id="modalPerusahaanAduan" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Tanggal Pelaksanaan</label>
                    <input id="modalTanggalAduan" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Pengawas</label>
                    <input id="modalPengawasAduan" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2"></input>
                </div>
                <div>
                    <label class="block text-sm font-semibold">Aduan</label>
                    <textarea id="modalIsiAduan" readonly class="w-full border-gray-300 rounded px-3 py-2"></textarea>
                </div>
            </div>
            <div class="mt-5 flex justify-end">
                <button onclick="closeModal()" class="px-4 py-2 bg-background-red1Bg text-white rounded hover:bg-butotn-hoverDeclineBtn">Tutup</button>
            </div>
        </div>
    </div>

    {{-- Modal Detail if RK--}}
    <div id="eventModalRK" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Detail Kegiatan</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold">Tipe Kegiatan</label>
                    <input id="modalTipeRK" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Jenis Kegiatan</label>
                    <input id="modalJenisRK" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Pengawas</label>
                    <input id="modalPengawasRK" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Nama Perusahaan</label>
                    <input id="modalPerusahaanRK" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Tanggal Pelaksanaan</label>
                    <input id="modalTanggalRK" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Keterangan</label>
                    <textarea id="modalKeteranganRK"  readonly class="w-full border-gray-300 rounded px-3 py-2"></textarea>
                </div>
            </div>
            <div class="mt-5 flex justify-end">
                <button onclick="closeModal()" class="px-4 py-2 bg-background-red1Bg text-white rounded hover:bg-butotn-hoverDeclineBtn">Tutup</button>
            </div>
        </div>
    </div>
    
    {{-- Modal Detail if Lainnya--}}
    <div id="eventModalLainnya" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Detail Kegiatan</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold">Jenis Kegiatan</label>
                    <input id="modalTipeLain" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Pengawas</label>
                    <input id="modalPengawasLain" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Keterangan</label>
                    <textarea id="modalKeteranganLain" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold">Tanggal Pelaksanaan</label>
                    <input id="modalTanggalLain" type="text" readonly class="w-full border-gray-300 rounded px-3 py-2">
                </div>
            </div>
            <div class="mt-5 flex justify-end">
                <button onclick="closeModal()" class="px-4 py-2 bg-background-red1Bg text-white rounded hover:bg-butotn-hoverDeclineBtn">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        // Tutup modal
        function closeModal(){
            document.getElementById('eventModalAduan').classList.add('hidden');
            document.getElementById('eventModalRK').classList.add('hidden');
            document.getElementById('eventModalLainnya').classList.add('hidden');
        }

        // Full Calendar
        document.addEventListener('DOMContentLoaded', function(){
            var calendarEl = document.getElementById('calendar');
            var monthYearEl = document.getElementById('monthYear')

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                contentHeight: 'auto',
                aspectRatio: 1.35,
                events:'/events-tu',
                headerToolbar: false,

                // Renew bulan dan tahun
                dateSet: function(dateInfo){
                    updateMonthYear(dateInfo.view.currentStart);
                },

                // Click event function
                eventClick: function(info){
                    const event = info.event;
                    const props = event.extendedProps;

                    console.log("Event clicked:", props);

                    let dateFormatted = props.tanggal ? new Date(props.tanggal).toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    }) : 'Tidak Ada Data';

                    if(props.tipe === 'Aduan'){
                        // open modal aduan
                        document.getElementById('eventModalAduan').classList.remove('hidden');
                        document.getElementById('eventModalRK').classList.add('hidden');
                        document.getElementById('eventModalLainnya').classList.add('hidden');

                        // data event modal aduan
                        document.getElementById('modalJenisAduan').value = props.tipe_kegiatan || 'Tidak Ada Data';
                        document.getElementById('modalKodeAduan').value = props.kode_aduan || 'Tidak Ada Data';
                        document.getElementById('modalPerusahaanAduan').value = props.perusahaan || 'Tidak Ada Data';
                        document.getElementById('modalTanggalAduan').value = props.tanggal || 'Tidak Ada Data';
                        document.getElementById('modalPengawasAduan').value = props.pegawai || 'Tidak Ada Data';
                        document.getElementById('modalIsiAduan').value = props.aduan || 'Tidak Ada Data';
                    } else if (props.tipe_kegiatan === 'Rencana Kerja'){
                        // open modal RK
                        document.getElementById('eventModalAduan').classList.add('hidden');
                        document.getElementById('eventModalRK').classList.remove('hidden');
                        document.getElementById('eventModalLainnya').classList.add('hidden');

                        // data event modal RK
                        document.getElementById('modalTipeRK').value = props.tipe_kegiatan || 'Tidak Ada Data';
                        document.getElementById('modalJenisRK').value = props.jenis_kegiatan || 'Tidak Ada Data';
                        document.getElementById('modalPengawasRK').value = props.pegawai || 'Tidak Ada Data';
                        document.getElementById('modalPerusahaanRK').value = props.perusahaan || 'Tidak Ada Data';
                        document.getElementById('modalTanggalRK').value = props.tanggal || 'Tidak Ada Data';
                        document.getElementById('modalKeteranganRK').value = props.keterangan || 'Tidak Ada Data';
                    } else {
                        // open modal lainnya
                        document.getElementById('eventModalAduan').classList.add('hidden');
                        document.getElementById('eventModalRK').classList.add('hidden');
                        document.getElementById('eventModalLainnya').classList.remove('hidden');

                        // data event modal lainnya
                        document.getElementById('modalTipeLain').value = props.tipe_kegiatan || 'Tidak Ada Data';
                        document.getElementById('modalPengawasLain').value = props.pegawai || 'Tidak Ada Data';
                        document.getElementById('modalKeteranganLain').value = props.keterangan || 'Tidak Ada Data';
                        document.getElementById('modalTanggalLain').value = props.tanggal || 'Tidak Ada Data';
                    }
                }
            });

            // Render Calendar
            calendar.render();

            // Renew month and year text
            function updateMonthYear(date){
                let options = { year:'numeric', month:'long'};
                document.getElementById('monthYear').innerText = new Intl.DateTimeFormat('id-ID', options).format(date);
            }

            // Move to prev month
            window.prevMonth = function(){
                calendar.prev();
                updateMonthYear(calendar.getDate());
            };

            // Move to next month
            window.nextMonth = function(){
                calendar.next();
                updateMonthYear(calendar.getDate());
            }
        });
    </script>
</x-layout>