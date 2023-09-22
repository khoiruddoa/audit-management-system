<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use App\Models\Kegiatan;
use App\Models\PustakaAudit;
use Illuminate\Http\Request;

class PustakaAuditController extends Controller
{
    public function index()
    {
        return view('dashboard.pustaka_audit.pustaka_program_audit.index', [
            'programs' => PustakaAudit::all()
        ]);
    }

    public function create()
    {
        $divisi = Auditee::all();
        return view('dashboard.pustaka_audit.pustaka_program_audit.create', ['divisi' => $divisi]);
    }

    public function edit($id)
    {
        $pustaka = PustakaAudit::find($id);
        $divisi = Auditee::all();
        return view('dashboard.pustaka_audit.pustaka_program_audit.edit', ['divisi' => $divisi, 'pustaka' => $pustaka]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'auditee_id' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tahapan' => 'required|string'
        ]);

        // Mengunggah file jika ada
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('file'), $filename);

            $validatedData['lampiran'] = url('/') . '/file/' . $filename;
        }



        PustakaAudit::create($validatedData);

        return redirect('pustaka_audit/pustaka_program_audit/')->with('success', 'Program Ditambahkan');
    }

    public function out_store(Request $request)
    {

     
       $validatedData = $request->validate([
            'auditee_id' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tahapan' => 'required|string'
        ]);
                                                                                                                                              
        PustakaAudit::create($validatedData);

        return back()->with('success', 'Program Kerja Ditambahkan');

    }



  
    public function update(Request $request, $id)
    {
        $data = PustakaAudit::find($id);
        $validatedData = $request->validate([
            'auditee_id' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tahapan' => 'required|string'
        ]);

        // Mengunggah file jika ada
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('file'), $filename);

            $validatedData['lampiran'] = url('/') . '/file/' . $filename;
        }



        $data->update($validatedData);

        return redirect('pustaka_audit/pustaka_program_audit/')->with('success', 'Program Ditambahkan');
    }

    public function destroy($id)
    {
        
        $data = PustakaAudit::findOrFail($id);
        $data->delete();

        return redirect('pustaka_audit/pustaka_program_audit/')->with('success', 'Program dihapus!!');
    }
}
