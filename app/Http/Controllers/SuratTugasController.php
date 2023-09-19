<?php

namespace App\Http\Controllers;

use App\Models\PerencanaanAudit;
use App\Models\SuratTugas;
use Illuminate\Http\Request;

class SuratTugasController extends Controller
{
    public function index($id){
$audit = PerencanaanAudit::find($id);
$suratTugas = SuratTugas::where('perencanaan_audit_id', $id)->latest()->first();
return view('dashboard.pelaksanaan_audit.surat_tugas.create', ['suratTugas' => $suratTugas, 'audit' => $audit]);

    }



public function store(Request $request)
    {
        $validatedData = $request->validate([
            'perencanaan_audit_id' => 'required',
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'tujuan' => 'required',
            'tempat' => 'required',
            'keterangan' => 'required',
            'penanda_tangan' => 'required',
            'jabatan' => 'required',
            'tembusan' => 'nullable',
        ]);

        $surat = SuratTugas::create($validatedData);

        // Jika ingin melakukan sesuatu setelah menyimpan surat, tambahkan kode di sini
        return redirect('/dashboard/pelaksanaan_audit/surat_tugas')->with('success', 'Surat Tugas ditambahkan');


    }
}