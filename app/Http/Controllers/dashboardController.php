<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\PerencanaanAudit;
use Illuminate\Http\Request;

class dashboardController extends Controller
{



    public function index()
    {
        $open = Kegiatan::where('status', '0')->count();
        $onProgress = Kegiatan::where('status', '1')->count();
        $finish =  Kegiatan::where('status', '2')->count();

        $open_data = Kegiatan::where('status', '0')->latest()->get();
        $onProgress_data = Kegiatan::where('status', '1')->latest()->get();
        $finish_data =  Kegiatan::where('status', '2')->latest()->get();



        return view(
            'dashboard.dashboard',
            [
                'open' => $open,
                'onProgress' => $onProgress,
                'finish' => $finish,
                'open_data' => $open_data,
                'onProgress_data' => $onProgress_data,
                'finish_data' => $finish_data

            ]
        );
    }
    public function kegiatan($id)
    {
        $results = Kegiatan::find($id);

        $auditList = PerencanaanAudit::with('programKerjaAudit.kertasKerjaAudit')
        ->get();
    
    $auditeeData = [];
    
    // Inisialisasi data auditee dengan jumlah temuan 0
    foreach ($auditList as $audit) {
        $auditeeId = $audit->auditee_id;
        $auditeeName = $audit->auditee->auditee;
    
        if (!isset($auditeeData[$auditeeId])) {
            $auditeeData[$auditeeId] = [
                'nama_auditee' => $auditeeName,
                'jumlah_temuan' => 0,
            ];
        }
    }
    
    // Menghitung jumlah temuan
    foreach ($auditList as $audit) {
        foreach ($audit->programKerjaAudit as $program) {
            foreach ($program->kertasKerjaAudit as $temuan) {
                $auditeeId = $audit->auditee_id;
                $auditeeData[$auditeeId]['jumlah_temuan']++;
            }
        }
    }
    
  
    $namaAuditee = [];
    $jumlahTemuan = [];
    
    foreach ($auditeeData as $auditeeId => $data) {
        $namaAuditee[] = $data['nama_auditee'];
        $jumlahTemuan[] = $data['jumlah_temuan'];
    }



       



      $result = 0; 
if($results){

        $result = $results->kegiatan;
}

        return view(
            'dashboard.dashboard_kegiatan',
            [
                'result' => $result,
                'divisi' => $namaAuditee,
                'temuan' => $jumlahTemuan

            ]
        );
    }
}
