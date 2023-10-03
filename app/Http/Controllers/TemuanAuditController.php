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

    public function detail_temuan($id){

        return view('dashboard.temuan.detail_temuan', [
            'kertasKerja' => KertasKerjaAudit::find($id)
        ]);
    }



    public function store(Request $request)
    {
        

       
        $validatedData = $request->validate([
            'kertas_kerja_audit_id' => 'required|string|max:255',
            'tanggapan' => 'required|string|max:255',
            'lampiran' => 'string|max:255'
        ]);
    
            
            TanggapanAudit::create($validatedData);

        return redirect('/temuan')->with('success', 'Tanggapan diisi');
    }

    public function tanggapan(){

        return view('dashboard.tanggapan_auditee.index', [
            'tanggapan' => TanggapanAudit::all()
        ]);
    }
    
}
