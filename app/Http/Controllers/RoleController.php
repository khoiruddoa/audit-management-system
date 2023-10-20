<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){


        $role= Role::all();


        return view('dashboard.manajemen_role.index',[
            'role' => $role
        ]);

    }

    public function create(){

        return view('dashboard.manajemen_role.create');

    }

  //  Role::create(['name' =>'admin']);

    public function store(Request $request)
    {
       
        $cek = Role::where('name', $request->name)->first();
        if($cek){
            return back()->with('failed', 'Role Sudah Ada');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255'  
            
        ]);

       

      
        Role::create($validatedData);

        return redirect(route('manajemen_role'))->with('success', 'Role baru Ditambahkan');

    }


    public function detail($id) {
        // Dapatkan peran berdasarkan ID
        $role = Role::find($id);
    
        if (!$role) {
            // Handle jika peran tidak ditemukan
            return abort(404);
        }
    
        // Dapatkan semua izin
        $allPermissions = Permission::all();
    
        // Dapatkan izin-izin yang terkait dengan peran di halaman detail
        $rolePermissions = $role->permissions->pluck('id')->toArray();
    
        // Loop melalui setiap izin dan tambahkan flag
        $permissionsWithFlag = $allPermissions->map(function ($permission) use ($rolePermissions) {
            $flag = in_array($permission->id, $rolePermissions);
            $permission->setAttribute('has_role', $flag);
            return $permission;
        });
   
        return view('dashboard.manajemen_role.detail', [
            'role' => $role,
            'permissionsWithFlag' => $permissionsWithFlag,
        ]);
    }

    public function store_permission(Request $request) {

        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array',
        ]);
    
        $role = Role::find($request->role_id);
   
        // Ambil izin-izin yang dipilih dari formulir
        $selectedPermissions = $request->permissions;
    
        // Berikan izin-izin yang dipilih ke peran
        $role->syncPermissions($selectedPermissions);
    
        return redirect(route('manajemen_role'))->with('success', 'Izin berhasil diperbarui.');
    }
    
}
