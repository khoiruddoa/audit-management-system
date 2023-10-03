<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index($id)
    {
        return view('dashboard.perencanaan_audit.program_kerja_audit.document.index', [
     
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
                
        ]);

       
        $data->update($validatedData);

        return back()->with('success', 'link berhasil ditambahkan');

    }
}
