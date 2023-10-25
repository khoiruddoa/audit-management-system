<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use App\Models\Kegiatan;
use App\Models\PelaksanaanAudit;
use App\Models\PerencanaanAudit;
use App\Models\ProgramKerjaAudit;
use App\Models\PustakaAudit;
use Illuminate\Http\Request;

class PelaksanaanAuditController extends Controller
{
    public function index()
    {
        return view('dashboard.pelaksanaan_audit.index', [
            'audits' => PerencanaanAudit::where('status', 1)->latest()->get()
        ]);
    }

  

    public function create()
    {
        
       
        return view('dashboard.pelaksanaan_audit.create');
    }


    public function edit($id)
    {
        $auditee = Auditee::all();
        $jenis = PustakaAudit::all();
        $kegiatan = Kegiatan::all();
        $perencanaan = PerencanaanAudit::find($id);
        return view('dashboard.pelaksanaan_audit.edit', ['auditees' => $auditee, 'jenis' => $jenis, 'kegiatan' => $kegiatan, 'pelaksanaan' => $perencanaan]);
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

        return redirect('/pelaksanaan_audit')->with('success', 'Pelaksanaan  Diubah');

    }


    public function detail($id)
    {
        return view('dashboard.pelaksanaan_audit.detail', [
            'audit' => PerencanaanAudit::find($id)
        ]);
    }


    public function selesai($id){

        $audit = PerencanaanAudit::find($id);


        $program = ProgramKerjaAudit::where('perencanaan_audit_id', $audit->id)->where('status', null)->first();

        if($program){
            return back()->with('failed', 'Masih ada Program kerja yang belum selesai');

        }
        $audit->update(['status' => 2]);


        return redirect('/pelaksanaan_audit')->with('success', 'Audit Selesai');


    }



}
