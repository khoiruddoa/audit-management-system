<?php

namespace App\Http\Controllers;

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
        $kegiatan = Kegiatan::all();
        return view('dashboard.pustaka_audit.pustaka_program_audit.create', ['kegiatan' => $kegiatan]);
    }

    public function edit($id)
    {
        $pustaka = PustakaAudit::find($id);
        $kegiatan = Kegiatan::all();
        return view('dashboard.pustaka_audit.pustaka_program_audit.edit', ['kegiatan' => $kegiatan, 'pustaka' => $pustaka]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kegiatan_id' => 'required|string|max:255',
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


    public function update(Request $request, $id)
    {
        $data = PustakaAudit::find($id);
        $validatedData = $request->validate([
            'kegiatan_id' => 'required|string|max:255',
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
