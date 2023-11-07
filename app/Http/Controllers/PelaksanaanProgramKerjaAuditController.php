<?php

namespace App\Http\Controllers;



use App\Models\KertasKerjaAudit;
use App\Models\PerencanaanAudit;
use App\Models\ProgramKerjaAudit;
use App\Models\PustakaAudit;
use App\Models\SusunanTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelaksanaanProgramKerjaAuditController extends Controller
{
    public function index($id)
    {

        $program = ProgramKerjaAudit::where('perencanaan_audit_id', $id)->get();


        $user = Auth::user();

        // Check if the user has the admin, super admin, or lead auditor role
        if ($user->hasRole('admin') || $user->hasRole('super admin') || $user->hasRole('lead auditor')) {
            // Get all program audit data
            $programKerjaAudit = ProgramKerjaAudit::where('perencanaan_audit_id', $id)->get();
        } else {
            $userId = auth()->user()->id;

            $programKerjaAudit = ProgramKerjaAudit::where('perencanaan_audit_id', $id)->whereHas('susunanTim.auditor.user', function ($query) use ($userId) {
                $query->where('id', $userId);
            })->get();
        }

        $audit = PerencanaanAudit::find($id);
        $tim = SusunanTim::where('perencanaan_audit_id', $id)->get();

        return view('dashboard.pelaksanaan_audit.program_kerja_audit.index', [
            'audit' => $audit,
            'susunan_tims' => $tim,
            'program_kerja' => $programKerjaAudit
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
        $pustaka = $request->pustaka_audit_id;

        $validatedData = $request->validate([
            'perencanaan_audit_id' => 'required|string|max:255',
            'susunan_tim_id' => 'required|string|max:255',
            'pustaka_audit_id' => 'nullable|string|max:255',
            'waktu' => 'required|date',
            'tahapan' => 'required|string'
            
        ]);

        $cek = ProgramKerjaAudit::where('perencanaan_audit_id', $id)->where('pustaka_audit_id', $pustaka)->first();
        if($cek){
            return back()->with('failed', 'Program Kerja Sudah Ada');
        }

      
        ProgramKerjaAudit::create($validatedData);

        return redirect('/pelaksanaan_audit/program_kerja_audit/'.$id)->with('success', 'Program Kerja Ditambahkan');

    }





    public function edit($id)
    {

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
        if ($cek) {
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

        return redirect('/pelaksanaan_audit/program_kerja_audit/' . $id)->with('success', 'Program Kerja Diupdate');
    }

    public function finish($id)
    {

        $data = ProgramKerjaAudit::find($id);


        $cari = KertasKerjaAudit::where('program_kerja_audit_id', $data->id)->where('status', null)->first();


        if ($cari) {
            return back()->with('failed', 'Masih ada kertas kerja yang belum dikonfirmasi');
        }




        $data->update(['status' => '1']);

        return back()->with('success', 'Program Kerja Selesai');
    }

    public function cancel($id)
    {

        $data = ProgramKerjaAudit::find($id);







        $data->update(['status' => null]);

        return back()->with('success', 'Program Kerja batal');
    }
}
