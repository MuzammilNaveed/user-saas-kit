<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
