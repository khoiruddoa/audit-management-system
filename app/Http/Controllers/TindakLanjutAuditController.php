<?php

namespace App\Http\Controllers;

use App\Models\KertasKerjaAudit;
use App\Models\ProgramKerjaAudit;
use App\Models\TindakLanjutAudit;
use Illuminate\Http\Request;

class TindakLanjutAuditController extends Controller
{




    public function index()
    {

        return view('dashboard.pelaksanaan_audit.tindak_lanjut_auditee.index', [


            'tindakLanjut' => TindakLanjutAudit::all()
        ]);
    }

    public function store($id)
    {
        $data = new TindakLanjutAudit();
        $data->tanggapan_audit_id = $id;

        $data->save();
        return back()->with('success', 'Sukses');
    }

    public function detail($id)
    {

        $tindaklanjut = TindakLanjutAudit::find($id);
        return view('dashboard.pelaksanaan_audit.tindak_lanjut_auditee.detail', [


            'tindakLanjut' => $tindaklanjut
        ]);
    }
}
