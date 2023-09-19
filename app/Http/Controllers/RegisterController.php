<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use App\Models\Auditor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    public function index()
    {
        return view('dashboard.manajemen_pegawai.index', [
            'users' => User::latest()->get()
        ]);
    }

    public function detail($id)
    {
        return view('dashboard.manajemen_pegawai.detail', [
            'user' => User::find($id)
        ]);
    }
    public function create()
    {
        return view('dashboard.manajemen_pegawai.create');
    }

    public function edit($id)
    {
        return view('dashboard.manajemen_pegawai.edit', ['user' => User::find($id)]);
    }


    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'unique:users'],
            'nip' => 'required|max:255',
            'inisial' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'posisi' => 'required|max:255',
            'hp' => ['required', 'unique:users'],
            'alamat' => 'required|max:255',

        ]);

        User::create($validatedData);

        return redirect('/manajemen_pegawai')->with('success', 'Pegawai Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', Rule::unique('users')->ignore($id)],
            'nip' => 'required|max:255',
            'inisial' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'posisi' => 'required|max:255',
            'hp' => ['required', Rule::unique('users')->ignore($id)],
            'alamat' => 'required|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect('/manajemen_pegawai')->with('success', 'Pegawai Diperbarui');
    }

    public function destroy($id)
    {
        $cek = Auditor::where('user_id', $id)->first();
        $cek2 = Auditee::where('user_id', $id)->first();
        if($cek or $cek2){
            return redirect('/manajemen_pegawai')->with('failed', 'User sudah menjadi auditor/auditee');
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/manajemen_pegawai')->with('success', 'Pegawai Dihapus');
    }
}
