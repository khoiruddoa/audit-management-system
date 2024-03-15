<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\KertasKerjaAudit;
use App\Models\ProgramKerjaAudit;
use App\Models\PustakaAudit;
use App\Models\ReferensiAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KertasKerjaAuditController extends Controller
{
    public function index($id)
    {
        return view('dashboard.pelaksanaan_audit.kertas_kerja_audit.index', [

            'program_kerja' => ProgramKerjaAudit::find($id),
            'kertas_kerja' => KertasKerjaAudit::where('program_kerja_audit_id', $id)->get(),
            'dokumen' => Document::where('program_kerja_audit_id', $id)->get()

        ]);
    }
    public function detail($id)
    {
        return view('dashboard.pelaksanaan_audit.kertas_kerja_audit.detail', [
            'kertas' => KertasKerjaAudit::find($id)
        ]);
    }

    public function create($id)
    {

        $program = ProgramKerjaAudit::find($id);

        if($program->status == 1){
            return back()->with('failed', 'Tidak dapat menambah kertas kerja, karena program kerja sudah selesai');

        }
        return view('dashboard.pelaksanaan_audit.kertas_kerja_audit.create', [

            'program_kerja' => $program,
            'referensi' => ReferensiAudit::all()

        ]);
    }

    public function edit($id)
    {

        $kertas = KertasKerjaAudit::find($id);

        $program_kerja = ProgramKerjaAudit::find($kertas->program_kerja_audit_id);
        return view('dashboard.pelaksanaan_audit.kertas_kerja_audit.edit', [
            'kertas' => $kertas,
            'program_kerja' => $program_kerja,
            'referensi' => ReferensiAudit::all()

        ]);
    }

    public function store(Request $request)
    {
        $id = $request->program_kerja_audit_id;


        $program = ProgramKerjaAudit::find($id);

        $auditor = $request->auditor;
        $auth = Auth()->user()->id;




        if($auditor != $auth){
            return back()->with('failed', 'Anda tidak ditugaskan dalam program kerja ini');

        }


        if($program->status == 1){
            return back()->with('failed', 'Tidak dapat menambah kertas kerja, karena program kerja sudah selesai');

        }

        $validatedData = $request->validate([
            'program_kerja_audit_id' => 'required',
            'temuan' => 'required',
            'tanggal' => 'required',
            'akibat' => 'required',
            'kondisi' => 'required',
            'kriteria' => 'required',
            'sebab' => 'required',
            'rekomendasi' => 'required',
            'batas_waktu' => 'required',
            'status' => 'nullable'
        ]);

        KertasKerjaAudit::create($validatedData);

        return redirect('/pelaksanaan_audit/kertas_kerja_audit/'.$id)->with('success', 'Kertas Kerja Ditambahkan');

    }
    public function update(Request $request, $id)
    {
        $data = KertasKerjaAudit::find($id);

        $id = $request->program_kerja_audit_id;

        $validatedData = $request->validate([
            'program_kerja_audit_id' => 'required',
            'temuan' => 'required',
            'tanggal' => 'required',
            'kondisi' => 'required',
            'kriteria' => 'required',
            'sebab' => 'required',
            'rekomendasi' => 'required',
            'batas_waktu' => 'required',
            'status' => 'nullable'
        ]);

        $data->update($validatedData);

        return redirect('/pelaksanaan_audit/kertas_kerja_audit/'.$id)->with('success', 'Kertas Kerja Diubah');

    }


    public function konfirmasi($id)
    {
        $data = KertasKerjaAudit::find($id);





        $data->update(["status" => "1"]);

        return back()->with('success', 'Kertas Kerja Dikonfirmasi');

    }


    public function batalKonfirmasi($id)
    {
        $data = KertasKerjaAudit::find($id);





        $data->update(["status" => Null]);

        return back()->with('success', 'Kertas Kerja batal Dikonfirmasi');

    }


    public function delete($id)
    {

        $data = KertasKerjaAudit::findOrFail($id);
        $data->delete();


        return back()->with('success', 'Kertas kerja dihapus');

    }
}
