<?php

namespace App\Http\Controllers;

use App\Models\TanggapanAudit;
use Illuminate\Http\Request;

class TanggapanAuditController extends Controller
{
    public function index(){

        return view('dashboard.pelaksanaan_audit.tanggapan_auditee.index', [
            'tanggapan' => TanggapanAudit::all()
        ]);
    }

    public function detail($id){

        return view('dashboard.pelaksanaan_audit.tanggapan_auditee.detail', [
            'tanggapan' => TanggapanAudit::find($id)
        ]);
    }
}
