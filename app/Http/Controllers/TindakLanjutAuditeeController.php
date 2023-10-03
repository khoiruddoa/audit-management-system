<?php

namespace App\Http\Controllers;

use App\Models\TanggapanAudit;
use App\Models\TindakLanjutAudit;
use Illuminate\Http\Request;

class TindakLanjutAuditeeController extends Controller
{
    public function index(){

    return view('dashboard.tindak_lanjut_auditee.index', [


        'tanggapan' => TanggapanAudit::where('status', '2')->get()
    ]);
}

public function store(Request $request)
{
    $data = new TindakLanjutAudit();
    $data->tanggapan_audit_id = $request->input('tanggapan_audit_id');
    $data->tindakan = $request->input('tindakan');
    $data->lampiran = $request->file('lampiran');
    // ...
    // Anda dapat menambahkan kolom-kolom lain yang perlu disimpan

    $data->save();

  
    return back()->with('success', 'tindak lanjut sukses');
}


}
