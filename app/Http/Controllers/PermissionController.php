<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PermissionService;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index(Request $request)
    {
        $params = [
            'search' => $request->search,
            'page' => $request->page,
        ];
        $permissions = $this->permissionService->permissions($params);
        return view('permissions.index', compact('permissions'));
    }

    public function store(StorePermissionRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['guard_name'] = 'web';
        $result = $this->permissionService->create($validatedData);
        return redirect()->back()->with($result['status_code'] === 200 ? 'success' : 'error', $result['message']);
    }

    public function update(UpdatePermissionRequest $request, $id)
    {
        $result = $this->permissionService->update($id, $request->validated());
        return redirect()->back()->with($result['status_code'] === 200 ? 'success' : 'error', $result['message']);
    }

    public function destroy($id)
    {
        $result = $this->permissionService->destroy([$id]);
        return redirect()->back()->with($result['status_code'] === 200 ? 'success' : 'error', $result['message']);
    }
}
