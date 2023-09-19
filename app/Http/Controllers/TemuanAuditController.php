<?php

namespace App\Http\Controllers;

use App\Models\KertasKerjaAudit;
use App\Models\PerencanaanAudit;
use App\Models\ProgramKerjaAudit;
use App\Models\TanggapanAudit;
use Illuminate\Http\Request;

class TemuanAuditController extends Controller
{
    public function index(){

        return view('dashboard.temuan.index', [
            'audits' => ProgramKerjaAudit::all()
        ]);
    }


    public function detail($id){

        return view('dashboard.temuan.detail', [
            'kertaskerja' => KertasKerjaAudit::where('program_kerja_audit_id', $id)->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = new TanggapanAudit();
        $data->kertas_kerja_audit_id = $request->input('kertas_kerja_audit_id');
        $data->tanggapan = $request->input('tanggapan');
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

        return redirect('/temuan')->with('success', 'Program Ditambahkan');
    }

    public function tanggapan(){

        return view('dashboard.tanggapan_auditee.index', [
            'tanggapan' => TanggapanAudit::all()
        ]);
    }
    
}
