<?php

use App\Http\Controllers\AuditeeController;
use App\Http\Controllers\AuditorController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\DocumentAuditeeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KertasKerjaAuditController;
use App\Http\Controllers\LaporanAuditController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelaksanaanAuditController;
use App\Http\Controllers\PelaksanaanProgramKerjaAuditController;
use App\Http\Controllers\PerencanaanAuditController;
use App\Http\Controllers\ProgramKerjaAuditController;
use App\Http\Controllers\ProgramKerjaAuditeeController;
use App\Http\Controllers\PustakaAuditController;
use App\Http\Controllers\ReferensiAuditController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\SusunanTimController;
use App\Http\Controllers\TanggapanAuditController;
use App\Http\Controllers\TemuanAuditController;
use App\Http\Controllers\TindakLanjutAuditController;
use App\Http\Controllers\TindakLanjutAuditeeController;
use App\Models\Document;
use App\Models\PerencanaanAudit;
use App\Models\ProgramKerjaAudit;
use App\Models\PustakaAudit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/test1', [dashboardController::class, 'test'])->middleware('permission:lihat dashboard');
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/', [dashboardController::class, 'index'])->middleware('auth')->name('dashboard')->middleware('permission:lihat dashboard');

    Route::get('/kegiatan_audit_dashboard/{id}', [dashboardController::class, 'kegiatan'])->name('dashboard_kegiatan')->middleware('permission:lihat dashboard kegiatan');



    //kegiatan audit

    Route::get('/kegiatan_audit', [KegiatanController::class, 'index'])->name('kegiatan_audit')->middleware('permission:lihat kegiatan audit');
    Route::get('/kegiatan_audit/create', [KegiatanController::class, 'create'])->name('kegiatan_audit_create')->middleware('permission:membuat kegiatan audit');
    Route::get('/kegiatan_audit/edit/{id}', [KegiatanController::class, 'edit'])->name('kegiatan_audit_edit')->middleware('permission:edit kegiatan audit');
    Route::post('/kegiatan_audit/store', [KegiatanController::class, 'store'])->name('kegiatan_audit_store')->middleware('permission:simpan kegiatan audit');

    Route::post('/kegiatan_audit/update/{id}', [KegiatanController::class, 'update'])->name('kegiatan_audit_update')->middleware('permission:update kegiatan audit');
    Route::get('/kegiatan_audit/delete/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan_audit_delete')->middleware('permission:hapus kegiatan audit');
    Route::get('/kegiatan_audit/finish/{id}', [KegiatanController::class, 'finish'])->name('kegiatan_audit_finish')->middleware('permission:finish kegiatan audit');
    Route::get('/kegiatan_audit/on_progress/{id}', [KegiatanController::class, 'onProgress'])->name('kegiatan_audit_onProgress')->middleware('permission:onprogress kegiatan audit');
    Route::get('/kegiatan_audit/cancel/{id}', [KegiatanController::class, 'cancel'])->name('kegiatan_audit_cancel')->middleware('permission:cancel kegiatan audit');


    //perencanaan audit

    Route::get('/perencanaan_audit', [PerencanaanAuditController::class, 'index'])->name('perencanaan_audit')->middleware('permission:lihat perencanaan audit');
    Route::get('/perencanaan_audit/detail/{id}', [PerencanaanAuditController::class, 'detail'])->name('perencanaan_audit_detail')->middleware('permission:detail perencanaan audit');

    Route::get('/perencanaan_audit/delete/{id}', [PerencanaanAuditController::class, 'destroy'])->name('perencanaan_audit_delete')->middleware('permission:hapus perencanaan audit');
    Route::get('/perencanaan_audit/status/{id}', [PerencanaanAuditController::class, 'lanjut'])->name('perencanaan_audit_status')->middleware('permission:lanjut perencanaan audit');
    Route::get('/perencanaan_audit/create', [PerencanaanAuditController::class, 'create'])->name('perencanaan_audit_create')->middleware('permission:membuat perencanaan audit');
    Route::get('/perencanaan_audit/edit/{id}', [PerencanaanAuditController::class, 'edit'])->name('perencanaan_audit_edit')->middleware('permission:edit perencanaan audit');
    Route::post('/perencanaan_audit/store', [PerencanaanAuditController::class, 'store'])->name('perencanaan_audit_store')->middleware('permission:simpan perencanaan audit');
    Route::post('/perencanaan_audit/update/{id}', [PerencanaanAuditController::class, 'update'])->name('perencanaan_audit_update')->middleware('permission:update perencanaan audit');

    Route::get('/perencanaan_audit/schedule', [PerencanaanAuditController::class, 'schedule'])->name('perencanaan_audit_schedule')->middleware('permission:jadwal perencanaan audit');


    //program kerja di perencanaan audit

    Route::get('/perencanaan_audit/program_kerja_audit/{id}', [ProgramKerjaAuditController::class, 'index'])->name('program_kerja_audit')->middleware('permission:lihat program kerja audit');
    Route::get('/perencanaan_audit/program_kerja_audit/detail/{id}', [ProgramKerjaAuditController::class, 'detail'])->name('program_kerja_audit_detail')->middleware('permission:detail program kerja audit');
    Route::get('/perencanaan_audit/program_kerja_audit/create/{id}', [ProgramKerjaAuditController::class, 'create'])->name('program_kerja_audit_create')->middleware('permission:membuat program kerja audit');
    Route::post('perencanaan_audit/program_kerja_audit/store', [ProgramKerjaAuditController::class, 'store'])->name('program_kerja_audit_store')->middleware('permission:simpan program kerja audit');
    Route::post('perencanaan_audit/program_kerja_audit/update/{id}', [ProgramKerjaAuditController::class, 'update'])->name('program_kerja_audit_update')->middleware('permission:update program kerja audit');
    Route::get('/perencanaan_audit/program_kerja_audit/edit/{id}', [ProgramKerjaAuditController::class, 'edit'])->name('program_kerja_audit_edit')->middleware('permission:edit program kerja audit');
    Route::get('/perencanaan_audit/program_kerja_audit/delete/{id}', [ProgramKerjaAuditController::class, 'delete'])->name('program_kerja_audit_delete')->middleware('permission:hapus program kerja audit ');
    Route::post('/pustaka_audit/pustaka_program_audit/out_store', [PustakaAuditController::class, 'out_store'])->name('pustaka_program_audit_out_store')->middleware('permission:tambah pustaka audit-program audit');


    //dokumen di perencanaan audit

    Route::get('/perencanaan_audit/program_kerja_audit/document/{id}', [DocumentController::class, 'index'])->name('program_kerja_audit_document')->middleware('permission:lihat dokumen program kerja audit');
    Route::post('perencanaan_audit/program_kerja_audit/document/store', [DocumentController::class, 'store'])->name('program_kerja_audit_document_store')->middleware('permission:simpan dokumen program kerja audit');
    Route::post('perencanaan_audit/program_kerja_audit/document/update/{id}', [DocumentController::class, 'update'])->name('program_kerja_audit_document_update')->middleware('permission:update dokumen program kerja audit');
    Route::get('/perencanaan_audit/program_kerja_audit/document/delete/{id}', [DocumentController::class, 'delete'])->name('program_kerja_audit_document_delete')->middleware('permission:hapus dokumen program kerja audit');

    //tim di perencanaan audit

    Route::get('perencanaan_audit/susunan_tim/{id}', [SusunanTimController::class, 'index'])->name('susunan_tim')->middleware('permission:lihat tim audit');
    Route::get('perencanaan_audit/susunan_tim/delete/{id}', [SusunanTimController::class, 'destroy'])->name('susunan_tim_delete')->middleware('permission:hapus tim audit');
    Route::get('perencanaan_audit/susunan_tim/create/{id}', [SusunanTimController::class, 'create'])->name('susunan_tim_create')->middleware('permission:membuat tim audit');
    Route::post('perencanaan_audit/susunan_tim/store', [SusunanTimController::class, 'store'])->name('susunan_tim_store')->middleware('permission:simpan tim audit');






    //pelaksanaan audit


    Route::get('/pelaksanaan_audit', [PelaksanaanAuditController::class, 'index'])->name('pelaksanaan_audit')->middleware('permission:lihat pelaksanaan audit');
    Route::get('/pelaksanaan_audit/edit/{id}', [PelaksanaanAuditController::class, 'edit'])->name('pelaksanaan_audit_edit')->middleware('permission:edit pelaksanaan audit');
    Route::post('/pelaksanaan_audit/update/{id}', [PelaksanaanAuditController::class, 'update'])->name('pelaksanaan_audit_update')->middleware('permission:update pelaksanaan audit');
    Route::get('/pelaksanaan_audit/detail/{id}', [PelaksanaanAuditController::class, 'detail'])->name('pelaksanaan_audit_detail')->middleware('permission:detail pelaksanaan audit');
    Route::get('/pelaksanaan_audit/status/{id}', [PelaksanaanAuditController::class, 'selesai'])->name('pelaksanaan_audit_status')->middleware('permission:selesai pelaksanaan audit');

    //program kerja audit di pelaksanaan
    Route::get('/pelaksanaan_audit/program_kerja_audit/{id}', [PelaksanaanProgramKerjaAuditController::class, 'index'])->name('pelaksanaan_program_kerja_audit')->middleware('permission:lihat program kerja audit di pelaksanaan');
    Route::get('/pelaksanaan_audit/program_kerja_audit/detail/{id}', [PelaksanaanProgramKerjaAuditController::class, 'detail'])->name('pelaksanaan_program_kerja_audit_detail')->middleware('permission:detail program kerja audit di pelaksanaan');
    Route::get('/pelaksanaan_audit/program_kerja_audit/create/{id}', [PelaksanaanProgramKerjaAuditController::class, 'create'])->name('pelaksanaan_program_kerja_audit_create')->middleware('permission:membuat program kerja audit di pelaksanaan');
    Route::post('pelaksanaan_audit/program_kerja_audit/store', [PelaksanaanProgramKerjaAuditController::class, 'store'])->name('pelaksanaan_program_kerja_audit_store')->middleware('permission:simpan program kerja audit di pelaksanaan');
    Route::post('pelaksanaan_audit/program_kerja_audit/update/{id}', [PelaksanaanProgramKerjaAuditController::class, 'update'])->name('pelaksanaan_program_kerja_audit_update')->middleware('permission:update program kerja audit di pelaksanaan');
    Route::get('/pelaksanaan_audit/program_kerja_audit/edit/{id}', [PelaksanaanProgramKerjaAuditController::class, 'edit'])->name('pelaksanaan_program_kerja_audit_edit')->middleware('permission:edit program kerja audit di pelaksanaan');
    Route::get('/pelaksanaan_audit/program_kerja_audit/delete/{id}', [PelaksanaanProgramKerjaAuditController::class, 'delete'])->name('pelaksanaan_program_kerja_audit_delete')->middleware('permission:hapus program kerja audit di pelaksanaan');
    Route::get('/pelaksanaan_audit/program_kerja_audit/finish/{id}', [PelaksanaanProgramKerjaAuditController::class, 'finish'])->name('pelaksanaan_program_kerja_audit_finish')->middleware('permission:hapus program kerja audit di pelaksanaan');
    Route::get('/pelaksanaan_audit/program_kerja_audit/cancel/{id}', [PelaksanaanProgramKerjaAuditController::class, 'cancel'])->name('pelaksanaan_program_kerja_audit_cancel')->middleware('permission:hapus program kerja audit di pelaksanaan');


    //kertas kerja audit
    Route::get('/pelaksanaan_audit/kertas_kerja_audit/{id}', [KertasKerjaAuditController::class, 'index'])->name('kertas_kerja_audit')->middleware('permission:lihat kertas kerja audit');
    Route::get('/pelaksanaan_audit/kertas_kerja_audit/create/{id}', [KertasKerjaAuditController::class, 'create'])->name('kertas_kerja_audit_create')->middleware('permission:membuat kertas kerja audit');
    Route::post('/pelaksanaan_audit/kertas_kerja_audit/store', [KertasKerjaAuditController::class, 'store'])->name('kertas_kerja_audit_store')->middleware('permission:simpan kertas kerja audit');
    Route::get('/pelaksanaan_audit/kertas_kerja_audit/detail/{id}', [KertasKerjaAuditController::class, 'detail'])->name('kertas_kerja_audit_detail')->middleware('permission:detail kertas kerja audit');
    Route::post('pelaksanaan_audit/kertas_kerja_audit/update/{id}', [KertasKerjaAuditController::class, 'update'])->name('kertas_kerja_audit_update')->middleware('permission:update kertas kerja audit');
    Route::get('/pelaksanaan_audit/kertas_kerja_audit/edit/{id}', [KertasKerjaAuditController::class, 'edit'])->name('kertas_kerja_audit_edit')->middleware('permission:edit kertas kerja audit');
    Route::get('/pelaksanaan_audit/kertas_kerja_audit/delete/{id}', [KertasKerjaAuditController::class, 'delete'])->name('kertas_kerja_audit_delete')->middleware('permission:hapus kertas kerja audit');
    Route::get('/pelaksanaan_audit/kertas_kerja_audit/konfirmasi/{id}', [KertasKerjaAuditController::class, 'konfirmasi'])->name('kertas_kerja_audit_konfirmasi')->middleware('permission:konfirmasi kertas kerja audit');
    Route::get('/pelaksanaan_audit/kertas_kerja_audit/batal-konfirmasi/{id}', [KertasKerjaAuditController::class, 'batalKonfirmasi'])->name('kertas_kerja_audit_batal_konfirmasi')->middleware('permission:batal konfirmasi kertas kerja audit');


