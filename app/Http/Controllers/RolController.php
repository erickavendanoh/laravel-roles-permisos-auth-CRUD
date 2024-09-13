<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // examples with aliases, pipe-separated names, guards, etc:
            // 'role_or_permission:manager|edit articles',
            // new Middleware('role:author', only: ['index']),
            // new Middleware(\Spatie\Permission\Middleware\RoleMiddleware::using('manager'), except:['show']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using(['ver-rol', 'crear-rol', 'editar-rol', 'borrar-rol']), only:['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('crear-rol'), only:['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('editar-rol'), only:['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('borrar-rol'), only:['destroy']),
        ];
    }

    //Forma antigua de definir los permisos
    /*
    function __construct()
    {
        $this->middleware('permission:ver-rol | crear-rol | editar-rol | borrar-rol', ['only'=>['index']]);
        $this->middleware('permission:crear-rol', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-rol', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-rol', ['only'=>['destroy']]);
    }
    */

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(5);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.crear', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required'
        ]);
        $role = Role::create([
            'name' => $request->name,
        ]);
        // Asignar los permisos al rol
        $role->syncPermissions($request->permission);

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role =  Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('roles.editar', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required'
        ]);

        $role =  Role::find($id);
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permission);
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('roles.index');
    }
}
