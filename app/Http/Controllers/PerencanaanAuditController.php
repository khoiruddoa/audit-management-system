<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use App\Models\Kegiatan;
use App\Models\PerencanaanAudit;
use App\Models\PustakaAudit;
use Illuminate\Http\Request;

class PerencanaanAuditController extends Controller
{
    public function index()
    {
        return view('dashboard.perencanaan_audit.index', [
            'audits' => PerencanaanAudit::where('status', null)->latest()->get()
        ]);
    }
    public function detail($id)
    {
        return view('dashboard.perencanaan_audit.detail', [
            'audit' => PerencanaanAudit::find($id)
        ]);
    }

    public function schedule()
    {
        return view('dashboard.perencanaan_audit.schedule', [
            'audits' => PerencanaanAudit::all()
        ]);
    }

    public function create()
    {
        $auditee = Auditee::all();
        $jenis = PustakaAudit::all();
        $kegiatan = Kegiatan::where('status','0')->get();
        return view('dashboard.perencanaan_audit.create', ['auditees' => $auditee, 'jenis' => $jenis, 'kegiatan' => $kegiatan]);
    }


   


    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'kegiatan_id' => 'required|string|max:255',
        'jenis_audit' => 'required|string|max:255',
        'jenis_program_audit' => 'required|string|max:255',
        'tingkat_resiko' => 'required|string|max:255',
        'auditee_id' => 'required|exists:auditees,id',
        'lampiran' => 'nullable|string|max:255',
        'periode' => 'required|string|max:255',
        'status' => 'nullable|string|max:255',
        'firstdate' => 'required|date',
        'enddate' => 'required|date',
        'file' => 'nullable',
        'dasar_audit' => 'required',
        // 'anggaran' =>'required'
    ]);

        
        PerencanaanAudit::create($validatedData);

        return redirect('/perencanaan_audit')->with('success', 'Perencanaan Ditambahkan');

    }


    public function edit($id)
    {
        $auditee = Auditee::all();
        $jenis = PustakaAudit::all();
        $kegiatan = Kegiatan::all();
        $perencanaan = PerencanaanAudit::find($id);
        return view('dashboard.perencanaan_audit.edit', ['auditees' => $auditee, 'jenis' => $jenis, 'kegiatan' => $kegiatan, 'perencanaan' => $perencanaan]);
    }

    public function update(Request $request, $id)
    {

        $data = PerencanaanAudit::find($id);
        $validatedData = $request->validate([
        'kegiatan_id' => 'required|string|max:255',
        'jenis_audit' => 'required|string|max:255',
        'jenis_program_audit' => 'required|string|max:255',
        'tingkat_resiko' => 'required|string|max:255',
        'auditee_id' => 'required|exists:auditees,id',
        'lampiran' => 'nullable|string|max:255',
        'periode' => 'required|string|max:255',
        'status' => 'nullable|string|max:255',
        'firstdate' => 'required|date',
        'enddate' => 'required|date',
        'file' => 'nullable',
        'dasar_audit' => 'required',
        'anggaran' =>'required'
    ]);
    
    

        
        $data->update($validatedData);

        return redirect('/perencanaan_audit')->with('success', 'Perencanaan Diubah');

    }

    public function lanjut($id){

        $audit = PerencanaanAudit::find($id);
        $audit->update(['status' => 1]);


        return redirect('/perencanaan_audit')->with('success', 'Status diubah');


    }

    public function destroy($id)
    {
        
        $perencanaan = PerencanaanAudit::findOrFail($id);
        $perencanaan->delete();

        return redirect('/perencanaan_audit')->with('success', 'Perencanaan dihapus!!');
    }
}
