<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerjaAudit;
use Illuminate\Http\Request;

class ProgramKerjaAuditeeController extends Controller
{
    public function index()
    {


        $auditeeIds = auth()->user()->auditees->pluck('id')->toArray();

        $program_kerja = ProgramKerjaAudit::whereHas('perencanaanAudit', function ($query) use ($auditeeIds) {
            $query->whereIn('auditee_id', $auditeeIds);
        })->get();

        return view('dashboard.pelaksanaan_audit.program_kerja_auditee.index', [

            'program_kerja' => $program_kerja
        ]);
    }

}
