<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Kalender --}}
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <button onclick="prevMonth()" class="text-background-yellow2Bg hover:bg-button-hoverPendingBtn p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                    <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <h3 id="monthYear" class="text-lg font-semibold text-gray-800"></h3>
            <button onclick="nextMonth()" class="text-background-yellow2Bg hover:bg-button-hoverPendingBtn p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                    <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                    <textarea id="modalIsiAduan" readonly class="w-full min-h-[150px] h-auto border border-gray-300 rounded px-3 py-2"></textarea>
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
        // Kalender
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var monthYearEl = document.getElementById('monthYear');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                contentHeight: 'auto',
                aspectRatio: 1.35,
                events: '/events', 

                headerToolbar: false, 

                eventClick: function (info) {
                    const event = info.event;
                    const props = event.extendedProps; 

                    console.log("Event Diklik:", props); 

                    if (props.tipe_kegiatan === 'Rencana Kerja') {
                        showRencanaKerjaModal(props);
                    } else if (props.tipe_kegiatan === 'Aduan') {
                        showAduanModal(props);
                    } else if (props.tipe_kegiatan === 'Lain-lain') {
                        showLainnyaModal(props);
                    } else {
                        console.warn("Jenis tidak dikenali:", props.tipe_kegiatan);
                    }
                }
            });

            // Render kalender pertama kali
            calendar.render();
            updateMonthYear(calendar.getDate());

            // Fungsi untuk memperbarui teks bulan dan tahun
            function updateMonthYear(date) {
                let options = { year: 'numeric', month: 'long' };
                monthYearEl.innerText = new Intl.DateTimeFormat('id-ID', options).format(date);
            }

            // Fungsi untuk berpindah ke bulan sebelumnya
            window.prevMonth = function () {
                calendar.prev();
                updateMonthYear(calendar.getDate());
            };

            // Fungsi untuk berpindah ke bulan berikutnya
            window.nextMonth = function () {
                calendar.next();
                updateMonthYear(calendar.getDate());
            };
        });

        // menampilkan modal Aduan
        function showAduanModal(eventData) {
            console.log("Menampilkan modal Aduan:", eventData);

            document.getElementById('modalJenisAduan').value = eventData.tipe_kegiatan || 'Tidak Ada Data';
            document.getElementById('modalKodeAduan').value = eventData.kode_aduan || 'Tidak Ada Data';
            document.getElementById('modalPerusahaanAduan').value = eventData.perusahaan || 'Tidak Ada Data';
            document.getElementById('modalTanggalAduan').value = eventData.tanggal || 'Tidak Ada Data';
            document.getElementById('modalPengawasAduan').value = eventData.pegawai || 'Tidak Ada Data';
            document.getElementById('modalIsiAduan').value = eventData.aduan || 'Tidak Ada Data';

            document.getElementById('eventModalAduan').classList.remove('hidden');
            document.getElementById('eventModalRK').classList.add('hidden');
            document.getElementById('eventModalLainnya').classList.add('hidden');

            document.body.classList.add('overflow-hidden')
        }

        // menampilkan modal Rencana Kerja
        function showRencanaKerjaModal(eventData) {
            console.log("Menampilkan modal Rencana Kerja:", eventData);

            document.getElementById('modalTipeRK').value = eventData.tipe_kegiatan || 'Tidak Ada Data';
            document.getElementById('modalJenisRK').value = eventData.jenis_kegiatan || 'Tidak Ada Data';
            document.getElementById('modalPengawasRK').value = eventData.pegawai || 'Tidak Ada Data';
            document.getElementById('modalPerusahaanRK').value = eventData.perusahaan || 'Tidak Ada Data';
            document.getElementById('modalTanggalRK').value = eventData.tanggal || 'Tidak Ada Data';
            document.getElementById('modalKeteranganRK').value = eventData.keterangan || 'Tidak Ada Data';

            document.getElementById('eventModalAduan').classList.add('hidden');
            document.getElementById('eventModalRK').classList.remove('hidden');
            document.getElementById('eventModalLainnya').classList.add('hidden');

            document.body.classList.add('overflow-hidden');
        }

        // Show modal lainnya
        function showLainnyaModal(eventData) {
            console.log("Menampilkan modal lainnya:", eventData);

            document.getElementById('modalTipeLain').value = eventData.tipe_kegiatan || 'Tidak Ada Data';
            document.getElementById('modalPengawasLain').value = eventData.pegawai || 'Tidak Ada Data';
            document.getElementById('modalKeteranganLain').value = eventData.keterangan || 'Tidak Ada Data';
            document.getElementById('modalTanggalLain').value = eventData.tanggal || 'Tidak Ada Data';

            document.getElementById('eventModalAduan').classList.add('hidden');
            document.getElementById('eventModalRK').classList.add('hidden');
            document.getElementById('eventModalLainnya').classList.remove('hidden');

            document.body.classList.add('overflow-hidden');
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('eventModalAduan').classList.add('hidden');
            document.getElementById('eventModalRK').classList.add('hidden');
            document.getElementById('eventModalLainnya').classList.add('hidden');

            document.body.classList.remove('overflow-hidden');
        }

    </script>
</x-layout>
