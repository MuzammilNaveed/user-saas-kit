<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable, \Spatie\Permission\Traits\HasRoles;

    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public const STATUS = [
        'pending'   =>  0,
        'approved'  =>  1,
        'blocked'   =>  2,
    ];

    public const ONBOARDING_STEPS = [
        'basic_info'    =>  0,
        'location'      =>  1,
        'languages'     =>  2,
        'skills'        =>  3,
        'experiences'   =>  4,
        'educations'    =>  5,
        'completed'     =>  6
    ];


    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) =>  array_search($value, self::STATUS),
            set: fn(string $value) =>  self::STATUS[$value],
        );
    }

    protected function onboardingStep(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value === null ? null : array_search($value, self::ONBOARDING_STEPS),
            set: fn(?string $value) => $value === null ? null : self::ONBOARDING_STEPS[$value],
        );
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ownedRoles()
    {
        return $this->hasMany(Role::class, 'user_id');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'user_id');
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class, 'causer_id');
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
