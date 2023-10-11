<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\ProgramKerjaAudit;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index($id)
    {
        return view('dashboard.perencanaan_audit.document.index', [
            'audit' => ProgramKerjaAudit::find($id),
            'dokumen' => Document::where('program_kerja_audit_id', $id)->get(),
            'id' => $id
        ]);
    }

  

  
    public function store(Request $request)
    {
      

    
        $validatedData = $request->validate([
            'program_kerja_audit_id' => 'required|string|max:255',
            'judul_dokumen' => 'required|string|max:255',
            'tempat' => 'required|string'
            
        ]);
        
        Document::create($validatedData);

        return back()->with('success', 'Dokumen Ditambahkan');

    }


    

    
    public function delete($id)
    {
      
        
        $data = Document::findOrFail($id);
        $data->delete();

       
        return back()->with('success', 'Dokumen dihapus');

    }

    public function update(Request $request, $id)
    {

        $data = Document::find($id);


        $validatedData = $request->validate([
            'judul_dokumen' => 'required|string|max:255',
            'tempat' => 'nullable|string'       
        ]);

       
        $data->update($validatedData);

        return back()->with('success', 'Document Diupdate');

    }
    public function out_update(Request $request, $id)
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
