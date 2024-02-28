<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use App\Models\Auditor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{

    public function index()
    {
        return view('dashboard.manajemen_pegawai.index', [
            'users' => User::with('roles')->latest()->get(),

        ]);
    }

    public function detail($id)
    {
        $user = User::find($id);

        // Mendapatkan peran pengguna menggunakan Spatie
        $roles = $user->getRoleNames();

        return view('dashboard.manajemen_pegawai.detail', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }
    public function create()
    {
        return view('dashboard.manajemen_pegawai.create',['roles' => Role::all()]);
    }

    public function edit($id)
    {
        return view('dashboard.manajemen_pegawai.edit', ['user' => User::find($id), 'roles' => Role::all()]);
    }


    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => ['required', 'unique:users'],
            'nip' => 'required|numeric|max:255',
            'jabatan' => 'required|max:255',
            'posisi' => 'required|max:255',
            'hp' => ['required', 'unique:users']

        ]);

        $request->validate([
            'role' => 'required'
        ]);
        $validatedData['password'] = Hash::make($request->password);

       $user = User::create($validatedData);

       $user->assignRole($request->role);

        return redirect('/manajemen_pegawai')->with('success', 'Pegawai Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', Rule::unique('users')->ignore($id)],
            'nip' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'posisi' => 'required|max:255',
            'hp' => ['required', Rule::unique('users')->ignore($id)]
        ]);


        $user = User::findOrFail($id);
        $user->update($validatedData);
        if($request->role !==  null){
        $user->syncRoles($request->role);
        }


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
