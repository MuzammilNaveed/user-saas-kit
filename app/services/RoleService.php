<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class RoleService
{
    public function roles($param)
    {
        $query = auth()->user()->is_admin ? Role::query() : auth()->user()->roles();
        return $query->when(!empty($param['search']), function ($query) use ($param) {
            $query->where('name', database_driver(), '%' . $param['search'] . '%');
        })
            ->latest('id')
            ->paginate(10);
    }


    public function createRoleWithPermissions(array $data): Role
    {
        return DB::transaction(function () use ($data) {

            $role = $this->createRole(Arr::only($data, ['name']));

            if (!empty($data['permissions'])) {
                $permissions = Permission::whereIn('id', $data['permissions'])->get();
                $role->syncPermissions($permissions);
            }

            if ($role->wasRecentlyCreated) {
                $message = auth()->user()->name . " created a new role: " . $role->name;
                $properties = $role->toArray();
                $properties['permissions'] = $role->permissions->pluck('name')->toArray();

                activity()
                    ->causedBy(auth()->user())
                    ->performedOn($role)
                    ->withProperties($properties)
                    ->log($message);
            }

            return $role->load('permissions');
        });
    }


    public function updateRoleWithPermissions(Role $role, array $data): Role
    {
        return DB::transaction(function () use ($role, $data) {
            $role->update(Arr::only($data, ['name']));

            if (isset($data['permissions'])) {
                $permissions = Permission::whereIn('id', $data['permissions'])->get();
                $role->syncPermissions($permissions);
            } else {
                $role->syncPermissions([]);
            }

            $message = auth()->user()->name . " updated a role: " . $role->name;
            $properties = array_merge($role->toArray(), [
                'permissions' => $role->permissions->pluck('name')->toArray()
            ]);

            activity()
                ->causedBy(auth()->user())
                ->performedOn($role)
                ->withProperties($properties)
                ->log($message);

            return $role->load('permissions');
        });
    }

    public function delete($id): array
    {
        $role = $this->findRole($id);

        if (empty($role)) {
            return ['message'   =>  __('messages.record_not_found'),   'status_code'   =>  Response::HTTP_NOT_FOUND];
        }

        if ($role->users()->exists()) {
            return ['message'   =>  __('roles.cannot_delete_assigned_role'),   'status_code'   =>  Response::HTTP_FORBIDDEN];
        }

        $role->delete();

        activity()
            ->causedBy(auth()->user())
            ->performedOn($role)
            ->withProperties($role->toArray())
            ->log(auth()->user()->name . " deleted role: " . $role->name);

        return ['message'   =>  __('roles.role_deleted'),  'status_code'   =>  Response::HTTP_OK];
    }

    private function findRole($id)
    {
        return auth()->user()->ownedRoles()->find($id);
    }

    private function createRole(array $data): Role
    {
        return auth()->user()->ownedRoles()->create($data);
    }
}
