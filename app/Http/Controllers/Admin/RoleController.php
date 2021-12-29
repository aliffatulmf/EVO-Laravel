<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['data' => Role::all()];
        return view('admin.role.show-role', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add-role');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $validated = $request->validated(); 
        $validated['default_point'] = $validated['point'];
        if (array_key_exists('admin', $validated)) {
            $validated['is_admin'] = ($validated['admin'] === "on") ? true : false;
            unset($validated['admin']);
        }
        
        Role::create($validated);
        
        return redirect()
            ->back()
            ->with('message', sprintf('Successfully added %s role.', $validated['name']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, $id)
    {
        $data = $role->findOrFail($id);
        $data->delete();

        return redirect()
            ->back()
            ->with('message', sprintf('Successfully deleted %s.', $data->name));
    }
}
