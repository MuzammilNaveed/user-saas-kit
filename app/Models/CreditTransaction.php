<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'amount' => 'integer',
        'balance_after' => 'integer',
    ];

    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent referenceable model (morphable).
     */
    public function reference()
    {
        return $this->morphTo('reference', 'reference_type', 'reference_id');
    }

    /**
     * Scope for earned credits.
     */
    public function scopeEarned($query)
    {
        return $query->where('type', 'earned');
    }

    /**
     * Scope for purchased credits.
     */
    public function scopePurchased($query)
    {
        return $query->where('type', 'purchased');
    }

    /**
     * Scope for used credits.
     */
    public function scopeUsed($query)
    {
        return $query->where('type', 'used');
    }

    /**
     * Scope for refunded credits.
     */
    public function scopeRefunded($query)
    {
        return $query->where('type', 'refunded');
    }
}
