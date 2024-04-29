<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\UserRequest;
use App\Models\User;
use App\Tables\Users;
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
        return view('panel.user.create');
    }


    public function store(UserRequest $request)
    {
        User::create($request->validated());

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.user.index');
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('panel.user.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        Splade::toast(__('Updated'))->autoDismiss(5);

        return redirect()->route('panel.user.index');
    }


    public function destroy(User $user)
    {
        $user->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }
}
