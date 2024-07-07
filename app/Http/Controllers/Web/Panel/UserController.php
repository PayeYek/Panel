<?php

namespace App\Http\Controllers\Web\Panel;

use App\Enum\GenderTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\UserRequest;
use App\Models\User;
use App\Tables\Users;
use DB;
use Exception;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Splade;

class UserController extends Controller
{

    public function index()
    {
        return view('panel.user.index', [
            'items' => Users::class
        ]);
    }


    public function create()
    {
        $genderTypes = GenderTypeEnum::options();
        $roles = Role::latest()->pluck('name', 'id')->map(function ($item) {
            return __(Str::title(Str::of($item)->replace('-', ' ')));
        });
        return view('panel.user.create', compact('roles', 'genderTypes'));
    }


    public function store(UserRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = User::create($request->validated());

            if ($request->filled('roles')) {
                $roles = Role::whereIn('id', $request->roles)->get();
                $user->syncRoles($roles);
            }

            DB::commit();
            Splade::toast(__('Created'))->autoDismiss(5);
            return redirect()->route('panel.user.index');

        } catch (Exception $e) {

            DB::rollBack();
            Splade::toast(__('Failed'))->autoDismiss(5)->danger();
            return redirect()->route('panel.user.index');
        }
    }


    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $genderTypes = GenderTypeEnum::options();
        $roles = Role::latest()->pluck('name', 'id')->map(function ($item) {
            return __(Str::title(Str::of($item)->replace('-', ' ')));
        });
        $userRoles = $user->roles->pluck('id')->toArray(); // Only get the IDs
        return view('panel.user.edit', compact('user', 'roles', 'genderTypes', 'userRoles'));
    }

    public function update(UserRequest $request, User $user)
    {

        DB::beginTransaction();

        try {
            $user->update($request->validated());

            if ($request->filled('roles')) {
                $roles = Role::whereIn('id', $request->roles)->get();
                $user->syncRoles($roles);
            } else {
                $user->syncRoles([]); // Remove all roles if none are provided
            }

            DB::commit();
            Splade::toast(__('Updated'))->autoDismiss(5);
            return redirect()->route('panel.user.index');

        } catch (Exception $e) {

            DB::rollBack();
            Splade::toast(__('Failed'))->autoDismiss(5)->danger();
            return redirect()->route('panel.user.index');
        }
    }


    public function destroy(User $user)
    {
        $user->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }
}
