<?php

namespace App\Http\Controllers;

use App\Models\ReferensiAudit;
use Illuminate\Http\Request;

class ReferensiAuditController extends Controller
{
    public function index()
    {
        return view('dashboard.pustaka_audit.pustaka_referensi_audit.index', [
            'programs' => ReferensiAudit::all()
        ]);
    }

    public function create()
    {
       
        return view('dashboard.pustaka_audit.pustaka_referensi_audit.create');
    }


    public function store(Request $request)
    {
       
       
        ReferensiAudit::create($request->all());

        return redirect('pustaka_audit/pustaka_referensi_audit/')->with('success', 'Referensi Ditambahkan');

    }
    
}
