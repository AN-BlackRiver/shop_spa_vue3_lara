<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return view('user.index', ['users' => User::query()->paginate(5)]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreRequest $request)
    {
        $dataUser = $request->validated();
        User::query()->firstOrCreate(['email' => $dataUser['email']], $dataUser);
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user = $user->update($request->validated());
        return redirect()->route('users.show', ['user' => $user,]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
