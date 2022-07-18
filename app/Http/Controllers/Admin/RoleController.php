<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.roles.index');
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        //dd($permissions);
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $aux = 0;
        $aux2 = 0;
        $aux3 = 0;
        $aux4 = 0;
        $aux5 = 0;
        foreach($request->permissions as $permisos){
            if($aux == 0){
                if($permisos == "2" || $permisos == "3" || $permisos == "4" || $permisos == "5" || $permisos == "6"
                || $permisos == "7" || $permisos == "8" || $permisos == "9"){
                    $request->permissions = array_merge($request->permissions, array("1"));
                    $aux=1;
                };
            };
            if($aux2 == 0){
                if($permisos == "11" || $permisos == "12"){
                    $request->permissions = array_merge($request->permissions, array("10"));
                    $aux2=1;
                };
            };
            if($aux3 == 0){
                if($permisos == "14" || $permisos == "15" || $permisos == "16" || $permisos == "17"){
                    $request->permissions = array_merge($request->permissions, array("13"));
                    $aux3=1;
                };
            };
            if($aux4 == 0){
                if($permisos == "19" || $permisos == "20"|| $permisos == "21" ||
                $permisos == "23" || $permisos == "24" || $permisos == "25"){
                    $request->permissions = array_merge($request->permissions, array("18"));
                    $aux4=1;
                };
            };
            if($aux5 == 0){
                if($permisos == "23" || $permisos == "24" || $permisos == "25"){
                    $request->permissions = array_merge($request->permissions, array("22"));
                    $aux5=1;
                };
            };
        };
        //dd($request->permissions);
        $request->validate([
            'name' => 'required|unique:roles',
        ]);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.show', $role)->with('success', 'store');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        //dd($request->permissions);
        $aux = 0;
        $aux2 = 0;
        $aux3 = 0;
        $aux4 = 0;
        $aux5 = 0;
        foreach($request->permissions as $permisos){
            if($aux == 0){
                if($permisos == "2" || $permisos == "3" || $permisos == "4" || $permisos == "5" || $permisos == "6"
                || $permisos == "7" || $permisos == "8" || $permisos == "9"){
                    $request->permissions = array_merge($request->permissions, array("1"));
                    $aux=1;
                };
            };
            if($aux2 == 0){
                if($permisos == "11" || $permisos == "12"){
                    $request->permissions = array_merge($request->permissions, array("10"));
                    $aux2=1;
                };
            };
            if($aux3 == 0){
                if($permisos == "14" || $permisos == "15" || $permisos == "16" || $permisos == "17"){
                    $request->permissions = array_merge($request->permissions, array("13"));
                    $aux3=1;
                };
            };
            if($aux4 == 0){
                if($permisos == "19" || $permisos == "20"|| $permisos == "21" ||
                $permisos == "23" || $permisos == "24" || $permisos == "25"){
                    $request->permissions = array_merge($request->permissions, array("18"));
                    $aux4=1;
                };
            };
            if($aux5 == 0){
                if($permisos == "23" || $permisos == "24" || $permisos == "25"){
                    $request->permissions = array_merge($request->permissions, array("22"));
                    $aux5=1;
                };
            };
        };

        //dd($request->permissions);

        $request->validate([
            'name' => "required|unique:roles,name,$role->id",
        ]);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.show', $role)->with('success', 'update');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'El rol se eliminó con éxito');
    }
}
