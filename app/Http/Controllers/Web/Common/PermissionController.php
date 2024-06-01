<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Common\PermissionRequest;
use App\Tables\Common\Permissions;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Splade;

class PermissionController extends Controller
{
    public function index()
    {
        $items = Permissions::class;
        return view('panel.permission.index', compact('items'));
    }

    public function create()
    {
        return view('panel.permission.create');
    }

    public function store(PermissionRequest $request)
    {
        $permission = Permission::create(['name' => $request->validated('name')]);
        Splade::toast(__('Created'))->autoDismiss(5)->success();
        return redirect()->route('panel.permission.index');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('panel.permission.edit', compact('permission', 'roles'));
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update(['name' => $request->validated('name')]);

        // Sync roles with this permission
        $permission->syncRoles($request->roles);
        Splade::toast(__('Updated'))->autoDismiss(5)->success();

        return redirect()->route('panel.permission.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        Splade::toast(__('Deleted'))->autoDismiss(5)->success();
        return redirect()->route('panel.permission.index');
    }
}
