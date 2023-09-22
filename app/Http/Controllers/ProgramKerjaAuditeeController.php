<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerjaAudit;
use Illuminate\Http\Request;

class ProgramKerjaAuditeeController extends Controller
{
    public function index()
    {
        $program_kerja = ProgramKerjaAudit::all();
        return view('dashboard.pelaksanaan_audit.program_kerja_auditee.index', [
            
            'program_kerja' => $program_kerja
        ]);
    }

}
