<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $guarded = [];

    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return $this->path ? \Illuminate\Support\Facades\Storage::disk($this->disk)->url($this->path) : null;
    }

    public function mediable()
    {
        return $this->morphTo();
    }
}
