<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use App\Models\Kegiatan;
use App\Models\PerencanaanAudit;
use App\Models\ProgramKerjaAudit;
use App\Models\PustakaAudit;
use App\Models\SusunanTim;
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
        $kegiatan = Kegiatan::where('status','1')->get();
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
        'nama_lampiran' => 'nullable|string|max:255',
        'periode' => 'required|string|max:255',
        'status' => 'nullable|string|max:255',
        'firstdate' => 'required|date',
        'enddate' => 'required|date',
        'link' => 'nullable|string',
        'dasar_audit' => 'required',
    ]);

    $id = $request->kegiatan_id;

    $cek = PerencanaanAudit::where('auditee_id', $request->auditee_id)->where('kegiatan_id', $id)->first();
    if($cek){
        return back()->with('failed', 'Auditee Sudah ada di Perencanaan Audit');
    }

        
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
        'nama_lampiran' => 'nullable|string|max:255',
        'periode' => 'required|string|max:255',
        'status' => 'nullable|string|max:255',
        'firstdate' => 'required|date',
        'enddate' => 'required|date',
        'link' => 'nullable',
        'dasar_audit' => 'required',
        'anggaran' =>'required'
    ]);
    
    

        
        $data->update($validatedData);

        return redirect('/perencanaan_audit')->with('success', 'Perencanaan Diubah');

    }

    public function lanjut($id){

        $audit = PerencanaanAudit::find($id);
        $cek = SusunanTim::where('perencanaan_audit_id', $id)->first();
        if(!$cek){
            return back()->with('failed', 'Isi Susunan Tim Terlebih dahulu');
        }

        $cek = ProgramKerjaAudit::where('perencanaan_audit_id', $id)->first();
        if(!$cek){
            return back()->with('failed', 'Isi Program Kerja Terlebih dahulu');
        }
        
        $audit->update(['status' => 1]);


        return redirect('/perencanaan_audit')->with('success', 'Status diubah');


    }

    public function destroy($id)
    {
        $cek = ProgramKerjaAudit::where('perencanaan_audit_id', $id)->first();
        if($cek){
            return back()->with('failed', 'Hapus Program Audit terlebih dahulu');
        }
        $perencanaan = PerencanaanAudit::findOrFail($id);
        $perencanaan->delete();

        return redirect('/perencanaan_audit')->with('success', 'Perencanaan dihapus!!');
    }
}
