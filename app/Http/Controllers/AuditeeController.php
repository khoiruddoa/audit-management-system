<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use App\Models\PerencanaanAudit;
use App\Models\User;
use Illuminate\Http\Request;

class AuditeeController extends Controller
{
    public function index()
    {
        return view('dashboard.manajemen_auditee.index', [
            'auditees' => Auditee::all()
        ]);
    }

    public function detail($id)
    {
        return view('dashboard.manajemen_auditee.detail', [
            'auditee' => Auditee::find($id)
        ]);
    }

    public function create()
    {
        $user = User::all();
        return view('dashboard.manajemen_auditee.create', ['users' => $user]);
    }
    public function edit($id)
    {
        $auditee = Auditee::find($id);
        $user = User::all();
        return view('dashboard.manajemen_auditee.edit', ['users' => $user,
    'auditee' => $auditee]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'kode' => 'required',
            'auditee' => 'required' 
        ]);
        Auditee::create($validatedData);

        return redirect('/manajemen_auditee')->with('success', 'Auditee Ditambahkan');

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'kode' => 'required',
            'auditee' => 'required' 
        ]);

        $auditee = Auditee::findOrFail($id);
        $auditee->update($validatedData);

        return redirect('/manajemen_auditee')->with('success', 'Auditee Diperbarui');
    }

    public function destroy($id)
    {


        
        $cek2 = PerencanaanAudit::where('auditee_id', $id)->first();
        if($cek2){
            return redirect('/manajemen_auditee')->with('failed', 'Auditee sudah berada di Perencanaan Audit   ');
        }
        $user = Auditee::findOrFail($id);
        $user->delete();

        return redirect('/manajemen_auditee')->with('success', 'Auditee Dihapus');
    }
}
