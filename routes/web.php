
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\KasatController;
use App\Http\Controllers\PengawasController;
use App\Http\Controllers\TUController;
use App\Models\Pengawas;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']); 
Route::get('/logout', [LoginController::class, 'destroy']);


//Route for kasat
Route::get('/kasat', [KasatController::class, 'index'])->name('kasat.dashboard');
//Rencana Kerja - Kasat
Route::get('/rencana-kerja-pengawas-kasat', [KasatController::class, 'rencanaKerjaPengawas'])->name('kasat.rencanaKerjaPengawasKasat');
Route::get('/rencana-kerja-pengawas-kasat/{nip}', [KasatController::class, 'showRencanaKerjaPengawas'])->name('kasat.detailRencanaKerja');
Route::post('/rencana-kerja-pengawas-kasat/ubah-status/{id}/{status}', [KasatController::class, 'ubahStatusRencanaKerja'])->name('kasat.ubahStatusRencanaKerja');
Route::post('/rencana-kerja-pengawas-kasat/ubah-semua-status/{status}', [KasatController::class, 'ubahSemuaStatusRencanaKerja'])->name('kasat.ubahSemuaStatusRencanaKerja');
//
Route::get('/aduan-kasat', [KasatController::class, 'aduan'])->name('kasat.aduanKasat');
Route::put('/aduan/{kode}/update-pengawas', [KasatController::class, 'updatePengawas'])->name('aduan.updatePengawas');
Route::put('/aduan/jadwalkan-aduan/{id}', [TUController::class, 'kirimToJadwalAduan'])->name('kasat.jadwalkanAduan');

Route::get('/laporan-kerja-pengawas', [KasatController::class, 'laporanKerjaPengawas'])->name('kasat.lapoaranKerjaPengawas');
Route::get('/laporan-kerja-pengawas/{nomor_spt}', [KasatController::class, 'showLaporanKerjaPengawas'])->where('nomor_spt', '.*')->name('kasat.detailLaporanKerja');

Route::get('/jadwal-kerja-pengawas-kasat', [KasatController::class, 'jadwalKerjaPengawas'])->name('kasat.jadwalKerjaPengawas');
Route::get('/events-kasat', [KasatController::class, 'getEventsKasat'])->name('getEventsKasat');

//Daftar Pengawas
Route::get('/daftar-pegawai', [KasatController::class, 'daftarPegawai'])->name('kasat.daftarPegawai');
Route::post('/daftar-pegawai/tambah-pengawas', [KasatController::class, 'tambahPengawas'])->name('kasat.tambahPengawas');
Route::match(['PUT', 'POST'], '/daftar-pegawai/edit/{nip}', [KasatController::class, 'editPegawai'])->name('kasat.updatePegawai');
Route::delete('/daftar-pegawai/hapus/{nip}', [KasatController::class, 'hapusPegawai'])->name('kasat.hapusPegawai');

//Route for TU
Route::get('/tu', [TUController::class, 'index'])->name('tu.dashboard');

// Rencana Kerja - TU
Route::get('/tu-daftar-rencana-kerja', [TUController::class, 'daftarRencanaKerja'])->name('tu.daftarRencanaKerja');
Route::get('/rencana-kerja-selected', [TUController::class, 'getRKSelected'])->name('tu.getRKSelected');

// Aduan - TU
Route::get('/aduan', [TUController::class, 'aduan'])->name('tu.aduan');
Route::get('/status-aduan-selected', [TUController::class, 'getAduanSelect'])->name('tu.getAduanSelected');
Route::get('/aduan/tambah-aduan', [TUController::class, 'formAduan'])->name('tu.formAduan');
Route::post('/aduan/submit', [TUController::class, 'submitAduan'])->name('tu.submitAduan');
Route::put('/aduan/kirim-aduan/{id}', [TUController::class, 'kirimAduan'])->name('tu.kirimAduan');
Route::post('/kirim-semua-aduan', [TUController::class, 'kirimSemuaAduan'])->name('tu.kirimSemuaAduan');

// Jadwal Kerja Pengawas - TU
Route::get('/jadwal-kerja-pengawas', [TUController::class, 'jadwalKerjaPengawas'])->name('tu.jadwalKerjaPengawas');
Route::get('/tambah-jadwal-pengawas', [TUController::class, 'formTambahJadwal'])->name('tu.formTambahJadwal');
Route::get('/aduan-selected', [TUController::class, 'getAduan'])->name('tu.getAduan');
Route::get('/pengawas-selected-rk', [TUController::class, 'getPengawasRK'])->name('tu.getPengawasRK');
Route::post('/tambah-jadwal', [TUController::class, 'tambahJadwal'])->name('tu.tambahJadwal');
Route::get('/events-tu', [TUController::class, 'getEventTU'])->name('tu.getEventTU');

//Route for Pengawas
// Dashboard - Pengawas
Route::get('/pengawas', [PengawasController::class, 'index'])->name('pengawas.dashboard');

// Rencana Kerja - Pengawas
Route::get('/rencana-kerja', [PengawasController::class, 'rencanaKerja'])->name('pengawas.rencanaKerja');
Route::get('/rencana-kerja/tambah-rencana-kerja', [PengawasController::class, 'formRencanaKerja'])->name('pengawas.tambahRencanaKerja');
Route::post('/rencana-kerja/submit', [PengawasController::class, 'submitRencanaKerja'])->name('pengawas.submitRencanaKerja');
Route::get('/rencana-kerja/edit/{id}', [PengawasController::class, 'editRencanaKerja'])->name('pengawas.editRencanaKerja');
Route::put('/rencana-kerja/update/{id}', [PengawasController::class, 'updateRencanaKerja'])->name('pengawas.updateRencanaKerja');
Route::post('/rencana-kerja/delete/{id}', [PengawasController::class, 'deleteRencanaKerja'])->name('pengawas.deleteRencanaKerja');
Route::get('/perusahaan', [PengawasController::class, 'getPerusahaan']);
Route::post('/perusahaan/tambah-perusahaan', [PengawasController::class, 'tambahPerusahaan'])->name('perusahaan.tambahPerusahaan');
Route::post('/perusahaan/check', [PengawasController::class, 'checkPerusahaan'])->name('perusahaan.check');

// Laporan Kerja - Pengawas
Route::get('/laporan-kerja', [PengawasController::class, 'laporanKerja'])->name('pengawas.laporanKerja');
Route::get('/laporan-kerja/tambah-laporan-kerja', [PengawasController::class, 'tambahLaporanKerja'])->name('pengawas.tambahLaporanKerja');
Route::post('/laporan-kerja/submit', [PengawasController::class, 'submitLaporanKerja'])->name('pengawas.submitLaporanKerja');
Route::get('/laporan-kerja/edit/{id}', [PengawasController::class, 'editLaporanKerja'])->name('pengawas.editLaporanKerja');
Route::put('/laporan-kerja/update/{id}', [PengawasController::class, 'updateLaporanKerja'])->name('pengawas.updateLaporanKerja');
Route::post('/laporan-kerja/delete/{id}', [PengawasController::class, 'deleteLaporanKerja'])->name('pengawas.deleteLaporanKerja');

// Jadwal Kerja - Pengawas
Route::get('/jadwal-kerja', [PengawasController::class, 'jadwalKerja'])->name('pengawas.jadwalKerja');
Route::get('/events', [PengawasController::class, 'getEvents'])->name('getEvents');


