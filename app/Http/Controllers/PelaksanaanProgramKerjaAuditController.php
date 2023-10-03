<?php

namespace App\Http\Controllers;



use App\Models\KertasKerjaAudit;
use App\Models\PerencanaanAudit;
use App\Models\ProgramKerjaAudit;
use App\Models\PustakaAudit;
use App\Models\SusunanTim;
use Illuminate\Http\Request;

class PelaksanaanProgramKerjaAuditController extends Controller
{
    public function index($id)
    {
        return view('dashboard.pelaksanaan_audit.program_kerja_audit.index', [
            'audit' => PerencanaanAudit::find($id),
            'susunan_tims' => SusunanTim::where('perencanaan_audit_id', $id)->get(),
            'program_kerja' => ProgramKerjaAudit::where('perencanaan_audit_id', $id)->get()
        ]);
    }

    public function create($id)
    {
        $audit = PerencanaanAudit::find($id);
        

        $program_kerja = PustakaAudit::where('auditee_id', $audit->auditee_id)->get();
        return view('dashboard.pelaksanaan_audit.program_kerja_audit.create', [
            'audit' => $audit,
            'susunan_tims' => SusunanTim::where('perencanaan_audit_id', $id)->get(),
            'program_kerja' => $program_kerja,
            
           
        ]);
    }


    public function detail($id)
    {
        return view('dashboard.pelaksanaan_audit.program_kerja_audit.detail', [
            'program' => ProgramKerjaAudit::find($id)
        ]);
    }
    public function store(Request $request)
    {
        $id = $request->perencanaan_audit_id;



        $validatedData = $request->validate([
            'perencanaan_audit_id' => 'required|string|max:255',
            'susunan_tim_id' => 'required|string|max:255',
            'pustaka_audit_id' => 'nullable|string|max:255',
            'waktu' => 'required|date',
            'tahapan' => 'required|string'
            
        ]);

      
        ProgramKerjaAudit::create($validatedData);

        return redirect('/perencanaan_audit/program_kerja_audit/'.$id)->with('success', 'Program Kerja Ditambahkan');

    }


    

    public function edit($id){

        $program = ProgramKerjaAudit::find($id);

        $audit = PerencanaanAudit::find($program->perencanaan_audit_id);

        $program_kerja = PustakaAudit::where('kegiatan_id', $audit->kegiatan_id)->get();
        return view('dashboard.pelaksanaan_audit.program_kerja_audit.edit', [
            'audit' => $audit,
            'susunan_tims' => SusunanTim::where('perencanaan_audit_id', $audit->id)->get(),
            'program_kerja' => $program_kerja,

           'program' => $program
        ]);

    }

    public function delete($id)
    {
        $cek = KertasKerjaAudit::where('program_kerja_audit_id', $id)->first();
        if($cek){
            return back()->with('failed', 'Program sudah ada di Kertas Kerja Audit');
        }
        
        $data = ProgramKerjaAudit::findOrFail($id);
        $data->delete();

       
        return back()->with('success', 'Program kerja dihapus');

    }

    public function update(Request $request, $id)
    {

        $data = ProgramKerjaAudit::find($id);

        $id = $data->perencanaan_audit_id;


        $validatedData = $request->validate([
            'susunan_tim_id' => 'required|string|max:255',
            'pustaka_audit_id' => 'nullable|string|max:255',
            'waktu' => 'required|date',
            'tahapan' => 'required|string'
            
        ]);

       
        $data->update($validatedData);

        return redirect('/pelaksanaan_audit/program_kerja_audit/'.$id)->with('success', 'Program Kerja Diupdate');

    }
}
