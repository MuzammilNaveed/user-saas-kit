<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'hidden' => 'boolean',
        'price' => 'decimal:2',
    ];

    /**
     * Get the subscriptions for this plan.
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Get active subscriptions for this plan.
     */
    public function activeSubscriptions()
    {
        return $this->hasMany(Subscription::class)->where('status', 'active');
    }

    /**
     * Scope for active plans only.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for monthly plans.
     */
    public function scopeMonthly($query)
    {
        return $query->where('billing_period', 'monthly');
    }

    /**
     * Scope for yearly plans.
     */
    public function scopeYearly($query)
    {
        return $query->where('billing_period', 'yearly');
    }
}
