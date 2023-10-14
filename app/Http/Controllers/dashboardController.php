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

        $audit = PerencanaanAudit::where('kegiatan_id', $id)->get();


        $divisi = [];
        $temuan = [];

        foreach ($audit as $auditItem) {
            $divisi[] = $auditItem->auditee->auditee;
            $total_temuan = 0;

            foreach ($auditItem->programKerjaAudit as $programItem) {
                foreach ($programItem->kertasKerjaAudit as $temuanItem) {
                    $jumlahTemuan = $temuanItem->count();
                    $total_temuan += $jumlahTemuan;
                }
            }

            $temuan[] = $total_temuan;
        }

       


        $result = $results->kegiatan;


        return view(
            'dashboard.dashboard_kegiatan',
            [
                'result' => $result,
                'divisi' => $divisi,
                'temuan' => $temuan

            ]
        );
    }
}
