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

    public function tuser(){
        return $this->belongsTo(User::class, 'user');
    }

    public function stage(){
        return $this->belongsTo(Stage::class, 'stage', 'id');
    }
}
