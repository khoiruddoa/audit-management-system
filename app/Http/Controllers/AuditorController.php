<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use App\Models\PerencanaanAudit;
use App\Models\SusunanTim;
use App\Models\User;
use Illuminate\Http\Request;

class AuditorController extends Controller
{
    public function index()
    {
        return view('dashboard.manajemen_auditor.index', [
            'auditors' => Auditor::all()
        ]);
    }

    public function create()
    {
        $user = User::all();
        return view('dashboard.manajemen_auditor.create', ['users' => $user]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
        
        ]);

        $cek = Auditor::where('user_id', $request->user_id)->first();
        if($cek){
            return redirect('/manajemen_auditor')->with('failed', 'Auditor sudah terdaftar');

        }
        Auditor::create($validatedData);

        return redirect('/manajemen_auditor')->with('success', 'Auditor Ditambahkan');

    }
    public function destroy($id)
    {
        $cek = SusunanTim::where('auditor_id', $id)->first();
      
        if($cek){
            return redirect('/manajemen_auditor')->with('failed', 'Auditor sudah terpakai di susunan tim');
        }
        
        $user = Auditor::findOrFail($id);
        $user->delete();

        return redirect('/manajemen_auditor')->with('success', 'Auditor Dihapus');
    }
}
