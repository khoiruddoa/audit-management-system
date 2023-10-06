<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\PerencanaanAudit;
use App\Models\PustakaAudit;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    { $kegiatan =  Kegiatan::latest()->get();
 
        return view('dashboard.kegiatan_audit.index', [
            'kegiatan' => $kegiatan     ]);

    }

   

    public function create()
    {
        
        return view('dashboard.kegiatan_audit.create');
    }
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        if(!$kegiatan){
            return back()->with('failed', 'Data tidak ada');
        
        }
    
        return view('dashboard.kegiatan_audit.edit', ['kegiatan' => $kegiatan]);
    }


    public function store(Request $request)
    {
     
        $validatedData = $request->validate([
          
            'kegiatan' => 'required|string',
            
            'anggaran' => 'required|string'
        ]);
        $anggaran = str_replace('.', '', $validatedData['anggaran']);

        $validatedData['anggaran'] = $anggaran;
        $validatedData['status'] = 0;
        Kegiatan::create($validatedData);

        return redirect(route('kegiatan_audit'))->with('success', 'Kegiatan Ditambahkan');

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            
            'kegiatan' => 'required|string',
            'anggaran' => 'required|string'
        ]);

        $data = Kegiatan::findOrFail($id);

        if(!$data){
            return back()->with('failed', 'Kegiatan Audit tidak bisa diupdate');
        
        }

        $anggaran = str_replace('.', '', $validatedData['anggaran']);
        $validatedData['anggaran'] = $anggaran;
        $data->update($validatedData);

        return redirect(route('kegiatan_audit'))->with('success', 'Kegiatan Audit Diperbarui');
    }

    public function destroy($id)
    {

        $cek = PerencanaanAudit::where('kegiatan_id', $id)->first();
        if($cek){
            return redirect('/kegiatan_audit')->with('failed', 'Kegiatan sudah ada di perencanaan');
        }
       
        $data = Kegiatan::findOrFail($id);
        $data->delete();

        return back()->with('success', 'Kegiatan Dihapus');
    }

    public function finish(Request $request, $id)
    {
       
        $cek = PerencanaanAudit::where('kegiatan_id', $id)->first();
        if(!$cek){
            return back()->with('failed', 'Gagal');        }
        $data = Kegiatan::findOrFail($id);
        if($data){
            return back()->with('failed', 'Gagal');
        }
        $data->status = 2;
        $data->save(); 
    

        return redirect(route('kegiatan_audit'))->with('success', 'Kegiatan Audit selesai');
    }

    public function onProgress(Request $request, $id)
    {
       

        $data = Kegiatan::findOrFail($id);
       
        $data->status = 1;
        $data->save(); 
    

        return redirect(route('kegiatan_audit'))->with('success', 'Kegiatan Audit selesai');
    }

    public function cancel(Request $request, $id)
    {
       

        $data = Kegiatan::findOrFail($id);
       
        $cek = PerencanaanAudit::where('kegiatan_id', $id)->first();
        if($cek){
            return back()->with('failed', 'Gagal');        }
        $data->status = 0;
        $data->save(); 
    

        return redirect(route('kegiatan_audit'))->with('success', 'Kegiatan Audit selesai');
    }
}
