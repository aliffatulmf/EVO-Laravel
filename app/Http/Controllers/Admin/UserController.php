<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin\User;
use App\Models\Admin\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['users' => User::all()];
        return view('admin.user.show-user', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['roles' => Role::all()];
        return view('admin.user.add-user', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'full_name' => $request['fullname'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role']
        ]);

        return redirect()
            ->back()
            ->with('message', sprintf('Successfully added %s user.', $request['fullname']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $data = $user->findOrFail($id);
        $data->delete();

        return redirect()
            ->back()
            ->with('message', sprintf('Successfully deleted %s user.', $data->full_name));
    }
}
