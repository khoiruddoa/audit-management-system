<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\ProgramKerjaAudit;
use Illuminate\Http\Request;

class DocumentAuditeeController extends Controller
{
    public function index($id)
    {
        return view('dashboard.pelaksanaan_audit.program_kerja_auditee.document.index', [

            'dokumen' => Document::where('program_kerja_audit_id', $id)->get(),
            'id' => $id
        ]);
    }


    public function update(Request $request, $id)
    {

        $data = Document::find($id);


        $validatedData = $request->validate([
            'link' => 'required|string',
            'nama_dokumen' => 'required|string',

        ]);


        $data->update($validatedData);

        return back()->with('success', 'link berhasil ditambahkan');

    }
}