//tindak lanjut dari sisi auditor

    Route::get('/tindaklanjut/auditor', [TindakLanjutAuditController::class, 'index'])->name('tindaklanjut_audit_auditor')->middleware('permission:lihat tindak lanjut auditor');
    Route::get('/tindaklanjut/auditor/detail/{id}', [TindakLanjutAuditController::class, 'detail'])->name('tindak_lanjut_audit_detail')->middleware('permission:detail tindak lanjut auditor');
    Route::get('/tindaklanjut/store/{id}', [TindakLanjutAuditController::class, 'store'])->name('tindak_lanjut_audit_store')->middleware('permission:simpan tindak lanjut auditor');
    Route::get('/tindaklanjut/confirm/{id}', [TindakLanjutAuditController::class, 'confirm'])->name('tindak_lanjut_audit_confirm')->middleware('permission:konfirmasi tindak lanjut auditor');


    //temuan dari sisi auditee
    Route::get('/temuan', [TemuanAuditController::class, 'index'])->name('temuan_audit')->middleware('permission:lihat program temuan');
    Route::get('/temuan/detail/{id}', [TemuanAuditController::class, 'detail'])->name('temuan_audit_detail')->middleware('permission:detail program temuan');
    Route::get('/temuan/detail-sudah-ditanggapi/{id}', [TemuanAuditController::class, 'sudahDitanggapi'])->name('temuan_audit_detail_sudah_ditanggapi')->middleware('permission:lihat program temuan ditanggapi');
    Route::get('/temuan/detail-tinjau-ulang/{id}', [TemuanAuditController::class, 'tinjauUlang'])->name('temuan_audit_detail_tinjau_ulang')->middleware('permission:lihat program temuan tinjau ulang');
    Route::get('/temuan/detail_tindak_lanjut/{id}', [TemuanAuditController::class, 'tindakLanjut'])->name('temuan_audit_detail_tindak_lanjut')->middleware('permission:lihat program temuan tindak lanjut');
    Route::get('/temuan/detail-temuan/{id}', [TemuanAuditController::class, 'detail_temuan'])->name('temuan_audit_detail_temuan')->middleware('permission:detail temuan');
    Route::post('/temuan/store', [TemuanAuditController::class, 'store'])->name('tanggapan_audit_store')->middleware('permission:simpan tanggapan');
    Route::post('/temuan/restore', [TemuanAuditController::class, 'restore'])->name('tanggapan_audit_restore')->middleware('permission:simpan tanggapan ulang');
    Route::get('/tanggapan', [TemuanAuditController::class, 'tanggapan'])->name('tanggapan_audit')->middleware('permission:lihat tanggapan');





