<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function createUser(array $data): User
    {

        $userPayload = array_merge($this->userParams($data), [
            'password' => Hash::make($data['password']),
            'created_by' => auth()->id(),
        ]);
        $user = User::create($userPayload);

        if (isset($data['role'])) {
            $user->assignRole($data['role']);
        }

        if (isset($data['avatar']) && $data['avatar'] instanceof UploadedFile) {
            $this->uploadAvatar($user, $data['avatar']);
        }

        activity()
            ->causedBy(auth()->user())
            ->performedOn($user)
            ->withProperties(['attributes' => $user->toArray()])
            ->log(auth()->user()->name . " created a new User: " . $user->name);

        return $user;
    }

    public function updateUser(User $user, array $data): User
    {
        $userPayload = $this->userParams($data);
        $user->fill($userPayload);

        if ($user->isDirty()) {
            $user->save();

            activity()
                ->causedBy(auth()->user())
                ->performedOn($user)
                ->withProperties(['attributes' => $user->toArray()])
                ->log(auth()->user()->name . " updated a User: " . $user->name);
        }

        if (isset($data['role'])) {
            $user->syncRoles([$data['role']]);
        }

        if (isset($data['avatar']) && $data['avatar'] instanceof UploadedFile) {
            $this->uploadAvatar($user, $data['avatar']);
        }

        return $user;
    }

    protected function uploadAvatar(User $user, UploadedFile $file)
    {
        $disk = 'public';
        $filename = $file->hashName();
        $path = $file->storeAs('uploads', $filename, $disk);

        $user->media()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'disk' => $disk,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'type' => 'image',
        ]);
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        activity()
            ->causedBy(auth()->user())
            ->performedOn($user)
            ->log('User deleted: ' . $user->name);

        return true;
    }

    private function userParams(array $data): array
    {
        return Arr::only($data, ['name', 'email', 'phone', 'gender', 'country', 'address', "status"]);
    }
}
