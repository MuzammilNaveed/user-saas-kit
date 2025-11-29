<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionService
{
    public function permissions(array $param)
    {
        $query = auth()->user()->is_admin ? Permission::query() : auth()->user()->permissions();
        return $query->when(!empty($param['search']), function ($query) use ($param) {
            $query->where('name', database_driver(), '%' . $param['search'] . '%');
        })
            ->latest('id')
            ->paginate(10);
    }

    private function find($id)
    {
        return auth()->user()->is_admin ?
            Permission::find($id) :
            auth()->user()->permissions()->find($id);
    }

    public function create(array $payload): array
    {
        if (empty($payload)) {
            return ['message'   =>  __('messages.invalid_input'),   'status_code'   =>  Response::HTTP_BAD_REQUEST];
        }

        $permission = auth()->user()->permissions()->create(Arr::only($payload, ['name', 'guard_name']));

        if ($permission->wasRecentlyCreated) {
            $message =  auth()->user()->name . " created a new permission: " . $permission->name;
            activity()
                ->causedBy(auth()->user())
                ->performedOn($permission)
                ->withProperties($permission->toArray())
                ->log($message);
        }

        return ['message'   =>  __('messages.permission_created'),  'status_code'   =>  Response::HTTP_OK];
    }

    public function update(int $permissionId, array $payload): array
    {
        if (empty($payload)) {
            return ['message'   =>  __('messages.invalid_input'),   'status_code'   =>  Response::HTTP_BAD_REQUEST];
        }

        $permission = $this->find($permissionId);
        if (empty($permission)) {
            return ['message'   =>  __('messages.record_not_found'),   'status_code'   =>  Response::HTTP_NOT_FOUND];
        }

        $originalRecord = clone $permission;
        $permission->fill($payload);
        if ($permission->isClean()) {
            return ['status_code' => Response::HTTP_BAD_REQUEST, 'message' => __('messages.no_changes_detected')];
        }

        if ($permission->save()) {
            // $message = $this->prepareActivityLogMessage("updated", $record);
            // $this->activityLog->create($record, $message, ["old" => $originalRecord->getOriginal(), "new" => $record->getAttributes()]);
            $message =  auth()->user()->name . " updated a permission: " . $permission->name;
            activity()
                ->causedBy(auth()->user())
                ->performedOn($permission)
                ->withProperties($permission->toArray())
                ->log($message);
        }

        return ['message'   =>  __('messages.permission_updated'),  'status_code'   =>  Response::HTTP_OK];
    }

    public function destroy($permissionIds): array
    {
        $permissions = $this->find($permissionIds);

        if (empty($permissions)) {
            return ['message'  =>  __('messages.record_not_found'),    'status_code'   =>  Response::HTTP_NOT_FOUND];
        }

        $permissionLogs = $permissions->map(fn($permission) => [
            'model'     =>  $permission,
            'metadata'  =>  ['id' => $permission->id, 'name' => $permission->name]
        ]);

        $isDestroyed = $this->delete($permissions->pluck('id')->toArray());

        if ($isDestroyed) {
            foreach ($permissionLogs as $log) {
                // create activity logs
                // $message = $this->prepareActivityLogMessage("deleted", data_get($log, "model"));
                // $this->activityLog->create(data_get($log, "model"), $message, data_get($log, "metadata"));
            }
        }

        return ['message'   =>  __('messages.permission_deleted'), 'status_code' =>  Response::HTTP_OK,];
    }


    public function delete(array $permissionIds)
    {
        return Permission::destroy($permissionIds);
    }
}
