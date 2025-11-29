<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];

     public function owner()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