//tindak lanjut dari sisi auditee

    Route::get('/tindak_lanjut_auditee', [TindakLanjutAuditeeController::class, 'index'])->name('tindaklanjut_auditee')->middleware('permission:lihat tindak lanjut auditee');
   // Route::post('/tindak_lanjut_auditee/store', [TindakLanjutAuditeeController::class, 'update'])->name('tindak_lanjut_auditee_store')->middleware('permission:simpan tindak lanjut auditee');
    Route::post('/tindak_lanjut_auditee/store', [TindakLanjutAuditeeController::class, 'update'])->name('tindak_lanjut_auditee_store');

    Route::get('/tindak_lanjut_auditee/detail/{id}', [TindakLanjutAuditeeController::class, 'detail'])->name('tindak_lanjut_auditee_detail')->middleware('permission:detail tindak lanjut auditee');


    // Route::get('/pelaksanaan_audit/surat_tugas/create/{id}', [SuratTugasController::class, 'index'])->name('surat_tugas');
    //Route::post('/pelaksanaan_audit/surat_tugas/store', [SuratTugasController::class, 'store'])->name('surat_tugas_store');






    Route::get('program_kerja_auditee', [ProgramKerjaAuditeeController::class, 'index'])->name('program_kerja_audit_document_auditee')->middleware('permission:lihat program kerja auditee');
    Route::get('document_auditee/{id}', [DocumentAuditeeController::class, 'index'])->name('kelengkapan_document_auditee')->middleware('permission:lihat dokumen auditee');
    Route::post('document_upload/{id}', [DocumentAuditeeController::class, 'update'])->name('upload_link_document')->middleware('permission:update dokumen auditee');










    Route::get('/pelaksanaan_audit/tanggapan_auditee', [TanggapanAuditController::class, 'index'])->name('tanggapan_auditee_auditor')->middleware('permission:lihat tanggapan auditee');
    Route::get('/pelaksanaan_audit/tanggapan_auditee/{id}', [TanggapanAuditController::class, 'detail'])->name('tanggapan_auditee_auditor_detail')->middleware('permission:detail tanggapan auditee');
    Route::post('/pelaksanaan_audit/tanggapan_auditee/sanggah', [TanggapanAuditController::class, 'sanggah'])->name('sanggah_tanggapan')->middleware('permission:sanggah tanggapan auditee');






    Route::get('/manajemen_role', [RoleController::class, 'index'])->name('manajemen_role')->middleware('permission:lihat manajemen role');
    Route::get('/manajemen_role/create', [RoleController::class, 'create'])->name('manajemen_role_create')->middleware('permission:membuat manajemen role');
    Route::post('/manajemen_role/store', [RoleController::class, 'store'])->name('manajemen_role_store')->middleware('permission:simpan manajemen role');

    Route::get('/manajemen_role/detail/{id}', [RoleController::class, 'detail'])->name('manajemen_role_detail')->middleware('permission:detail manajemen role');
    Route::post('/manajemen_role_permission', [RoleController::class, 'store_permission'])->name('manajemen_role_permission')->middleware('permission:simpan permission manajemen role');


    Route::get('/manajemen_pegawai', [RegisterController::class, 'index'])->name('manajemen_pegawai')->middleware('permission:lihat manajemen pegawai');
    Route::get('/manajemen_pegawai/detail/{id}', [RegisterController::class, 'detail'])->name('manajemen_pegawai_detail')->middleware('permission:detail manajemen pegawai');
    Route::get('/manajemen_pegawai/create', [RegisterController::class, 'create'])->name('manajemen_pegawai_create')->middleware('permission:membuat manajemen pegawai');
    Route::get('/manajemen_pegawai/edit/{id}', [RegisterController::class, 'edit'])->name('manajemen_pegawai_edit')->middleware('permission:edit manajemen pegawai');
    Route::post('/manajemen_pegawai/store', [RegisterController::class, 'store'])->name('manajemen_pegawai_store')->middleware('permission:simpan manajemen pegawai');
    Route::post('/manajemen_pegawai/update/{id}', [RegisterController::class, 'update'])->name('manajemen_pegawai_update')->middleware('permission:update manajemen pegawai');
    Route::get('/manajemen_pegawai/delete/{id}', [RegisterController::class, 'destroy'])->name('manajemen_pegawai_delete')->middleware('permission:hapus manajemen pegawai');


    Route::get('/manajemen_auditor', [AuditorController::class, 'index'])->name('manajemen_auditor')->middleware('permission:lihat manajemen auditor');
    Route::get('/manajemen_auditor/create', [AuditorController::class, 'create'])->name('manajemen_auditor_create')->middleware('permission:membuat manajemen auditor');
    Route::post('/manajemen_auditor/store', [AuditorController::class, 'store'])->name('manajemen_auditor_store')->middleware('permission:simpan manajemen auditor');
    Route::get('/manajemen_auditor/delete/{id}', [AuditorController::class, 'destroy'])->name('manajemen_auditor_delete')->middleware('permission:hapus manajemen auditor');



    Route::get('/manajemen_auditee', [AuditeeController::class, 'index'])->name('manajemen_auditee')->middleware('permission:lihat manajemen auditee');
    Route::get('/manajemen_auditee/create', [AuditeeController::class, 'create'])->name('manajemen_auditee_create')->middleware('permission:membuat manajemen auditee');
    Route::get('/manajemen_auditee/edit/{id}', [AuditeeController::class, 'edit'])->name('manajemen_auditee_edit')->middleware('permission:edit manajemen auditee');
    Route::get('/manajemen_auditee/detail/{id}', [AuditeeController::class, 'detail'])->name('manajemen_auditee_detail')->middleware('permission:detail manajemen auditee');

    Route::get('/manajemen_auditee/delete/{id}', [AuditeeController::class, 'destroy'])->name('manajemen_auditee_delete')->middleware('permission:hapus manajemen auditee');
    Route::post('/manajemen_auditee/store', [AuditeeController::class, 'store'])->name('manajemen_auditee_store')->middleware('permission:simpan manajemen auditee');
    Route::post('/manajemen_auditee/update/{id}', [AuditeeController::class, 'update'])->name('manajemen_auditee_update')->middleware('permission:update manajemen auditee');





    Route::get('/pustaka_audit/pustaka_program_audit', [PustakaAuditController::class, 'index'])->name('pustaka_program_audit')->middleware('permission:lihat pustaka audit');
    Route::get('/pustaka_audit/pustaka_program_audit/create', [PustakaAuditController::class, 'create'])->name('pustaka_program_audit_create')->middleware('permission:membuat pustaka audit');
    Route::post('/pustaka_audit/pustaka_program_audit/store', [PustakaAuditController::class, 'store'])->name('pustaka_program_audit_store')->middleware('permission:simpan pustaka audit');
    Route::get('/pustaka_audit/pustaka_program_audit/edit/{id}', [PustakaAuditController::class, 'edit'])->name('pustaka_program_audit_edit')->middleware('permission:edit pustaka audit');
    Route::post('/pustaka_audit/pustaka_program_audit/update/{id}', [PustakaAuditController::class, 'update'])->name('pustaka_program_audit_update')->middleware('permission:update pustaka audit');
    Route::get('/pustaka_audit/pustaka_program_audit/delete/{id}', [PustakaAuditController::class, 'destroy'])->name('pustaka_program_audit_delete')->middleware('permission:hapus pustaka audit');


    Route::get('/pustaka_audit/pustaka_referensi_audit', [ReferensiAuditController::class, 'index'])->name('pustaka_referensi_audit')->middleware('permission:');
    Route::get('/pustaka_audit/pustaka_referensi_audit/create', [ReferensiAuditController::class, 'create'])->name('pustaka_referensi_audit_create')->middleware('permission:');
    Route::post('/pustaka_audit/pustaka_referensi_audit/store', [ReferensiAuditController::class, 'store'])->name('pustaka_referensi_audit_store')->middleware('permission:');



    Route::get('/laporan', [LaporanAuditController::class, 'index'])->name('laporan_audit')->middleware('permission:lihat laporan');
    Route::get('/laporan/cetak/{id}', [LaporanAuditController::class, 'cetak_pdf'])->name('laporan_audit_cetak')->middleware('permission:cetak laporan');
    Route::get('/laporan/detail/{id}', [LaporanAuditController::class, 'detail_pdf'])->name('laporan_audit_detail')->middleware('permission:detail laporan');
});
