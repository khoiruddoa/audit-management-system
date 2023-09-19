<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use App\Models\Auditor;
use App\Models\PerencanaanAudit;
use App\Models\PustakaAudit;
use App\Models\SusunanTim;
use Illuminate\Http\Request;

class SusunanTimController extends Controller
{

    public function index($id)
    {
        return view('dashboard.pelaksanaan_audit.susunan_tim.index', [
            'audit' => PerencanaanAudit::find($id),
            
        ]);
    }
    
    public function create($id)
    {
        $audit = PerencanaanAudit::find($id);
        $auditor = Auditor::all();
        return view('dashboard.pelaksanaan_audit.susunan_tim.create', ['auditors' => $auditor,
    'audit' => $audit]);
    }
    
    public function store(Request $request)
    {
        $id = $request->perencanaan_audit_id;

        $validatedData = $request->validate([
            'auditor_id' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'perencanaan_audit_id' => 'required|string|max:255',
        ]);
        
        SusunanTim::create($validatedData);

        return redirect('/pelaksanaan_audit/susunan_tim/' . $id)->with('success', 'Tim Ditambahkan');

    }
    public function destroy($id)
    {
        $susunan = SusunanTim::findOrFail($id);
        $susunan->delete();

        return back()->with('success', 'Tim dihapus');
    }
}
