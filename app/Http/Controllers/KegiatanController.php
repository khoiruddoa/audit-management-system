<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\PerencanaanAudit;
use App\Models\PustakaAudit;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        return view('dashboard.kegiatan_audit.index', [
            'kegiatan' => Kegiatan::all()
        ]);
    }

   

    public function create()
    {
        
        return view('dashboard.kegiatan_audit.create');
    }
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
    
        return view('dashboard.kegiatan_audit.edit', ['kegiatan' => $kegiatan]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
          
            'kegiatan' => 'required|string'
        ]);
        Kegiatan::create($validatedData);

        return redirect('/kegiatan_audit')->with('success', 'Kegiatan Ditambahkan');

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            
            'kegiatan' => 'required|string'
        ]);

        $data = Kegiatan::findOrFail($id);
        $data->update($validatedData);

        return redirect('/kegiatan_audit')->with('success', 'Auditee Diperbarui');
    }

    public function destroy($id)
    {

        $cek = PerencanaanAudit::where('kegiatan_id', $id)->first();
        if($cek){
            return redirect('/kegiatan_audit')->with('failed', 'Kegiatan sudah ada di perencanaan');
        }
        $cek2 = PustakaAudit::where('kegiatan_id', $id)->first();
        if($cek2){
            return redirect('/kegiatan_audit')->with('failed', 'Kegiatan sudah ada di pustaka audit');
        }
        $data = Kegiatan::findOrFail($id);
        $data->delete();

        return redirect('/kegiatan_audit')->with('success', 'Kegiatan Dihapus');
    }
}
