<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'balance' => 'integer',
        'total_earned' => 'integer',
        'total_purchased' => 'integer',
        'total_used' => 'integer',
    ];

    /**
     * Get the user that owns the credits.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the transactions for this credit account.
     */
    public function transactions()
    {
        return $this->hasMany(CreditTransaction::class, 'user_id', 'user_id');
    }
}
