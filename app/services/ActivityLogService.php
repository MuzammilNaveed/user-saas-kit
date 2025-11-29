<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ActivityLogService
{
    protected ?Model $causer = null;
    protected ?Model $subject = null;
    protected array $properties = [];
    protected ?string $description = null;

    public static function make(): self
    {
        return new static();
    }

    public function causedBy(?Model $user = null): self
    {
        $user = $user ?? Auth::user();

        if ($user instanceof Model) {
            $this->causer = $user;
        }

        return $this;
    }

    public function performedOn(?Model $model = null): self
    {
        if ($model instanceof Model) {
            $this->subject = $model;
        }

        return $this;
    }

    public function withProperties(array $properties = []): self
    {
        $this->properties = array_merge($this->properties, $properties);
        return $this;
    }

    public function log(string $description): ActivityLog
    {
        $this->description = $description;

        return ActivityLog::create([
            'causer_type'   => $this->causer ? get_class($this->causer) : null,
            'causer_id'     => optional($this->causer)->getKey(),
            'subject_type'  => $this->subject ? get_class($this->subject) : null,
            'subject_id'    => optional($this->subject)->getKey(),
            'description'   => $this->description,
            'properties'    => array_merge(['ip' => request()->ip()], $this->properties),
        ]);
    }
}
