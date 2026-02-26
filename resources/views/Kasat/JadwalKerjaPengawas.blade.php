<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    
    <div class="bg-white rounded-2xl shadow-xl p-6">
        <div class="flex justify-between items-center mb-6">
            <button onclick="prevMonth()" class="p-2 rounded-full bg-background-yellow2Bg hover:bg-background-yellow3Bg transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" viewBox="0 0 24 24" fill="none">
                    <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <h3 id="monthYear" class="text-xl font-bold text-gray-900"></h3>
            <button onclick="nextMonth()" class="p-2 rounded-full  bg-background-yellow2Bg hover:bg-background-yellow3Bg transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" viewBox="0 0 24 24" fill="none">
                    <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div id="calendar" class="w-full border rounded-lg shadow-md bg-gray-50 p-2" style="min-height: 500px;"></div>
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
        function closeModal() {
            document.getElementById('eventModalAduan').classList.add('hidden');
            document.getElementById('eventModalRK').classList.add('hidden');
            document.getElementById('eventModalLainnya').classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                contentHeight: 'auto',
                aspectRatio: 1.35,
                events: '/events-kasat',
                headerToolbar: false,
                datesSet: function (dateInfo) {
                    updateMonthYear(dateInfo.view.currentStart);
                },
                eventClick: function (info) {
                    const event = info.event;
                    const props = event.extendedProps;
                    let tanggalFormatted = props.tanggal
                        ? new Date(props.tanggal).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })
                        : 'Tidak ada data';

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
            calendar.render();

            function updateMonthYear(date) {
                let options = { year: 'numeric', month: 'long' };
                document.getElementById('monthYear').innerText = new Intl.DateTimeFormat('id-ID', options).format(date);
            }

            window.prevMonth = function () {
                calendar.prev();
                updateMonthYear(calendar.getDate());
            };

            window.nextMonth = function () {
                calendar.next();
                updateMonthYear(calendar.getDate());
            };
        });
        
    </script>
</x-layout>
