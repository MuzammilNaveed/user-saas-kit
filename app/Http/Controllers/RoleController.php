<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;


class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index(Request $request)
    {
        $params = ['search' => $request->search];
        $roles = $this->roleService->roles($params);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = \App\Models\Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->validated();
        // Map permission_ids to permissions for the service
        if (isset($data['permission_ids'])) {
            $data['permissions'] = $data['permission_ids'];
        }

        $this->roleService->createRoleWithPermissions($data);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = \App\Models\Permission::all();
        $role->load('permissions');
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $data = $request->validated();
        // Map permission_ids to permissions for the service
        if (isset($data['permission_ids'])) {
            $data['permissions'] = $data['permission_ids'];
        } else {
            $data['permissions'] = [];
        }

        $this->roleService->updateRoleWithPermissions($role, $data);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->roleService->delete($id);
        return redirect()->route('roles.index')->with($result['status_code'] === 200 ? 'success' : 'error', $result['message']);
    }
}
