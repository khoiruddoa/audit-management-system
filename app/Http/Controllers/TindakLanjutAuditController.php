<?php

namespace App\Http\Controllers;

use App\Models\KertasKerjaAudit;
use App\Models\ProgramKerjaAudit;
use App\Models\TindakLanjutAudit;
use Illuminate\Http\Request;

class TindakLanjutAuditController extends Controller
{
    public function index(){

        return view('dashboard.tindak_lanjut_auditee.index', [
    

            'kertaskerja' => KertasKerjaAudit::all()
        ]);
    }



    public function index_auditor(){

        return view('dashboard.pelaksanaan_audit.tindak_lanjut_auditee.index', [
    

            'tindakLanjut' => TindakLanjutAudit::all()
        ]);
    }


    public function store(Request $request)
    {
        $data = new TindakLanjutAudit();
        $data->kertas_kerja_audit_id = $request->input('kertas_kerja_audit_id');
        $data->tindakan = $request->input('tindakan');
        $data->lampiran = $request->file('lampiran');
        // ...
        // Anda dapat menambahkan kolom-kolom lain yang perlu disimpan
    
        $data->save();
    
        // Jika Anda memiliki file lampiran yang diunggah
        // if ($request->hasFile('lampiran')) {
        //     $lampiran = $request->file('lampiran');
        //     // Lakukan logika untuk menyimpan file lampiran sesuai kebutuhan
        // }
    
        // Lakukan redirect atau tindakan lainnya setelah penyimpanan berhasil

        return back()->with('success', 'tindak lanjut sukses');
    }
}
