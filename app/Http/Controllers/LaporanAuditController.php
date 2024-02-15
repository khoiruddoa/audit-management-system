<?php

namespace App\Http\Controllers;

use App\Models\PerencanaanAudit;
use Illuminate\Http\Request;
use PDF;


class LaporanAuditController extends Controller
{
    public function index()
    {
        return view('dashboard.laporan.index', [
            'audits' => PerencanaanAudit::whereIn('status', [1, 2])->latest()->get()

        ]);
    }

    public function cetak_pdf($id)
    {
    	$audit = PerencanaanAudit::findOrFail($id);

    	$pdf = PDF::loadview('pdf',['audit'=>$audit]);
    	return $pdf->download('laporan-Audit-pdf');
    }

    public function detail_pdf($id)
    {
    	$audit = PerencanaanAudit::findOrFail($id);

    	$pdf = PDF::loadview('pdf',['audit'=>$audit]);
        return $pdf->stream();    }
}
