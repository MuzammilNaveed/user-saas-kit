<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'current_period_start' => 'datetime',
        'current_period_end' => 'datetime',
        'trial_ends_at' => 'datetime',
        'ends_at' => 'datetime',
        'cancel_at_period_end' => 'boolean',
    ];

    /**
     * Get the user that owns the subscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the plan for this subscription.
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * Get the credit transactions for this subscription.
     */
    public function creditTransactions()
    {
        return $this->hasMany(CreditTransaction::class);
    }

    /**
     * Check if subscription is active.
     */
    public function isActive()
    {
        return $this->status === 'active';
    }

    /**
     * Check if subscription is on trial.
     */
    public function onTrial()
    {
        return $this->status === 'trialing' && $this->trial_ends_at && $this->trial_ends_at->isFuture();
    }

    /**
     * Check if subscription is canceled.
     */
    public function isCanceled()
    {
        return $this->status === 'canceled';
    }

    /**
     * Check if subscription is past due.
     */
    public function isPastDue()
    {
        return $this->status === 'past_due';
    }

    /**
     * Scope for active subscriptions.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for canceled subscriptions.
     */
    public function scopeCanceled($query)
    {
        return $query->where('status', 'canceled');
    }
}
