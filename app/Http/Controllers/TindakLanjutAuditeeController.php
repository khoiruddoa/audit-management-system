<?php

namespace App\Http\Controllers;

use App\Models\TanggapanAudit;
use App\Models\TindakLanjutAudit;
use Illuminate\Http\Request;

class TindakLanjutAuditeeController extends Controller
{
    public function index()
    {

        return view('dashboard.tindak_lanjut_auditee.index', [


            'tindaklanjut' => TindakLanjutAudit::all()
        ]);
    }

    public function update(Request $request)
    {


        $tindaklanjut = TindakLanjutAudit::find($request->id);

        $validatedData = $request->validate([

            'tindakan' => 'nullable|string|max:255',
            'lampiran' => 'nullable|string|max:255'
        ]);


        $validatedData['status'] = '1';
        $tindaklanjut->update($validatedData);



        return back()->with('success', 'tindak lanjut sukses');
    }
}
