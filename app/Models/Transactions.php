<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'txn_id',
        'user',
        'tokens',
        'token_bonus',
        'total_token',
        'amount',
        'base_amt',
        'type',
        'status',
        'payfrom',
        'address',
        'proof',
        'stage',
        'to',
        'wallet_address',         // New field for MetaMask
        'base_price_eth',         // New field for MetaMask
        'gst_amount_eth',         // New field for MetaMask
        'total_eth_amount',       // New field for MetaMask
        'gst_rate'               // New field for MetaMask
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the transaction
     */
    public function tuser()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    /**
     * Get the stage that the transaction belongs to
     */
    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage', 'stage_name');
    }

    /**
     * Alternative user relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    /**
     * Scope for MetaMask transactions
     */
    public function scopeMetaMask($query)
    {
        return $query->where('type', 'like', '%MetaMask%');
    }

    /**
     * Scope for pending transactions
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for completed transactions
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
