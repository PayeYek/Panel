<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Common\StoreRoleRequest;
use App\Http\Requests\Panel\Common\UpdateRoleRequest;
use App\Tables\Common\Roles;
use DB;
use Exception;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $items = Roles::class;
        return view('panel.role.index', compact('items'));
    }

    public function create()
    {
        $permissions = Permission::latest()->pluck('name', 'id');
        return view('panel.role.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        DB::beginTransaction();

        try {
            $role = Role::create(['name' => $request->name]);

            if ($request->filled('permissions')) {
                $permissions = Permission::whereIn('id', $request->permissions)->get();
                $role->syncPermissions($permissions);
            }

            DB::commit();
            Splade::toast(__('Created'))->autoDismiss(5)->success();
            return redirect()->route('panel.role.index');

        } catch (Exception $e) {

            DB::rollBack();
            Splade::toast(__('Failed'))->autoDismiss(5)->success();
            return redirect()->back();
        }

    }

    public function edit(Role $role)
    {
        $rolePermissions = $role->permissions;
        $permissions = Permission::latest()->pluck('name', 'id');
        return view('panel.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        DB::beginTransaction();
        try {
            $role->update(['name' => $request->validated('name')]);

            if ($request->has('permissions')) {
                $permissions = Permission::whereIn('id', $request->permissions)->get();
                $role->syncPermissions($permissions);
            } else {
                $role->syncPermissions([]); // Remove all permissions if none are provided
            }

            DB::commit();
            Splade::toast(__('Updated'))->autoDismiss(5)->success();
            return redirect()->route('panel.role.index');

        } catch (Exception $e) {

            DB::rollBack();
            Splade::toast(__('Failed'))->autoDismiss(5)->danger();
            return redirect()->back();
        }
    }

    public function destroy(Role $role)
    {
        $role->delete();
        Splade::toast(__('Deleted'))->autoDismiss(5)->success();

        return redirect()->route('panel.role.index');
    }
}
