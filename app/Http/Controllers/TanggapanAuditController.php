<?php

namespace App\Http\Controllers;


use App\Models\TanggapanAudit;
use Illuminate\Http\Request;

class TanggapanAuditController extends Controller
{
    public function index(){

        $tanggapanBelumTindaklanjut = TanggapanAudit::whereDoesntHave('tindakLanjutAudit')->get();

        return view('dashboard.pelaksanaan_audit.tanggapan_auditee.index', [
            'tanggapan' => $tanggapanBelumTindaklanjut
        ]);
    }

    public function detail($id){

        return view('dashboard.pelaksanaan_audit.tanggapan_auditee.detail', [
            'tanggapan' => TanggapanAudit::find($id)
        ]);
    }

    public function sanggah(Request $request)
    {


        $tanggapan = TanggapanAudit::find($request->id);

        $validatedData = $request->validate([

           
            'komentar_auditor' => 'nullable|string|max:255'
        ]);

        $validatedData['status'] = '0';
        $tanggapan->update($validatedData);

        return back()->with('success', 'sukses');
    }
    
}
